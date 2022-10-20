<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Home">
        <div class="w-full h-screen bg-no-repeat justify-around" style="background-image: url(../imgs/main.png)">
            <div class="py-28 justify-center">
                <span> FILANTROHUB </span>
            </div>
            <div class="flex items-center justify-center">
                <input type="text" placeholder="Busque um projeto">
            </div>
            <div class="py-28 justify-center">
                <span> BUSQUE POR CIDADE, INSTITUIÇÃO OU TIPO DO EVENTO </span>
            </div>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <span>TESTE</span>
        </div>
    </AppLayout>
</template>
