import { createApp, ref } from 'vue';
import HistorialCompra from './components/HistorialCompra.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import '@trevoreyre/autocomplete-vue/dist/style.css'


const app =  createApp({
    components: {
      HistorialCompra
    },
    setup() {
     }
   })

app.use(VueSweetalert2);
app.mount('#app')