<template>
    <div
        class="bg-white flex shadow-sm -translate-x-80 h-[35rem] rounded-xl transition-transform duration-300 xl:translate-x-0 border border-blue-gray-100 p-4">
        <div class="h-full w-1/2 flex flex-col">
            <h2 class="text-2xl font-bold">Gerechten </h2>
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
                                <button class="bg-green-600 p-2 rounded text-sm" @click="addToOrder(dish)">Toevoegen</button>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col w-1/2 h-full">
            <h2 class="text-2xl font-bold">Bestellen</h2>
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
                            <button class="bg-blue-600 p-2 rounded text-sm" @click="decreaseQuantity(index)">-</button>
                            <button class="bg-blue-600 p-2 rounded text-sm" @click="increaseQuantity(index)">+</button>
                            <button class="bg-red-500 p-2 rounded text-sm" @click="removeFromOrder(index)">Remove</button>
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
            order: []
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
            axios.get('/api/dishes')
                .then(response => {
                    this.dishes = response.data;
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
                this.order.push({ ...dish, quantity: 1 });
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
            axios.post('/api/orders', { items: this.order })
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
