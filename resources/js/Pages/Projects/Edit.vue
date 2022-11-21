<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
//import Swal from 'sweetalert2';
export default {
    components: {
        AppLayout
    },
    props: {
        erros: Object,
        subject: Object,
    },
    data() {
        return {
            form: useForm({
                image: this.subject.name,
                title: this.subject.title,
                postcode: this.subject.postcode,
                days: this.subject.days,
                state: this.subject.state,
                city: this.subject.city,
                neighborhood: this.subject.neighborhood,
                street: this.subject.street,
                number: this.subject.number,
                complement: this.subject.complement,
                description: this.subject.description,
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
                            /*Swal.fire({
                                icon: 'success',
                                titleText: 'Projeto editado com sucesso',
                                toast: true,
                                position: 'top-end',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            });*/
                        }
                    }
                )
        },
    },
}
</script>

<template>
    
</template>