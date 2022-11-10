<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout
    },

    props: {
        //erros: Object,
        project: object,
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

    methods: {
        submitForm() {
            this.form
                .put(
                    route('Projects.update', {project: this.subject.id}),
                    {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                titleText: 'Projeto editado com sucesso',
                                toast: true,
                                position: 'top-end',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            });
                        }
                    }
                )
        },
    },
}
</script>

<template>
    
</template>