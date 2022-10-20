<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Home">
        <div class="w-full bg-center bg-no-repeat" style="background-image: url(../imgs/main.png)">
            <div class="py-28 text-center text-white">
                <span> FILANTROHUB </span>
            </div>
            <div class="flex items-center justify-center">
                <input type="text" class="w-auto w-1/4" placeholder="Busque um projeto">
            </div>
            <div class="py-28 text-center text-white">
                <span> BUSQUE POR CIDADE, INSTITUIÇÃO OU TIPO DO EVENTO </span>
            </div>
        </div>

        <div class="py-8 text-center text-black font-bold">
                <span> PROJETOS EM DESTAQUE </span>
        </div>

        <div class="mb-3">
            <div class="inline-block w-2/5 ml-60">
                <p class="font-bold">Doação de Roupas</p>
               <p class="w-4/5 ml-2 text-sm text-slate-500">Venha fazer parte de uma ação beneficente na cidade de Salvador, distribuindo roupas há 30 anos com a parceria de voluntários!</p>
                <p class="w-6/12 text-base">Organizado por: SENAI<br>
                Cidade: Lauro de Freitas<br>
                Data: 15/10/2022</p>
                <button class="ml-72 border-solid border-2 border-gray-300 bg-[#1da1f2] text-white rounded p-2 mb-2" type="submit">Ver mais...</button>
            </div>

            <div class="inline-block w-2/5">
               <img src="imgs/doacao_de_roupas.jpg" alt="doação de roupas" class="w-6/12 border-solid border-2 border-blue-300">
            </div>
        </div>

        <div class="mb-3 border-b-2 border-gray-300 ">
            <div class="inline-block w-2/5 ml-60">
                <p class="font-bold">Doação de Comida</p>
               <p class="w-4/5 ml-2 text-sm text-slate-500">Venha fazer parte de uma ação beneficente na cidade de Salvador, distribuindo marmitas para mais de 150 pessoas necessitadas.</p>
                <p class="w-6/12 text-base">Organizado por: SENAI<br>
                Cidade: Lauro de Freitas<br>
                Data: 15/10/2022</p>
                <button class="ml-72 border-solid border-2 border-gray-300 bg-[#1da1f2] text-white rounded p-2 mb-2" type="submit">Ver mais...</button>
            </div>

            <div class="inline-block w-2/5">
               <img src="imgs/doacao_de_comida.jpeg" alt="doação de comida" class="w-6/12 border-solid border-2 border-blue-300">
            </div>
        </div>

        <div class="flex-wrap mb-3">
            <p class="font-bold text-center">SOBRE A FILANTROHUB</p>
            <div class="inline-block w-2/5 ml-60">
               <p class="w-4/5 ml-2 text-sm text-slate-500">
               <strong class="font-bold">Título institucional</strong><br>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!</p>
            </div>

            <div class="inline-block w-2/5">
               <img src="imgs/img_do_sobre.png" alt="doação de roupas" class="w-6/12 border-solid border-2 border-blue-300">
            </div>
        </div>

        <div class="flex-wrap mb-3">
            <div class="inline-block w-2/5 ml-60">
               <img src="imgs/img_do_sobre.png" alt="doação de roupas" class="w-6/12 border-solid border-2 border-blue-300">
            </div>
            <div class="inline-block w-2/5">
               <p class="w-4/5 ml-2 text-sm text-slate-500 mb-20">
               <strong class="font-bold">Título institucional</strong><br>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!</p>
            </div>
        </div>

        <footer class="p-20 text-xl bg-[#1da1f2]">
            <p class="text-center font-bold">FILANTROHUB</p>
            <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
        </footer>


    </AppLayout>
</template>
