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

        showReport(id) {
            Inertia.get(route('projects.report', {project: id}))
        }
    }
}
</script>

<template>
    <AppLayout title="Home">
        <div class="p-[2%] ">
            <h1 class="text-xl sm:text-5xl text-center mb-4 font-bold ">Projetos criados</h1>
            <table class="w-full h-40 sm:h-56">
                <thead class="border-b bg-zinc-900">
                <tr>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6 ">Id</th>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6">Nome</th>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6">Relatório</th>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6">Ações</th>
                </tr>
                </thead>
                <tbody class="sm:whitespace-nowrap " >
                    <tr class="border-b bg-white " v-for="project in projects.data" :key="project.id">
                        <td class="text-center text-[13px] sm:text-base">{{ project.id }}</td>
                        <td class="text-center text-[13px] sm:text-base">{{project.title}}</td>
                        <td class="text-center text-[13px] sm:text-base" @click="showReport(project.id)"><a href="#">Relatório</a></td>
                        <td class="text-center text-[13px]">
                            <div class="sm:p-[5%]">
                                <a  id="editar" class="btn btn-info edit-btn p-[5%] w-full mb-[5%] sm:max-w-[50%] sm:mb-0 sm:mr-[2%] " @click="editProject(project.id)">
                                    <ion-icon name="create-outline "></ion-icon> Editar</a>
                                <a class="btn btn-danger delete-btn p-[5%] w-full sm:max-w-[50%]" @click="deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h1 class="text-xl  sm:text-5xl text-center mb-4 font-bold mt-4">Projetos que estou participando</h1>
            <table class="w-full h-50">
                <thead class="border-b bg-zinc-900">
                <tr>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6 ">Id</th>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6">Nome</th>
                    <th scope="col" class="text-center text-[15px] text-white sm:px-6">Ações</th>
                </tr>
                </thead>
                <tbody class="sm:whitespace-nowrap">
                    <tr v-for="volunteering in projectsVolunteering" :key="volunteering.id"> 
                        <td class="text-center text-[13px] sm:text-base" >{{ volunteering.id }}</td>
                        <td class="text-center text-[13px] sm:text-base"><a href="#" @click="showProject(volunteering.id)">{{ volunteering.title }}</a></td>
                        <td class="text-center text-[13px]">
                        <div class="sm:p-[5%]">  
                            <a  class="btn btn-danger delete-btn p-[4%] w-full sm:max-w-[45%]" @click="leaveProject(volunteering.id)"> Deletar</a>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
    </AppLayout>
</template>

<style scoped>

#panel-width {
    width: 80%;
    margin: 0 auto;
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