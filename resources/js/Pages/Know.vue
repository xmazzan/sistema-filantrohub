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
    <div id="event-container" class="col-md-6 offset-md-3">
        <h1 class="ml-60 text-xl font-bold">Conheça este projeto: </h1>
    </div>
           <div class="col-md-10 offset-md-1"> <!-- .col-md-10.offset-md-1  - o offset-md-1 é para CENTRALIZAR NO MEIO -->
            <div class="row">
                <div id="image-container" class="col-md-6"> <!-- #image-container.col-md-6 -->
                    <img src="" class="img-fluid" > <!--alt="{{ $project->title }} a class img-fluid do bootstrap deixa a imagem responsiva alt="{{ $project->title }}"-->
                </div>
                <div id="info-container" class="col-md-6">
                    <!--<h1>{{ project.title }}</h1>
                    <p class="event-city"> {{ project.city }}</p>-->
                    <p class="events-participants"> <!--p.events-participants-->
                        50 Participants
                    </p><!-- {{ count($project->users) }} -->
                    <!-- só foi possível mostrar o número de participantes graças ao método users() no model Events que dá 
                        acesso aos usuários que estão participando no evento  
                        // $project = Event::findOrFail($id); -> users(return belongsToMany(/model/user)) 
                    -->            
                    <!--<p class="event-owner">  Dono do Evento: {{ OwnerOfTheProject.name }} </p>  $project->user->name - usando método belongsTo() do model events no controller// {{ $projectOwner['email'] }}-->
                    
                    <!--
                        <a href="/events/join/{{ $project->id }}" class="btn btn-primary" id="event-submit">
                            Confirmar Presença
                        </a>
                    -->
                    
                    <!-- @if(!$hasUserJoined)  -->
                    <!-- se não tiver ingressado, retornar true para mostrar o form (a variável foi declarada como false no EventController) --}}-->
                        <!-- href="/events/join/{{ $project->id }}" -->
                    <!-- @else <form action="/events/join/{{ $project->id }}" method="POST">
                            <a href="" 
                                class="btn btn-primary" 
                                id="event-submit"
                                onclick="event.preventDefault(); this.closest('form').submit()"> 
                                cancela o evento padrão e submete o formulário para o usuário 
                                Confirmar Presença
                            </a>
                        </form> -->
                        <button class="btn btn-primary" id="event-submit"><a href="#" @click="confirmParticipation(project.id)" >Confirmar Presença</a></button>
                        <p class="already-joined-message">Você já está participando desse evento!</p>
                    <!-- @endif -->
                    <h3>O evento conta com:</h3>
                    <ul id="days-list" v-for="day in days" :key="day.id">
                        <!-- @foreach($project->items as $item) -->
                        <li> <span> {{ day }}</span> </li>
                        <!-- @endforeach -->
                    </ul>
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o evento:</h3>
                    <!--<p class="event-discription"> {{ project.description }} </p>-->
                </div>
            </div>
        </div>
    <footer class="bg-[#1da1f2] p-20">
        <p class="text-center font-bold truncate">FILANTROHUB</p>
        <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
    </footer>
</AppLayout>
</template>
