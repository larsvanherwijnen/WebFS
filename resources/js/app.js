import { createApp } from 'vue'
import Checkout from "./Components/checkout.vue";

const app = createApp();

app.component('checkout', Checkout)

app.mount('#app')
