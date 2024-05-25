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
                class="form-control" 
                placeholder="Nombre" 
                v-model="combos[index].nombre"
                >
                <input 
                type="text" 
                class="form-control" 
                placeholder="Descripcion" 
                v-model="combos[index].descripcion"
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

const props =  defineProps({
    defaultValue: Array,
    titulo: String,
    options: Array
})

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
        nombre: value.nombre,
        descripcion: ''
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

</script>

<style lang="scss" scoped>

</style>