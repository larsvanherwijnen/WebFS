import { createApp } from 'vue'
import Checkout from "./Components/checkout.vue";
import Sales from "./Components/sales.vue";

const app = createApp();

app.component('checkout', Checkout)
app.component('sales', Sales)

app.mount('#app')
