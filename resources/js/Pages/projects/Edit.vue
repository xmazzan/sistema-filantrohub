<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout
    },

    data() {
        return {
            form: useForm({
                image: null,
                title: null,
                postcode: null,
                days: [],
                state: null,
                city: null,
                neighborhood: null,
                street: null,
                number: null,
                complement: null,
                description: null,
            }),
        };
    },
}
</script>

<template>
    
</template>