<script>
import AppLayout from '@/Layouts/AppLayout.vue';
export default {
    components: {
        AppLayout
    },

    methods: {

    },
}
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
                <label for="title">CEP:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>


            <!-- POSTCODE -->
            <!--
            <div class="form-row flex justify-between flex-col sm:space-x-4 sm:flex-row">
                <div class="project-postcode flex flex-col mb-4 sm:mb-0 sm:w-[22%]">
                    <label for="txtCustomerPostcode" class="text-gray-800">CEP</label>
                    <input type="text" v-mask="'#####-###'" id="txtCustomerPostcode" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.postcode }" v-model.trim="form.postcode"/>
                    <small class="text-red-700" v-if="errors.postcode">{{ errors.postcode }}</small>
                </div>
                <div class="project-state flex flex-col mb-4 sm:mb-0 sm:w-[22%]">
                    <label for="txtCustomerState" class="text-gray-800">Estado</label>
                        <input type="text" id="txtCustomerState" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.state }" v-model.trim="form.state">
                    <small class="text-red-700" v-if="errors.state">{{ errors.state }}</small>
                </div>
                <div class="project-city flex flex-col mb-4 sm:mb-0 sm:w-[48%] ">
                    <label for="txtCustomerCity" class="text-gray-800">Cidade</label>
                    <input type="text" id="txtCustomerCity" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.city }" v-model.trim="form.city">
                    <small class="text-red-700" v-if="errors.city">{{ errors.city }}</small>
                </div>
            </div>
            <div class="form-row flex justify-between flex-col sm:space-x-4 sm:flex-row">
                <div class="project-neighborhood flex flex-col mb-4 sm:mb-0 sm:w-[48%]">
                    <label for="txtCustomerNeighborhood" class="text-gray-800">Bairro</label>
                    <input type="text" id="txtCustomerNeighborhood" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.neighborhood }" v-model.trim="form.neighborhood">
                    <small class="text-red-700" v-if="errors.neighborhood">{{ errors.neighborhood }}</small>
                    
                </div>
                <div class="project-street flex flex-col mb-4 sm:mb-0 sm:w-[48%]">
                    <label for="txtCustomerStreet" class="text-gray-800">Rua</label>
                    <input type="text" id="txtCustomerStreet" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.street }" v-model.trim="form.street">
                    <small class="text-red-700" v-if="errors.street">{{ errors.street }}</small>
                </div>
            </div>
            <div class="form-row flex justify-between flex-col sm:space-x-4 sm:flex-row">
                <div class="project-number flex flex-col mb-4 sm:mb-0 sm:w-[22%] ">
                    <label for="txtCustomerNeighborhood" class="text-gray-800">Número</label>
                    <input type="text" id="txtCustomerNeighborhood" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.number }" v-model.trim="form.number">
                    <small class="text-red-700" v-if="errors.number">{{ errors.number }}</small>
                </div>
                <div class="project-complement flex flex-col mb-4 sm:mb-0 sm:w-[48%]">
                    <label for="txtCustomerComplement" class="text-gray-800">Complemento</label>
                    <input type="text" id="txtCustomerComplement" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.complement }" v-model.trim="form.complement">
                    <small class="text-red-700" v-if="errors.complement">{{ errors.complement }}</small>
                </div>
            </div>
            -->
            <!-- FIM POSTCODE -->

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