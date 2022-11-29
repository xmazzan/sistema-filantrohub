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
            Inertia.get(route('Know', {projetos: id}))
        }
    }
}
</script>

<template>
<AppLayout title="Projetos">
    <div id="event-container" class="col-md-6 offset-md-3">
        <h1 class="ml-60 text-xl font-bold">Crie o seu evento</h1>
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
                        <td scropt="row"> 1 </td>
                        <td><a href=""> $project->title </a></td>
                        <td>0</td>
                        <td>
                            <a href="#" class="btn btn-info edit-btn" @click="updateProject(projetos.id)"><ion-icon name="create-outline"></ion-icon> Editar</a>    
                            <a href="#" class="btn btn-danger delete-btn" style="margin-left: 5px;" @click="deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-10 offset-md-1 dashboard-title-container"> 
            <h1>Eventos que estou participando</h1>
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
                        <td scropt="row"> 1 </td>
                        <td><a href="#" @click="showProject(projetos.id)">project->title</a></td> 
                        <td>count</td>
                        <td>
                            <a href="#" class="btn btn-danger delete-btn" @click="leaveProject(projetos.id)">
                                <ion-icon name="trash-outline"></ion-icon> Deletar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <footer class="bg-[#1da1f2] p-20">
        <p class="text-center font-bold truncate">FILANTROHUB</p>
        <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
    </footer>
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
