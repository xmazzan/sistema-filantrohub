<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Home">
        <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>

            <div class="form-group">
                <label for="date">Dias de funcionamento do projeto:</label>
                <div class="form-group">	
                <input type="checkbox" name="dias[]" value="Segunda"> Segunda
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Terça"> Terça
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Quarta"> Quarta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Quinta"> Quinta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Sexta"> Sexta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Sábado"> Sábado
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="dias[]" value="Domingo"> Domingo
                </div>
            </div>

            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
        </div>
    </AppLayout>
</template>

<style scoped>
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