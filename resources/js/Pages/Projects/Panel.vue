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
        projects: Object,
        projectsVolunteering: Object,
        volunteersCount: Object,
        //msg: String,
    },
    
    methods: {
        datesJsonToString() {
            
        },

        showProject(id) {
            Inertia.get(route('projects.show', {project: id}))
        },

        updateProject(id){
            Inertia.get(route('projects.edit', {project: id}))
        },

        deleteProject(id) {
            Swal.fire({
                titleText: `Deseja excluir o projeto ${id}?`,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#009FE3',
                showDenyButton: true,
                denyButtonText: 'Não'
            }).then(result => {
                if (!result.isConfirmed) {
                    return;
                }
                Inertia.delete(route('projects.destroy', {project: id}));
            });
        },

        editProject(id) {
            Inertia.get(route('edit', {project: id}))
        },

        leaveProject(id) {
            Swal.fire({
                titleText: `Deseja sair do projeto ${id}?`,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#009FE3',
                showDenyButton: true,
                denyButtonText: 'Não'
            }).then(result => {
                if (!result.isConfirmed) {
                    return;
                }
                Inertia.delete(route('projects.destroy', {project: id}));
            });
        },
    }
}
</script>

<template>
    <AppLayout title="Home">
        <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1>Meus Projetos</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projects.data" :key="project.id"> <!--  -->
                        <td scropt="row"> {{ project.id }} </td> <!-- {{ $loop->index + 1 }} id -->
                        <td><a href=""> {{project.title}} </a></td> <!-- this.props.user.event -->
                        <!-- <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td> Details.vue LINK PARA VISUALIZAÇÃO DO EVENTO -->
                        <td>{{  }}</td> <!-- {{ count($event->users) }} -->
                        <td>
                            <a href="#" class="btn btn-info edit-btn" @click="editProject(project.id)"><ion-icon name="create-outline"></ion-icon> Editar</a>    
                            <a href="#" class="btn btn-danger delete-btn" style="margin-left: 5px;" @click="deleteProject(project.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-title-container"> <!-- md-1 é para ficar centralizada -->
            <h1>Projetos que estou participando</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="volunteering in projectsVolunteering" :key="volunteering.id"> <!-- .data -->
                        <td scropt="row"> {{ volunteering.id }} </td> <!-- {{ $loop->index + 1 }} -->
                        <td><a href="#" @click="showProject(volunteering.id)"> {{ volunteering.title }} </a></td> <!-- <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td> -->
                        <!-- LINK PARA VISUALIZAÇÃO DO EVENTO -->
                        <td> volunteering </td> <!-- {{ count($event->users) }} {{-- <td>0</td> --}} -->
                        <td>
                            <a href="#" class="btn btn-danger delete-btn" @click="leaveProject(volunteering.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                            <!--
                            <form action="/events/leave/{{ $event->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Sair do Evento</button>
                            </form>
                            -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>

<style scoped>
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