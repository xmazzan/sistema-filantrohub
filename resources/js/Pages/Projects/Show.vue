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
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div id="image-container" class="col-md-6">
                    <img :src="'imgs/projects/' + project.image_path" class="img-fluid" alt="">
                </div>
                <div id="info-container" class="col-md-6">
                    <h1>{{ project.title }}</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ project.city }} </p>
                    <p class="events-participants"><ion-icon name="people-outline"></ion-icon>
                        {{ volunteersCount }} Participants
                    </p>
                    <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Dono do Evento: {{ OwnerOfTheProject.name }}</p>
                    <ul id="days-list" v-for="day in project.days" :key="day.id"> <!--day in days" :key="day.id-->
                        <!-- @foreach($project->items as $item) -->
                        <li><ion-icon name="play-outline"></ion-icon> <span> {{ day }} </span> </li>
                        <!-- @endforeach -->
                    </ul>                                                                           <!-- {{ $page.props.user.name }} -->
                        <button v-if="hasVolunteered == false" class="btn btn-primary" id="event-submit"><a href="#" @click="confirmParticipation(project.id)" >Confirmar Presença</a></button>
                        <p v-else class="already-joined-message">Você já está participando desse evento!</p>
                    <h3>O evento conta com:</h3>
                    
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o evento:</h3>
                    <p class="event-discription"> {{ project.description }} </p>
                </div>
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