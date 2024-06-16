import { createApp } from 'vue'
import Checkout from "./Components/checkout.vue";
import Sales from "./Components/sales.vue";
import TableSale from "./Components/tableSale.vue";

const app = createApp();

app.component('checkout', Checkout)
app.component('sales', Sales)
app.component('table-sale', TableSale)

app.mount('#app')
