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
    <div id="event-container" class="col-md-6 offset-md-3">
        <h1 class="ml-60 text-xl font-bold">Conheça este projeto: </h1>
    </div>
           <div class="col-md-10 offset-md-1"> 
            <div class="row">
                <div id="image-container" class="col-md-6"> 
                    <img src="" class="img-fluid" alt="{{ $event->title }}">
                </div>
                <div id="info-container" class="col-md-6">
                    <h1>$event->title</h1>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon> $event->city</p>
                    <p class="events-participants"><ion-icon name="people-outline"></ion-icon> 
                        50 Participants
                    </p>       
                    <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Dono do Evento: {{ $eventOwner['name'] }} </p> 
                    
                    @if(!$hasUserJoined) 
                   
                        <form action="/events/join/{{ $event->id }}" method="POST">
                            @csrf
                            <a href="/events/join/{{ $event->id }}" 
                                class="btn btn-primary" 
                                id="event-submit"
                                onclick="event.preventDefault(); this.closest('form').submit()"> 
                                
                                Confirmar Presença
                            </a>
                        </form>
                    @else
                        <p class="already-joined-message">Você já está participando desse evento!</p>
                    @endif
                    <h3>O evento conta com:</h3>
                    <ul id="items-list">
                        
                        <li><ion-icon name="play-outline"></ion-icon> <span> $item </span> </li>
                        
                    </ul>
                </div>
                <div class="col-md-12" id="description-container">
                    <h3>Sobre o evento:</h3>
                    <p class="event-discription"> $event->description </p>
                </div>
            </div>
        </div>
    <footer class="bg-[#1da1f2] p-20">
        <p class="text-center font-bold truncate">FILANTROHUB</p>
        <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
    </footer>
</AppLayout>
</template>
