<template>
    <div v-if="mostrarFechaAtencion || mostrarMotivoAtencion || mostrarDescripcion" class="border p-3 rounded mt-1">
        <div  class="flex flex-row flex-wrap gap-4">
            <div
            v-if="mostrarFechaAtencion"
            class="mb-3">
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
            <div
            v-if="mostrarMotivoAtencion"
            class="mb-3">
                <label 
                class="form-label">
                {{  tipoHistorialClinico === 'Cirugia' ? 'Nombre cirugia' : 'Motivo de consulta' }}
                </label>
                <input 
                type="text"
                class="form-control"
                v-model="formulario.motivo_atencion"
                >
            </div>
        </div>
        <div
        v-if="mostrarDescripcion"
        >
            <label
            class="form-label"
            >
            Anamnesis y descripción del caso
            </label>
            <textarea
            class="form-control"
            v-model="formulario.descripcion"
            />
        </div>
    </div>

    
    <div 
    class="border p-3 rounded mt-1 flex flex-col"
    >
        <!-- constante fisiologicas -->
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

    <!-- cirugia -->
    <div 
    class="border p-3 rounded mt-1 flex flex-row flex-wrap"
    v-if="tipoHistorialClinico === 'Cirugia'"
    >

        <div class="form-check form-check-inline">
            <input v-model="formulario.conformidad_pago" class="form-check-input" type="checkbox"  value="true">
            <label class="form-check-label">Conformidad de Pago</label>
        </div>
        <div class="form-check form-check-inline">
            <input v-model="formulario.documentacion_firmada" class="form-check-input" type="checkbox"  value="true">
            <label class="form-check-label">Documentacion Firmada</label>
        </div>
        <div class="form-check form-check-inline">
            <input v-model="formulario.riesgo_quirurgico"  class="form-check-input" type="checkbox"  value="true" >
            <label class="form-check-label"> Riesgo Quirúrgico</label>
        </div>
        <div class="form-check form-check-inline">
            <input v-model="formulario.miccion" class="form-check-input" type="checkbox"  value="true" >
            <label class="form-check-label"> Micción - Deposicion</label>
        </div>
        <div class="form-check form-check-inline">
            <input v-model="formulario.ayuno_previo" class="form-check-input" type="checkbox"  value="true" >
            <label class="form-check-label"> Ayuno previo</label>
        </div>
        
    </div>

    <!-- examen clinico -->
    <div 
    v-if="mostrarExamenClinico"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
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

    <!-- diagnostico -->
    <div 
    v-if="mostrarDiagnostico"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Diagnostico
        </div>
        <combo-form
        :defaultValue="[]"
        :options="diagnosticos"
        ref="refDiagnostico"
        />
    </div>

    <!-- examenes auxiliares -->
    <div 
    v-if="mostrarExamenAuxiliar"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Exámenes auxiliares
        </div>
        <combo-form
        :defaultValue="[]"
        :options="examenesAuxiliares"
        ref="refExamenAuxiliar"
        />
    </div>

    <!-- tratamiento -->
    <div 
    v-if="mostrarTratamiento"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Tratamiento
        </div>
        <combo-form
        :defaultValue="[]"
        :options="productos.map((p) => ({
            ...p,
            nombre: p.Producto
        }))"
        ref="refTratamiento"
        />
    </div>

    <!-- vacuna -->
    <div 
    v-if="mostrarVacuna"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Vacunas
        </div>
        <combo-form
        :defaultValue="[]"
        :options="productos.map((p) => ({
            ...p,
            nombre: p.Producto
        }))"
        ref="refVacuna"
        />
    </div>

    <!-- antiparasitarios -->
    <div 
    v-if="mostrarAntiparasitarios"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Antiparasitarios
        </div>
        <combo-form
        :defaultValue="[]"
        :options="productos.map((p) => ({
            ...p,
            nombre: p.Producto
        }))"
        ref="refAntiparasitarios"
        />
    </div>

    <!-- antipulgas -->
    <div 
    v-if="mostrarAntipulgas"
    class="border p-3 rounded mt-1 flex flex-col mb-2">
        <div class="mb-2 font-semibold">
            Antipulgas
        </div>
        <combo-form
        :defaultValue="[]"
        :options="productos.map((p) => ({
            ...p,
            nombre: p.Producto
        }))"
        ref="refAntipulgas"
        />
    </div>

    <div 
    v-if="exito"
    class="alert alert-success" role="alert">
    Creado correctamente
    </div>

    <div 
    v-if="error"
    class="alert alert-danger" role="alert">
     No se ha creado correctamente
    </div>  

    <div class="flex flex-row justify-between my-2">
        <button 
        type="button" 
        class="btn btn-danger"
        @click="emit('salir')"
        >
            Atras
        </button>
        <button 
        type="button" 
        class="btn btn-success"
        @click="guardarHistorialClinico"
        :disabled="!algunCampoTieneDatos || guardandoHistorialClinico"
        >
           {{ guardandoHistorialClinico ? 'Guardando...' : 'Guardar' }}        
        </button>
    </div>

</template>

<script setup>
import { reactive, toRefs, computed, ref } from 'vue';
import ComboForm from './ComboForm.vue';
import axios from 'axios';
import baseUrl from '../../../baseUrl';

const props =  defineProps({
    diagnosticos: Array,
    examenesAuxiliares: Array,
    productos: Array,
    tipoHistorialClinico: String,
    tiposHistoriasClinicas: Array,
    mascotaId: Number
})

const emit = defineEmits(["salir", "actualizarHistorial"])

const { tiposHistoriasClinicas, diagnosticos, examenesAuxiliares, productos, tipoHistorialClinico, mascotaId } = toRefs(props);

const formulario = reactive({
    fecha_atencion: null,
    motivo_atencion: null,
    descripcion: null,

    // constantes fisiologicas
    temperatura: null,
    frecuencia_cardiaca: null,
    frecuencia_respiratoria: null,
    peso: null,
    porcentaje_hidratacion: null,
    tiempo_llenado_capilar: null,
    presion_arterial: null,
    examen_tacto_rectal: null,
    examen_clinico: null,

    // cirugia
    conformidad_pago: null,
    documentacion_firmada: null,
    riesgo_quirurgico: null,
    miccion: null,
    ayuno_previo: null,
    
})

const refDiagnostico = ref(null) 
const refExamenAuxiliar = ref(null) 
const refTratamiento = ref(null) 
const refVacuna = ref(null) 
const refAntiparasitarios = ref(null) 
const refAntipulgas = ref(null) 

const mostrarFechaAtencion = computed(() => 
    ['Consulta','Control', 'Cirugia', 'Vacuna', 'Antiparasito','Antipulgas'].includes(tipoHistorialClinico.value)
)
const mostrarMotivoAtencion = computed(() => 
    ['Consulta','Control', 'Cirugia'].includes(tipoHistorialClinico.value)
)
const mostrarDescripcion = computed(() => 
    ['Consulta','Control', 'Vacuna'].includes(tipoHistorialClinico.value)
)
const mostrarDiagnostico = computed(() => 
    ['Consulta','Control'].includes(tipoHistorialClinico.value)
)  
const mostrarExamenAuxiliar = computed(() => 
    ['Consulta','Control'].includes(tipoHistorialClinico.value)
)  
const mostrarTratamiento = computed(() => 
    ['Consulta','Control'].includes(tipoHistorialClinico.value)
)  
const mostrarVacuna = computed(() => 
    ['Vacuna'].includes(tipoHistorialClinico.value)
)  
const mostrarAntiparasitarios = computed(() => 
    ['Antiparasitario'].includes(tipoHistorialClinico.value)
) 
const mostrarAntipulgas = computed(() => 
    ['Antipulgas'].includes(tipoHistorialClinico.value)
)  
const mostrarExamenClinico = computed(() => 
    ['Consulta','Control'].includes(tipoHistorialClinico.value)
)

const guardarHistorialClinico = () => {
    let historialClinico = {
        ...formulario,
        idMascota: mascotaId.value,
        tipo_historia_clinica_id: tiposHistoriasClinicas.value.find((t) => t.nombre === tipoHistorialClinico.value).id
    }
    if(refDiagnostico?.value?.combos){
        historialClinico.diagnosticos_mascotas = refDiagnostico.value.combos.map((d) => {
            return {
                diagnostico_id : d.id,
                observacion: d.observacion
            }
        })
    }

    if(refExamenAuxiliar?.value?.combos){
        historialClinico.examenes_auxiliares_mascotas = refExamenAuxiliar.value.combos.map((d) => {
            return {
                examen_auxiliar_id : d.id,
                observacion: d.observacion,
                mascota_id:  mascotaId.value,
            }
        })
    }

    if(refTratamiento?.value?.combos){
        historialClinico.tratamientos = refTratamiento.value.combos.map((d) => {
            return {
                producto_id : d.id,
                observacion: d.observacion
            }
        })
    }

    if(refVacuna?.value?.combos){
        historialClinico.vacunas = refVacuna.value.combos.map((d) => {
            return {
                producto_id : d.id,
                observacion: d.observacion
            }
        })
    }

    if(refAntiparasitarios?.value?.combos){
        historialClinico.anti_parasitarios = refAntiparasitarios.value.combos.map((d) => {
            return {
                producto_id : d.id,
                observacion: d.observacion
            }
        })
    }
    if(refAntipulgas?.value?.combos){
        historialClinico.anti_pulgas = refAntipulgas.value.combos.map((d) => {
            return {
                producto_id : d.id,
                observacion: d.observacion
            }
        })
    }

    crearHistorial(historialClinico)
}

const guardandoHistorialClinico = ref(false)
const exito = ref(false)
const error = ref(false)
const crearHistorial = async (data) => {
    error.value = false;
    exito.value = false;
    if(guardandoHistorialClinico.value) return 
   try {
    guardandoHistorialClinico.value = true;
    const response = await axios.post(baseUrl + '/api/historiaClinica', data)
    
    setTimeout(() => {
        emit("actualizarHistorial")
        emit("salir")
    }, 1000);
   } catch (error) {
        error.value = true;
   } finally{
    exito.value = true;
    setTimeout(() => {
        guardandoHistorialClinico.value = false;
    }, 1000);
    
   } 
}

const algunCampoTieneDatos =  computed(() => {
    return Object.values(formulario).some((value) => value)
})


</script>

<style lang="scss" scoped>

</style>