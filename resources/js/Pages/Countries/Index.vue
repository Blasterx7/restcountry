<template>
    <div>
        <li v-for="p in countries" :key="p.name">
            {{ p.name }}
        </li>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';
defineProps({
    countries: {
        type: Array,
        required: true
    },
});
</script>
