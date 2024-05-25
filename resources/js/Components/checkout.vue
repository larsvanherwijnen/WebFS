<template>
    <div class="flex h-[35rem] gap-3">
        <div class="bg-white shadow-sm h-full w-2/3 flex flex-col rounded">
            <div class="flex justify-between p-4">
                <span class="text-2xl font-bold">Gerechten </span>
                <div class="flex space-x-2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input v-model="searchQuery" @input="fetchDishes" type="text" id="simple-search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                   placeholder="Search" required="">
                        </div>
                    </form>
                    <div>
                        <button id="filterDropdownButton" @click="toggleDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                 class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>
                        <div id="filterDropdown"
                             v-if="isDropdownOpen"
                             class="z-10 absolute w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Kies categorie</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <template v-for="(type, typeIndex) in types" :key="typeIndex">
                                    <li class="flex items-center">
                                        <input :id="type.id" type="checkbox" :value="type.id" @change="fetchDishes"
                                               class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label :for="type.id"
                                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ type.name }}</label>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-y-auto h-full mt-4">
                <table class="w-full">
                    <thead>
                    <tr>
                        <th>Gerecht</th>
                        <th>Prijs</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <template v-for="(type, typeIndex) in groupedDishes" :key="typeIndex">
                        <tr>
                            <th :colspan="2">{{ type.name }}</th>
                        </tr>
                        <tr v-for="dish in type.dishes" :key="dish.id">
                            <td v-html="dish.name"></td>
                            <td v-html="dish.price"></td>
                            <td>
                                <button class="bg-green-600 p-2 rounded text-sm" @click="addToOrder(dish)">Toevoegen
                                </button>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col w-1/3 h-full bg-white shadow-sm rounded">
            <div class="flex justify-between p-4">
                <span class="text-2xl font-bold">Bestelling </span>
            </div>
            <div class="overflow-y-auto h-full mt-4">
                <table class="w-full">
                    <thead>
                    <tr>
                        <th>Gerecht</th>
                        <th>Aantal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, index) in order" :key="index">
                        <td v-html="item.name"></td>
                        <td>{{ item.quantity }}</td>
                        <td class="flex gap-3">
                            <button class="bg-blue-600 p-2 rounded text-sm" @click="decreaseQuantity(index)">-
                            </button>
                            <button class="bg-blue-600 p-2 rounded text-sm" @click="increaseQuantity(index)">+
                            </button>
                            <button class="bg-red-500 p-2 rounded text-sm" @click="removeFromOrder(index)">Remove
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-auto flex justify-end p-2 gap-2">
                <button @click="placeOrder" class="bg-green-600 p-2 rounded text-sm">Bestellen</button>
                <button @click="deleteOrder" class="bg-red-500 p-2 rounded text-sm">Verwijderen</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            dishes: [],
            order: [],
            types: [],
            selectedCategories: [],
            isDropdownOpen: false,
            searchQuery: ''


        };
    },
    computed: {
        groupedDishes() {
            const grouped = {};
            this.dishes.forEach(dish => {
                if (!grouped[dish.dish_type.id]) {
                    grouped[dish.dish_type.id] = {
                        name: dish.dish_type.name,
                        dishes: []
                    };
                }
                grouped[dish.dish_type.id].dishes.push(dish);
            });
            return Object.values(grouped);
        }
    },
    created() {
        this.fetchDishes();
    },
    methods: {
        fetchDishes() {
            const params = {
                filters: [], // Array to hold selected filter values
                search: this.searchQuery // Search query entered by the user
            };

            // Add selected filter values to params.filters array
            this.types.forEach((type, index) => {
                const checkbox = document.getElementById(type.id);
                if (checkbox.checked) {
                    params.filters.push(type.id);
                }
            });

            axios.get('/api/dishes',  { params })
                .then(response => {
                    this.dishes = response.data.dishes;
                    this.types = response.data.dishTypes;
                })
                .catch(error => {
                    console.error('Error fetching dishes:', error);
                });
        },
        addToOrder(dish) {
            const orderItem = this.order.find(item => item.id === dish.id);
            if (orderItem) {
                orderItem.quantity++;
            } else {
                this.order.push({...dish, quantity: 1});
            }
        },
        removeFromOrder(index) {
            this.order.splice(index, 1);
        },
        increaseQuantity(index) {
            this.order[index].quantity++;
        },
        decreaseQuantity(index) {
            if (this.order[index].quantity > 1) {
                this.order[index].quantity--;
            } else {
                this.removeFromOrder(index);
            }
        },
        placeOrder() {
            axios.post('/api/sales', {items: this.order})
                .then(() => {
                    this.order = [];
                    alert('Order placed successfully!');
                })
                .catch(error => {
                    console.error('Error placing order:', error);
                    alert('Failed to place order.');
                });
        },
        deleteOrder() {
            this.order = [];
        },
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        }
    }
};
</script>

<style scoped>
th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}
</style>
