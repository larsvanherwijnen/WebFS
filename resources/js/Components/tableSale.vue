<template>
    <div class="flex flex-col items-center justify-center bg-gray-200 min-h-screen">
        <section class="py-6 px-4 bg-white rounded-md shadow-md min-w-[75%] space-y-6">
            <div class="flex justify-start">
                <h1 class="text-2xl font-bold text-center mb-4">Welkom tafel {{ this.table.id }}</h1>
            </div>

            <div>
                <h1 class="text-xl">Geselecteerde gerechten</h1>
                <div v-if="selectedDishes.length">
                    <div class="bg-gray-100 rounded-sm px-4 py-1">
                        <div v-for="(dish, index) in selectedDishes" :key="dish.id" class="flex justify-between">
                            <p v-html="dish.name"></p>
                            <div class="space-x-2">
                                <span v-html="dish.price"></span>
                                <button @click="removeFromOrder(index)"
                                    class="bg-red-500 hover:bg-red-400 px-4 rounded-md m-0.5">-</button>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <p>Totaal:</p>
                            <span v-html="`€ ` + this.totalPrice"></span>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button @click="placeOrder()"
                            class="px-4 bg-blue-500 hover:bg-blue-400 m-0.5 rounded-md text-center">Afrekenen</button>
                    </div>
                </div>

                <div v-else class="flex flex-col py-4 px-2 bg-gray-100 rounded-sm w-full">
                    <p class="self-center">Geen gerechten geselecteerd</p>
                </div>
            </div>

            <div>
                <h1 class="text-xl">Favorieten</h1>
                <div v-if="favorites.length">
                    <div class="bg-gray-100 rounded-sm px-4 py-1">
                        <div v-for="dish in favorites" :key="dish.id" class="flex justify-between">
                            <p v-html="dish.name"></p>
                            <div class="space-x-2">
                                <span v-html="dish.price"></span>
                                <button @click="selectedDishes.push(dish)"
                                    class="bg-green-500 hover:bg-green-400 px-4 rounded-md m-0.5">+</button>
                                <button @click="removeFromOrder(dish)"
                                    class="bg-red-500 hover:bg-red-400 px-4 rounded-md m-0.5">-</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="flex flex-col py-4 px-2 bg-gray-100 rounded-sm w-full">
                    <p class="self-center">Geen favorieten gevonden</p>
                </div>
            </div>

            <div>
                <h1 class="text-xl">Gerechten</h1>
                <div v-if="groupedDishes.length">
                    <div v-for="group in groupedDishes" :key="group.name">
                        <h2 class="text-lg font-bold">{{ group.name }}</h2>
                        <div class="bg-gray-100 px-4 py-1 rounded-sm">
                            <div v-for="dish in group.dishes" :key="dish.id">
                                <div class="flex justify-between items-center">
                                    <p v-html="dish.name"></p>
                                    <div class="space-x-2">
                                        <span v-html="dish.price"></span>
                                        <button @click="selectedDishes.push(dish)"
                                            class="px-4 bg-green-500 hover:bg-green-400 m-0.5 rounded-md text-center">+</button>
                                        <button @click="addToFavorites(dish)"
                                            class="px-4 bg-yellow-500 hover:bg-yellow-400 m-0.5 rounded-md text-center">*</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="flex flex-col py-4 px-2 bg-gray-100 rounded-sm w-full">
                    <p class="self-center">Geen gerechten gevonden</p>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: ['table'],
    data() {
        return {
            table: this.table,
            dishes: [],
            dishTypes: [],
            selectedDishes: [],
            favorites: [],
        }
    },
    computed: {
        groupedDishes() {
            let groupedDishes = [];
            this.dishTypes.forEach(type => {
                let dishes = this.dishes.filter(dish => dish.dish_type.id === type.id);

                groupedDishes.push({ name: type.name, dishes });
            });
            return groupedDishes;
        },
        totalPrice() {
            let total = 0;
            this.selectedDishes.forEach(dish => {
                // filter out the euro sign and the space behind it and parse the string to a float
                total += parseFloat(dish.bare_price);
                // format the total to a string with 2 decimals
                console.log(total);
            });
            return total.toFixed(2);
        },
    },
    created() {
        this.fetchDishes();
        this.favorites = this.fetchFavorites();
    },
    methods: {
        fetchDishes() {
            let params = {
                filters: [],
                search: this.searchQuery
            };

            axios.get('/api/dishes', { params })
                .then(response => {
                    this.dishes = response.data.dishes;
                    this.dishTypes = response.data.dishTypes;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        fetchFavorites() {
            // if there is no favorites in the local storage, create the favorites array
            if (!localStorage.getItem('favorites')) {
                localStorage.setItem('favorites', JSON.stringify([]));
            }
            return this.favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        },
        removeFromOrder(index) {
            this.selectedDishes.splice(index, 1);
        },
        addToFavorites(dish) {
            if (this.favorites.some(favorite => favorite.id === dish.id)) {
                this.favorites = favorites.filter(favorite => favorite.id !== dish.id);

            } else {
                if (!this.favorites) {

                }
                this.favorites.push(dish);
            }

            localStorage.setItem('favorites', JSON.stringify(this.favorites));
        },
        placeOrder() {
            axios.post('/api/sales/table', [this.table, this.selectedDishes])
                .then(() => {
                    this.selectedDishes = [];
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
}
</script>