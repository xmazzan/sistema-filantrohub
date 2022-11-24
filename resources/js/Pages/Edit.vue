<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
<AppLayout title="Home">
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 class="ml-60 text-xl font-bold">Editando o evento: ...</h1> 
    <form action="" method="POST">
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="" alt="" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title ">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="">
        </div>
        
        <div class="form-group columns-2">
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
            <label for="title ">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Nome da Cidade" value=""> 
        </div>
        <div class="form-group">
            <label for="title ">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">...</textarea> 
        </div>
        <input type="submit" class="btn btn-primary ml-60 w-36" value="Editar Evento" >
    </form>
</div>

<footer class="bg-[#1da1f2] p-20">
            <p class="text-center font-bold truncate">FILANTROHUB</p>
            <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
        </footer>
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
