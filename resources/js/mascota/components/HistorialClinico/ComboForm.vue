<template>
    <div>
        <div class="mb-2">
            <autocomplete
            :search="search"
            placeholder="Buscar"
            result-list-label="nombre"
            :getResultValue="result => result.nombre"
            @submit="onSubmit"
            ref="refAutocomplete"
            ></autocomplete>
        </div>
        <div v-for="(combo, index) in combos" :key="index">
            <div class="input-group mb-3">
                <input 
                type="text" 
                class="form-control mr-1" 
                placeholder="Nombre" 
                v-model="combos[index].nombre"
                >
                <input 
                type="text" 
                class="form-control mr-1" 
                placeholder="Descripcion | Indicacion" 
                v-model="combos[index].observacion"
                >
                <!-- agregar botton eliminar bootstrap -->
                <button 
                type="button" 
                class="btn btn-outline-danger"
                @click="removerCombo(index)"
                >X
                </button>
            </div>
            
        </div>
    </div>
</template>

<script setup>
import { ref, toRefs, onMounted } from 'vue';
import Autocomplete from '@trevoreyre/autocomplete-vue'

const props = defineProps({
  defaultValue: {
    type: Array,
    required: false,
  },
  titulo: {
    type: String,
    required: false,
  },
  options: {
    type: Array,
    required: false,
  },
});

const emit = defineEmits(['submit', 'remover'])

const { defaultValue, options } = toRefs(props);

const refAutocomplete = ref(null);

const search = (value) => {
    return options.value.filter((option) => {
        return option.nombre.toLowerCase().includes(value.toLowerCase());
    });
}

const onSubmit = (value) => {
    let nuevoValor = {
        id: value.id,
        nombre: value.nombre,
        observacion: ''
    }
    combos.value.push(nuevoValor)
    refAutocomplete.value.value = ''
    emit('submit', nuevoValor)
}

const combos = ref([])

const removerCombo = (index) => {
    let combo = {...combos.value[index]}
    combos.value.splice(index, 1)
    emit('remover', combo)
}

defineExpose({
    combos
})

</script>

<style lang="scss" scoped>

</style>