<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Home">
        <section class="w-full h-[calc(100vh_-_64px)] bg-no-repeat justify-around bg-[length:100vw_91vh]" style="background-image: url(../imgs/main3.png)">
            <div class=" flex  items-center flex-col text-center justify-center h-[74%]">
                <div class="p-[3.25rem]">
                    <img  class="inline-flex w-32 sm:w-40 " src="imgs/fh150.png" alt="logo">
                </div>

                <div class="flex items-center justify-center w-4/5 max-w-xl">
                    <input type="text" class="w-4/5 max-w-xl padding-top texto rounded-xl shadow-md shadow-black" placeholder="Busque um projeto">
                </div>

                <div class="pt-8 justify-center w-full paddin-top-1-5">
                    <span class="text-xs text-white sm:text-lg"> BUSQUE POR CIDADE, INSTITUIÇÃO OU TIPO DO EVENTO </span>
                </div>
            </div>
        </section>

            <section>
                <div class="py-8 text-center text-black text-xl font-bold lg:text-2xl">
                    <h1> PROJETOS EM DESTAQUE </h1>
                </div>
                <ul class="after:content-[''] after:bg-stone-900/[.3]  after:h-0.5 after:w-3/6 after:block after:ml-auto after:mr-auto after:mt-8">
                

                    <li  class=" pb-4 mb-4 flex items-center justify-center flex-col-reverse sm:flex-row        md:justify-evenly hover:shadow-xl mr-4 ml-4 md:ml-8 md:mr-8">
                        <div class="inline-block sm:w-2/5 ">
                            <p class="font-bold  text-center sm:mb-4 lg:text-2xl">Doação de Roupas</p>
                           <p class=" trucante w-auto ml-2 text-sm text-slate-500 text-justify mr-2 2xl:text-xl">Venha fazer parte de uma ação beneficente na cidade de Salvador, distribuindo roupas há 30 anos com a parceria de voluntários!</p>
                           <div class="mr-2 ml-2 flex items-end justify-between">
                            <p class="w-6/12 text-base">Organizado por: SENAI<br>
                            Cidade: Lauro de Freitas<br>
                            Data: 15/10/2022</p>
                            <button class="border-solid border-2 border-gray-300 bg-[#1da1f2] text-white rounded p-2 " type="submit">Ver mais....</button>
                        </div>
                        </div>
            
                        <div class="inline-block ">
                           <img src="imgs/doacao_de_roupas.jpg" alt="doação de roupas" class="w-full  border-solid border-2 border-blue-300 max-w-md  ">
                        </div>
                    </li>

                    <li class=" pb-4  mb-3 flex items-center  flex-col-reverse justify-center sm:flex-row-reverse md:justify-evenly hover:shadow-xl mr-4 ml-4 md:ml-8 md:mr-8">
                        <div class="inline-block sm:w-2/5 ">
                            <p class="font-bold text-center sm:mb-4 lg:text-2xl">Doação de Comida</p>
                           <p  class="w-auto ml-2 text-sm text-slate-500 text-justify mr-2 2xl:text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!dleu
                            aidoepadoepdjeudiaopeadkeladjfgofdfd</p>
                           <div class="mr-2 ml-2 flex items-end justify-between">
                               <p class="w-6/12 text-base">Organizado por: SENAI<br>
                               Cidade: Lauro de Freitas<br>
                               Data: 15/10/2022</p>
                               <button class="border-solid border-2 border-gray-300 bg-[#1da1f2] text-white rounded p-2 mb-2" type="submit">Ver mais...</button>
                           </div>
                        </div>
            
                        <div class="inline-block ">
                           <img src="imgs/doacao_de_comida.jpeg" alt="doação de comida" class=" w-full border-solid border-2 border-blue-300 max-w-md  ">
                        </div>
                    </li>
                </ul>
               

                <div class="py-8 text-center text-black font-bold lg:text-2xl text-xl">
                    <h1>SOBRE FILANTROHUB</h1>
                </div>

                <div class="mb-3 sm:flex sm:flex-row-reverse sm:w-full lg:justify-evenly">
                    
                    <div class="flex sm:w-full lg:w-3/6">
                       <p class="ml-2 text-sm text-slate-500 text-justify mr-2 mr-2 mt-auto mb-auto 2xl:text-xl">
                       <strong class="font-bold">Título institucional</strong><br>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!</p>
                    </div>
        
                    <div class="inline-block w-full lg:max-w-md lg:ml-5 lg:mr-5">
                       <img src="imgs/img_do_sobre.png" alt="doação de roupas" class="mr-auto ml-auto w-4/5 border-solid border-2 border-blue-300 mt-2 max-w-sm lg:w-full lg:max-w-md ">
                    </div>
                </div>

                <div class="mb-3 sm:flex lg:justify-evenly">
                    <div class="flex sm:w-full lg:w-3/6 ">
                       <p class="ml-2 text-sm text-slate-500 text-justify mr-2 mt-auto mb-auto 2xl:text-xl ">
                       <strong class="font-bold">Título institucional</strong><br>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!</p>
                    </div>
        
                    <div class="inline-block w-full lg:max-w-md lg:ml-5 lg:mr-5">
                       <img src="imgs/img_do_sobre.png" alt="doação de roupas" class="mr-auto ml-auto w-4/5 border-solid border-2 border-blue-300 mt-2 max-w-sm lg:w-full lg:max-w-md">
                    </div>
                </div>
        
                
            </section>
        <footer class="bg-[#1da1f2] p-20">
            <p class="text-center font-bold truncate">FILANTROHUB</p>
            <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
        </footer>


    </AppLayout>
</template>
