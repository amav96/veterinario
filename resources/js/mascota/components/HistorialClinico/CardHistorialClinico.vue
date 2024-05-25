<template>
   <div class="flex flex-col ">
        <div>
            <span>{{ historialClinico.tipo_historia_clinica.nombre }}</span>
        </div>
        <div>
            <span>{{ historialClinico.created_at.substr(0, 10) }}</span>
        </div>
    </div>
</template>

<script setup>

import { ref, watch, toRefs, onMounted, defineProps } from 'vue';

const props =  defineProps({
  historialClinico: Object
})

const { historialClinico } = toRefs(props);

</script>

<style lang="scss" scoped>

</style>