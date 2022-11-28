<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout
    },

    props: {

    },

    methods: {
        showProject(id) {
            Inertia.get(route('projects.show', {project: id}))
        }
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
                    <tr>
                        <td scropt="row"> 1 </td> <!-- {{ $loop->index + 1 }} id -->
                        <td><a href=""> $event->title </a></td>
                        <!-- <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td> Details.vue LINK PARA VISUALIZAÇÃO DO EVENTO -->
                        <td>0</td> <!-- {{ count($event->users) }} -->
                        <td>
                            <a href="#" class="btn btn-info edit-btn" @click="updateProject(project.id)"><ion-icon name="create-outline"></ion-icon> Editar</a>    
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
                    <tr>
                        <td scropt="row"> 1 </td> <!-- {{ $loop->index + 1 }} -->
                        <td><a href="#" @click="showProject(project.id)">project->title</a></td> <!-- <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td> -->
                        <!-- LINK PARA VISUALIZAÇÃO DO EVENTO -->
                        <td>count</td> <!-- {{ count($event->users) }} {{-- <td>0</td> --}} -->
                        <td>
                            <a href="#" class="btn btn-danger delete-btn" @click="leaveProject(project.id)">
                                <ion-icon name="trash-outline"></ion-icon> Deletar
                            </a>
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