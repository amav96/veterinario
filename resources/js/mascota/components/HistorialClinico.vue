<template>
   <div>
        <div class="flex flex-row justify-end " >
            <div class="dropdown items-end">
              
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ tipoHistorialClinico ? tipoHistorialClinico : 'Nuevo registro'  }} 
                </button>
                <ul class="dropdown-menu cursor-pointer">
                    <li
                    v-for="(item, index) in tiposHistoriasClinicasFiltradas"
                    :key="index"
                    @click="tipoHistorialClinico = item.nombre"
                    >
                        <div class="dropdown-item" >
                            {{ item.nombre }}
                        </div>
                    </li>
                
                </ul>
            </div>
        </div>

        <template v-if="tipoHistorialClinico && tipoHistorialClinico">
            <form-historial
            :diagnosticos="diagnosticos"
            :examenes-auxiliares="examenesAuxiliares"
            :productos="productos"
            :tipoHistorialClinico="tipoHistorialClinico"
            :tiposHistoriasClinicas="tiposHistoriasClinicas"
            :mascota-id="mascotaId"
            @actualizarHistorial="getHistorialClinico"
            />
            
        </template>

        <div v-else class="flex flex-col">
            <div 
            v-for="(item, index) in historiasClinicas"
            :key="index"
            class="bg-white border border-gray-200 p-4 my-2 "
            >
                <card-historial-clinico
                :historialClinico="item"
                />
               
            </div>
        </div>

    </div>
</template>

<script setup >

import { ref, watch, toRefs, onMounted } from 'vue';
import FormHistorial from './HistorialClinico/FormHistorial.vue';
import CardHistorialClinico from './HistorialClinico/CardHistorialClinico.vue';
import axios from 'axios';
import baseUrl from '../../baseUrl';

const props =  defineProps({
  tiposHistoriasClinicas: Array,
  diagnosticos: Array,
  examenesAuxiliares: Array,
  productos: Array,
  mascotaId: Number
})

const { tiposHistoriasClinicas,  diagnosticos ,examenesAuxiliares, mascotaId  } = toRefs(props);

const historiasClinicas = ref([])

const tipoHistorialClinico = ref(null);
const tiposHistoriasClinicasFiltradas = ref(tiposHistoriasClinicas.value.filter(
    (t) => t.nombre !== 'Tratamiento')
)

onMounted(() => {
    getHistorialClinico()
})
const getHistorialClinico = async () => {
    tipoHistorialClinico.value = null
    const response = await axios.get(`${baseUrl}/api/historiaClinica?mascota_id=${mascotaId.value}`)
    historiasClinicas.value = response.data
}

</script>

<style scoped>

</style>