import { createApp, ref } from 'vue';
import HistorialClinico from './components/HistorialClinico.vue';

import '@trevoreyre/autocomplete-vue/dist/style.css'


const app =  createApp({
    components: {
      HistorialClinico
    },
    setup() {
        console.log("sdfsd")
       const message = ref('Hello vue!')
       return {
         message
       }
     }
   })

app.mount('#app')