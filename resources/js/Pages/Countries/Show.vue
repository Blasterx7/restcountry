<template>
    <div>
        <h1>Countries</h1>
        <ul>
            {{ country }}
        </ul>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    country: {
        type: Object,
        required: true
    },
});
</script>