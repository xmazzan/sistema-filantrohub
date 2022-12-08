<script>
import editar from '@/Components/editar.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from '@/Components/Modal.vue';


export default {
    components: {
        AppLayout,
        editar,
        Modal
    },
   
    data () {
        return{
            show:false,
            botao:"",
            
        };
    },
    methods: {
        showProject(id) {
            Inertia.get(route('Know', {projetos: id}))
        },
        

    },
   
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
      <tr class="border-b bg-white ">
        <td class="text-center text-[13px] sm:text-base">1</td>
     
        <td class="text-center text-[13px] sm:text-base">Doação de roupas</td>
     
        <td class="text-center text-[13px] sm:text-base">90</td>
     
  
        <td class="text-center text-[13px]">
          <div class="sm:p-[5%]">
            <a  id="editar" class="btn btn-info edit-btn p-[5%] w-full mb-[5%] sm:max-w-[50%] sm:mb-0 sm:mr-[2%] " @click="updateProject(projetos.id)"
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
      <tr class="border-b bg-white ">
        <td class="text-center text-[13px] sm:text-base">1</td>
     
        <td class="text-center text-[13px] sm:text-base">Doação de roupas</td>
     
        <td class="text-center text-[13px] sm:text-base">90</td>
     
  
        <td class="text-center text-[13px]">
          <div class="sm:p-[5%]">
            <a  id="editar" class="btn btn-info edit-btn p-[5%] w-full mb-[5%] sm:max-w-[50%] sm:mb-0 sm:mr-[2%] " @click="updateProject(projetos.id)"
          ><ion-icon name="create-outline "></ion-icon> Editar</a>    
          
          <a  class="btn btn-danger delete-btn p-[5%] w-full sm:max-w-[50%]" @click="deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
          </div>
        </td>
      </tr>

      

     

     
    </tbody>
  </table>
</div>




</AppLayout>

</template>







 <a href="#" @click="showProject(projetos.id)">project->title</a>




 <a href="#" class="btn btn-danger delete-btn" @click="leaveProject(projetos.id)">
    <ion-icon name="trash-outline"></ion-icon> Deletar
</a>
