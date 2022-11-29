<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout
    },
}
</script>

<template>
    <AppLayout title="Home">
        <div class="col-md-10 offset-md-1"> <!-- .col-md-10.offset-md-1  - o offset-md-1 é para CENTRALIZAR NO MEIO -->
            <div class="row">
                <div id="image-container" class="col-md-6"> <!-- #image-container.col-md-6 -->
                    <img src="" class="img-fluid" alt="{{ $project->title }}"> <!--alt="{{ $project->title }} a class img-fluid do bootstrap deixa a imagem responsiva -->
                </div>
                <div id="info-container" class="col-md-6">
                    <h1>$project->title</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon> $project->city</p>
                    <p class="events-participants"><ion-icon name="people-outline"></ion-icon> <!--p.events-participants-->
                        50 Participants
                    </p><!-- {{ count($project->users) }} -->
                    <!-- só foi possível mostrar o número de participantes graças ao método users() no model Events que dá 
                        acesso aos usuários que estão participando no evento  
                        // $project = Event::findOrFail($id); -> users(return belongsToMany(/model/user)) 
                    -->            
                    <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Dono do Evento: {{ $projectOwner['name'] }} </p> <!-- $project->user->name - usando método belongsTo() do model events no controller// {{ $projectOwner['email'] }}-->
                    
                    <!--
                        <a href="/events/join/{{ $project->id }}" class="btn btn-primary" id="event-submit">
                            Confirmar Presença
                        </a>
                    -->
                    @if(!$hasUserJoined) 
                    <!-- se não tiver ingressado, retornar true para mostrar o form (a variável foi declarada como false no EventController) --}}-->
                        <form action="/events/join/{{ $project->id }}" method="POST">
                            @csrf
                            <a href="" 
                                class="btn btn-primary" 
                                id="event-submit"
                                onclick="event.preventDefault(); this.closest('form').submit()"> 
                                <!-- cancela o evento padrão e submete o formulário para o usuário -->
                                Confirmar Presença
                            </a>
                        </form> <!-- href="/events/join/{{ $project->id }}" -->
                    @else
                        <p class="already-joined-message">Você já está participando desse evento!</p>
                    @endif
                    <h3>O evento conta com:</h3>
                    <ul id="items-list">
                        <!-- @foreach($project->items as $item) -->
                        <li><ion-icon name="play-outline"></ion-icon> <span> $item </span> </li>
                        <!-- @endforeach -->
                    </ul>
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o evento:</h3>
                    <p class="event-discription"> $project->description </p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>