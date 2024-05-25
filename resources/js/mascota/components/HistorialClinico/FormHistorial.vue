<template>
    <div class="border p-3 rounded mt-1">
        <div class="flex flex-row flex-wrap gap-4">
            <div class="mb-3">
                <label 
                class="form-label">
                    Fecha de atencion
                </label>
                <input 
                type="datetime-local"
                class="form-control" 
                v-model="formulario.fecha_atencion"
                >
            </div>
            <div class="mb-3">
                <label 
                class="form-label">
                    Motivo de consulta
                </label>
                <input 
                type="text"
                class="form-control"
                v-model="formulario.motivo_atencion"
                >
            </div>
        </div>
        <div>
            <label
            class="form-label"
            >
            Anamnesis y descripción del caso
            </label>
            <textarea
            class="form-control"
            v-model="formulario.descricion"
            />
        </div>
    </div>

    <div class="border p-3 rounded mt-1 flex flex-col">
        <div class="mb-2 font-semibold">
            Constante fisiologicas
        </div>

        <div class="flex flex-row gap-2 flex-wrap">
            <!-- temperatura -->
            <div class="input-group mb-3">
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                <i class="fa fa-thermometer-empty " aria-hidden="true"></i>
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="Temperatura" 
                v-model="formulario.temperatura"
                >

                <!-- frecuencia cardiaca -->
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                <i class="fa fa-heart" aria-hidden="true"></i>
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="Frecuencia cardiaca" 
                v-model="formulario.frecuencia_cardiaca"
                >
            </div>
            <!-- frecuencia_respiratoria -->
            <div class="input-group mb-3">
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                FR
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="frecuencia respiratoria" 
                v-model="formulario.frecuencia_respiratoria"
                >

                <!-- peso -->
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                PS
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="Peso" 
                v-model="formulario.peso"
                >
            </div>

            
           
            <!-- porcentaje hidratacion -->
            <div class="input-group mb-3">
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                DHT
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="porcentaje hidratacion" 
                v-model="formulario.porcentaje_hidratacion"
                >

                <!-- tiempo llenado capilar -->
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                TLC
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="tiempo llenado capilar" 
                v-model="formulario.tiempo_llenado_capilar"
                >
            </div>

            
           
            <!-- presion arterial -->
            <div class="input-group mb-3">
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                PA
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="Presion arterial" 
                v-model="formulario.presion_arterial"
                >

                <!-- examen tacto rectal -->
                <span 
                style="min-width: 50px;"
                class="input-group-text flex justify-center"
                >
                DRE
                </span>
                <input 
                type="text" 
                class="form-control" 
                placeholder="examen tacto rectal" 
                v-model="formulario.examen_tacto_rectal"
                >
            </div>
        </div>
        
    </div>

    <div class="border p-3 rounded mt-1 flex flex-col">
        <div class="mb-3">
            <label 
            class="form-label">
                Examen clinico
            </label>
            <textarea 
            class="form-control"
            v-model="formulario.examen_clinico"
            />
        </div>
    </div>

    <div class="border p-3 rounded mt-1 flex flex-col">
        <div class="mb-2 font-semibold">
            Exámenes auxiliares
        </div>
        <combo-form
        :defaultValue="[]"
        :titulo="''"
        :options="examenesAuxiliares"
        />
    </div>

</template>

<script setup>
import { reactive } from 'vue';
import ComboForm from './ComboForm.vue';

const props =  defineProps({
    diagnosticos: Array,
  examenesAuxiliares: Array,
})

const formulario = reactive({
    fecha_atencion: null,
    motivo_atencion: null,
    descricion: null,
    temperatura: null,
    frecuencia_cardiaca: null,
    frecuencia_respiratoria: null,
    peso: null,
    porcentaje_hidratacion: null,
    tiempo_llenado_capilar: null,
    presion_arterial: null,
    examen_tacto_rectal: null,
    examen_clinico: null,
        

})

</script>

<style lang="scss" scoped>

</style>