<template>
   <div>
        <div class="flex flex-row justify-end " >
            <div class="dropdown items-end">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Nuevo registro
                </button>
                <ul class="dropdown-menu cursor-pointer">
                    <li
                    v-for="(item, index) in tiposHistoriasClinicas"
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

        <template v-if="tipoHistorialClinico">
            <form-historial
            :diagnosticos="diagnosticos"
            :examenes-auxiliares="examenesAuxiliares"
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

const props =  defineProps({
  tiposHistoriasClinicas: Array,
  historiasClinicas: Array,
  diagnosticos: Array,
  examenesAuxiliares: Array,
})

const { tiposHistoriasClinicas, historiasClinicas, diagnosticos ,examenesAuxiliares  } = toRefs(props);

const tipoHistorialClinico = ref(null);

onMounted(() => {
    console.log(historiasClinicas.value)
})

</script>

<style scoped>

</style>