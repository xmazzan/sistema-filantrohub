<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import moment from 'moment';

export default {
    components: {
        AppLayout
    },
    
    props: {
        projects: Object,
    },

    methods: {
        showService(id) {
            Inertia.get(route('services.show', {service: id}))
        },
        
        formatDate(dateValue)
    }
}
</script>


<template>
    <AppLayout title="Home">
        <div id="search-container" class="col-md-12"> <!-- div#search-container.col-md-12 -->
            <h1>Busque um evento</h1>
            <form action="/" method="GET">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."> <!--id para estilizar / name para pegar o conteúdo do formulário no backend / class form-control é do bootstrap para deixar o input mais bonito -->
            </form>
        </div>

        <div id="events-container" class="col-md-12">
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
            <div id="cards-container" class="row">
                <div class="card col-md-3">
                    <div class="card-body">
                        <p class="card-date"> formateDate</p>
                        <h5 class="card-title"> project.title </h5>
                        <p class="cards-participants"> Participantes</p>
                        <a href="" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
h1 {
    text-align: center;
    font-weight: bold;
}
#event-create-container {
    padding: 30px;
}

#event-create-container label {
    font-weight: bold;
}

#event-create-container input,
#event-create-container select,
#event-create-container textarea {
    font-size: 12px;
    margin-bottom: 10px;
    margin-top: 10px;
}

.btn-primary {
    color: black;
}
</style>