<script>
export default {
    
}
</script>
<template>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando o evento: ...</h1> <!--{{ $event->title }}-->
    <form action="" method="POST">
        <!-- <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data" > -->
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <!-- <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview"> {{-- img.img-preview --}} -->
            <img src="" alt="" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title ">Evento:</label>
            <!-- <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{ $event->title }}"> -->
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="">
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
            <label for="title ">Cidade:</label>
            <!-- <input type="text" class="form-control" id="city" name="city" placeholder="Nome da Cidade" value="{{ $event->city }}">  -->
            <input type="text" class="form-control" id="city" name="city" placeholder="Nome da Cidade" value=""> 
        </div>
        <div class="form-group">
            <label for="title ">Descrição:</label>
            <!-- <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>  -->
            <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">...</textarea> 
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Evento" >
    </form>
</div>
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