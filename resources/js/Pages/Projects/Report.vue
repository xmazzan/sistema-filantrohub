<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2';

export default {
    
    components: {
        AppLayout
    },

    props: {
        project: Object,
        users: Object,
        volunteersCount: Object,
    }
}
</script>

<template>
    <AppLayout title="Home">
        <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1>Meus Projetos</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <p id="title">Número de participantes inscritos: {{ volunteersCount }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id"> <!--  v-for="project in projects.data" :key="project.id" -->
                        <td scropt="row"> {{ user.id }} </td>
                        <td><a href=""> {{user.name}} </a></td>
                        <td  @click="showReport(project.id)"><a href="#">{{ user.email }}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>

<style scoped>

#title {
    margin: 0 auto;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: red;
}
.dashboard-title-container {
    margin-bottom: 30px;
    margin-top: 30px;
}

.dashboard-events-container th {
    width: 25%;
}

.dashboard-events-container a{
    display: inline-block;
}

/* Edit - img */
.img-preview {
    width: 100px;
    margin-top: 20px;
}

</style>