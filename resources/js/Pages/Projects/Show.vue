<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { booleanLiteral } from '@babel/types';

export default {
    components: {
        AppLayout
    },

    props: {
        project: Object,
        hasVolunteered: Boolean,
        OwnerOfTheProject: Object,
        volunteersCount: Object,
        days: Object,
    },

    

    methods: {
        confirmParticipation(id) {
            Inertia.get(route('projects.joinProject', {id}))
            //this.form.post(route('projects.joinProject', {id}))
        }
    }
}
</script>

<template>
    <AppLayout title="Home">
        <div class="bg-gray-200"> 
                <div id="image-container" class="p-3 bg-white w-full " > 
                    <img :src="'../imgs/projects/' + project.image_path" class="shadow-lg max-w-lg mx-auto w-full rounded-lg" alt=""> <!--  -->
                </div>
                <div class="text-center mt-4 font-bold text-lg">
                    <button v-if="hasVolunteered == false" class="btn btn-primary" id="event-submit"><a href="#" @click="confirmParticipation(project.id)" >Confirmar Presença</a></button>
                    <p v-else class="already-joined-message">Você já está participando desse projeto!</p>
                </div>
                <h1 class="text-center mt-4 font-bold text-lg">{{ project.title }}</h1>
                <div id="info-container" class=" sm:flex justify-around">
                    <div>
                        <p class="my-2 ml-2">Cidade: {{ project.city }} </p>
                        <p class="my-2 ml-2">Participantes: {{ volunteersCount }}</p>
                        <p class="my-2 ml-2">Responsável pelo Projeto: {{ OwnerOfTheProject.name }}</p> 
                    </div>
                    <div>
                        <h3 class="my-2 ml-2">Dias do Projeto:</h3>
                        <ul id="days-list" v-for="day in days" :key="day.id"> <!--  -->
                            <li> <span> {{ day.day }} </span> </li>
                            <!--
                                <li> <span> Segunda </span> </li>
                                <li> <span> Segunda </span> </li>
                                <li> <span> Segunda </span> </li>
                            -->
                        </ul>
                    </div>
                </div>
                <h3 class="text-center mt-4 font-bold text-lg">Sobre o Projeto:</h3>
                <div class=" sm:flex justify-around">
                    <p class="my-2 ml-2"> {{ project.description }} </p>
                </div>
        </div>
    </AppLayout>
</template>

<style scoped>
#days-list {
    list-style: none;
    padding-left: 0;
}

#days-list li {
    display: flex; /*alinhou melhor*/
}
</style>