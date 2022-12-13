<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';



export default {
    components: {
        AppLayout,
      
    },
   
    props: {

      projects: Object,
      projectsVolunteering: Object,
     
    },

   
    methods: {
      showProject(id) {
            Inertia.get(route('projects.show', {project: id}))
        },
        updateProject(id){
            Inertia.get(route('projects.edit', {project: id}))
        },
        deleteCustomer(id) {
            Swal.fire({
                titleText: `Deseja excluir o cliente ${id}?`,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#009FE3',
                showDenyButton: true,
                denyButtonText: 'Não'
            }).then(result => {
                if (!result.isConfirmed) {
                    return;
                }
                Inertia.delete(route('customers.destroy', {customer: id}));
            });
        },

        editProject(id) {
            Inertia.get(route('edit', {project: id}))
        },

        leaveProject(id) {
            Swal.fire({
                titleText: `Deseja excluir o cliente ${id}?`,
                confirmButtonText: 'Sim',
                confirmButtonColor: '#009FE3',
                showDenyButton: true,
                denyButtonText: 'Não'
            }).then(result => {
                if (!result.isConfirmed) {
                    return;
                }
                Inertia.delete(route('destroy', {volunteering: id}));
            });
        }
    }
     
}
</script>

<template>
    
<AppLayout title="Projetos">
   

<div class="p-[2%] ">
  <h1 class="text-xl sm:text-5xl text-center mb-4 font-bold ">Eventos criados</h1>

  <table class="w-full h-40 sm:h-56">
    <thead class="border-b bg-zinc-900">
      <tr>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6 ">ID</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">NOME</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">VOLUNTÁRIOS</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">AÇÕES</th>
      </tr>
    </thead>
    <tbody class="sm:whitespace-nowrap">
      <tr class="border-b bg-white " v-for="project in projects.data" :key="project.id">
        <td class="text-center text-[13px] sm:text-base">{{ project.id }}</td>
     
        <td class="text-center text-[13px] sm:text-base">{{project.title}}</td>
     
        <td class="text-center text-[13px] sm:text-base">90</td>
     
  
        <td class="text-center text-[13px]">
          <div class="sm:p-[5%]">
            <a  id="editar" class="btn btn-info edit-btn p-[5%] w-full mb-[5%] sm:max-w-[50%] sm:mb-0 sm:mr-[2%] " @click="editProject(project.id)"
          ><ion-icon name="create-outline "></ion-icon> Editar</a>    
          
          <a  class="btn btn-danger delete-btn p-[5%] w-full sm:max-w-[50%]" @click="deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
          </div>
        </td>
      </tr>
      

   
     

     
    </tbody>
  </table>

  <h1 class="text-xl  sm:text-5xl text-center mb-4 font-bold mt-4">Eventos voluntáriados</h1>

  <table class="w-full h-60">
    <thead class="border-b bg-zinc-900">
      <tr>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6 ">ID</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">NOME</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">VOLUNTÁRIOS</th>
        <th scope="col" class="text-center text-[15px] text-white sm:px-6">AÇÕES</th>
      </tr>
    </thead>
    <tbody class="sm:whitespace-nowrap">
      <tr class="border-b bg-white " v-for="volunteering in projectsVolunteering.data" :key="volunteering.id">
        <td class="text-center text-[13px] sm:text-base" >{{ volunteering.id }}</td>
     
        <td class="text-center text-[13px] sm:text-base"><a href="#" @click="showProject(project.id)">{{ volunteering.title }}</a></td>
     
        <td class="text-center text-[13px] sm:text-base">90</td>
     
  
        <td class="text-center text-[13px]">
          <div class="sm:p-[5%]">  
          <a  class="btn btn-danger delete-btn p-[5%] w-full sm:max-w-[50%]" @click="leaveProject(project.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
          </div>
        </td>
      </tr>

      

     

     
    </tbody>
  </table>
</div>




</AppLayout>

</template>







 