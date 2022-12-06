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
   
  <!--
    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b bg-zinc-900">
              <tr>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  #
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  NOME
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  VOLUNTÁRIOS
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  AÇÕES
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b bg-white">
                <td class="px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">1</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap text-center">
                  Entrega de aliementos perecívieis
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap text-center">
                  10
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center"> 
                        
                        <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                        ><ion-icon name="create-outline "></ion-icon> Editar</a>    
                        
                        <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b">
                <td class="px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">2</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap text-center">
                  doaçao de livros 
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap text-center">
                 70
                </td>
                <td class="text-[12px]text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
                  
                    <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                    ><ion-icon name="create-outline"></ion-icon> Editar</a>    
                  
                    <a  class="btn btn-danger delete-btn m-[5%] " @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b">
                <td class="px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">3</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap text-center" >
                  Larry
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap text-center">
                  Wild
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
                   
                    <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                    ><ion-icon name="create-outline"></ion-icon> Editar</a>    
                
                    <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
              <tr class="border-b bg-white">
                <td class="px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">4</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-center">
                  Entrega de coberto nas ruas
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-center">
                  89
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
                 
                        <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                        ><ion-icon name="create-outline "></ion-icon> Editar</a>    
                       
                        <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <h1 class="text-center m-4 font-black">Eventos que estou participando</h1>
          <table class="min-w-full">
            <thead class="border-b bg-zinc-900">
              <tr>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  #
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  NOME
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  PARTICIPANTES
                </th>
                <th scope="col" class="px-2 py-2 text-[12px] font-medium text-white sm:px-6 sm:py-4 text-center">
                  AÇÕES
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">1</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-center">
                  Mark
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-center">
                  Otto
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
                   
                        <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                        ><ion-icon name="create-outline "></ion-icon> Editar</a>    
                 
                        <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b">
                <td class="px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">2</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-center">
                  Jacob
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-center">
                  Thornton
                </td>
                <td class="text-[12px]text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
             
                    <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                    ><ion-icon name="create-outline"></ion-icon> Editar</a>    
                
                    <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
              <tr class="bg-white border-b">
                <td class="px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-[12px] font-medium text-gray-900 text-center">3</td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4  whitespace-nowrap text-center" >
                  Larry
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 whitespace-nowrap text-center">
                  Wild
                </td>
                <td class="text-[12px] text-gray-900 font-light px-2 py-2 sm:px-6 sm:py-4 sm:whitespace-nowrap">
                  <div class="flex flex-col sm:block sm:text-center">
                  
                    <a  id="editar" class="btn btn-info edit-btn m-[5%]" @click="show=true,botao='Editar',updateProject(projetos.id)"
                    ><ion-icon name="create-outline"></ion-icon> Editar</a>    
                  
                    <a  class="btn btn-danger delete-btn m-[5%]" @click="botao='Deletar',show=true,deleteProject(projetos.id)"><ion-icon name="trash-outline"></ion-icon> Deletar</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
-->
<div class="p-[2%] ">
  <h1 class="text-5xl text-center mb-4 font-bold ">Eventos criados</h1>

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

  <h1 class="text-5xl text-center mb-4 font-bold mt-4">Eventos voluntáriados</h1>

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
