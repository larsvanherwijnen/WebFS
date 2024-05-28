<template>
    <div class="flex flex-col gap-3">
        <div class="bg-white shadow-sm rounded-xl border border-blue-gray-100 p-4">
            <h2 class="text-2xl font-bold">Sale Overview</h2>
            <div class="mt-4 flex gap-4">
                <div>
                    <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="startDate" v-model="startDate" @change="fetchSales">
                </div>
                <div>
                    <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" id="endDate" v-model="endDate" @change="fetchSales">
                </div>
            </div>
            <div class="mt-4">
                <div class="mb-2">
                    <span class="font-medium">Omzet (incl. BTW):</span> {{ total }}
                </div>
                <div class="mb-2">
                    <span class="font-medium">BTW</span> {{ tax }}
                </div>
                <div class="mb-2">
                    <span class="font-medium">Omzet (excl. VAT):</span> {{ net }}
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Sales List</h3>
                <table class="w-full mt-2">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Gerecht</th>
                        <th>Prijs</th>
                        <th>Aantal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(sale, index) in sales" :key="index">
                        <td>{{ sale.date }}</td>
                        <td>{{ sale.dish }}</td>
                        <td>{{ sale.price }}</td>
                        <td>{{ sale.quantity }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white shadow-sm rounded-xl border border-blue-gray-100 p-4">
            <h2 class="text-2xl font-bold">Daily overviews</h2>
            <div class="mt-4">
                <h3 class="text-lg font-semibold">Exports</h3>
                <table class="w-full mt-2">
                    <thead>
                    <tr>
                        <th>Bestandsnaam</th>
                        <th>Aangemaakt op</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(report, index) in exports" :key="index">
                        <td>{{ report.file_name }}</td>
                        <td>{{ report.created_at }}</td>
                        <td>
                            <a :href="report.url" target="_blank">Download</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            startDate: '',
            endDate: '',
            total: '',
            tax: '',
            net: '',
            sales: [],


            exports: []
        };
    },
    created() {
        // Calculate default start and end dates for previous week
        const today = new Date();
        const endOfWeek = new Date(today.setDate(today.getDate() - today.getDay())); // Last Sunday
        const startOfWeek = new Date(today.setDate(today.getDate() - 6)); // Previous Monday

        // Format dates as yyyy-MM-dd
        this.endDate = endOfWeek.toISOString().split('T')[0];
        this.startDate = startOfWeek.toISOString().split('T')[0];

        // Fetch sales data for default dates
        this.fetchSales();
        this.salesReport();
    },
    methods: {
        fetchSales() {
            axios.get('/api/sales', {
                params: {
                    start_date: this.startDate,
                    end_date: this.endDate
                }
            })
                .then(response => {
                    this.total = response.data.total;
                    this.tax = response.data.tax;
                    this.net = response.data.net;
                    this.sales = response.data.sales;
                })
                .catch(error => {
                    console.error('Error fetching sales:', error);
                });
        },
        salesReport() {
            axios.get('/api/sales/exports')
                .then(response => {
                    this.exports = response.data;
                })
                .catch(error => {
                    console.error('Error fetching exports:', error);
                });
        },
    }
};
</script>

<style scoped>
th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}
</style>
