<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2';
import { mask } from 'vue-the-mask';

export default {
    components: {
        AppLayout
    },

    props: {
        erros: Object,
        project: Object,
    },

    data() {
        return {
            form: useForm({
                image: this.project.image,
                title: this.project.title,
                postcode: this.project.postcode,
                days: this.project.days,
                phone: this.project.phone,
                state: this.project.state,
                city: this.project.city,
                neighborhood: this.project.neighborhood,
                street: this.project.street,
                number: this.project.number,
                complement: this.project.complement,
                description: this.project.description,
            }),
        };
    },

    methods: {
        submitForm() {
            this.form
                .put(
                    route('Projects.update', {project: this.project.id}),
                    {
                        onSuccess: () => {
                            Swal.fire({
                                icon: 'success',
                                titleText: 'Projeto editado com sucesso',
                                toast: true,
                                position: 'top-end',
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                            });
                        }
                    }
                )
        },
        goBack() {
            window.history.back();
        },

        validatePostcode(postcode, masked = true) {
            if (!masked && postcode.length != 8) {
                return false;
            }

            if (masked && postcode.length != 9) {
                return false;
            }

            return true;
        },

        getAddressFromPostcode(maskedPostcode) {
            const postcode = maskedPostcode.replace('-','')

            if (!this.validatePostcode(postcode, false)) {
                return;
            }
            
            axios.get(`https://viacep.com.br/ws/${postcode}/json/`)
                .then(response => {
                    const address = response.data

                    if (response.status != 200 || address.erro) {
                        Swal.fire({
                            icon: 'error',
                            titleText: 'Erro ao consultar o CEP',
                            toast: true,
                            position: 'top-end',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                        })

                        return;
                    }

                    this.form.neighborhood = address.bairro
                    this.form.street = address.logradouro
                    this.form.state = address.uf
                    this.form.complement = address.complemento
                    this.form.city = address.localidade
                })
                .catch(error => {
                    console.error(error)
                })
        }
    },

    watch: {
        'form.postcode': {
            handler: function (postcode) {
                if (this.validatePostcode(postcode)) {
                    this.getAddressFromPostcode(postcode);
                }
            }
        },
    },

    directives: {
        mask
    },
}
</script>

<template>
    <AppLayout title="Home">
        <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="" method="post" @submit.prevent="submitForm"> <!-- action="/events" enctype="multipart/form-data"-->
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" @change="onFileChange" @input="form.image = $event.target.files[0]" name="image" class="from-control-file"> <!-- v-model="form.title" -->
                <div id="preview">
                    <img v-if="imageUrl" :src="imageUrl" />
                </div>
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" v-model="form.title">
            </div>

            <div class="form-group">
                <label for="date">Dias de funcionamento do projeto:</label>
                <div class="form-group">	
                <input type="checkbox" name="days" value="Segunda" v-model.trim="form.days"> Segunda
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Terça" v-model.trim="form.days"> Terça
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Quarta" v-model.trim="form.days"> Quarta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Quinta" v-model.trim="form.days"> Quinta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Sexta" v-model.trim="form.days"> Sexta
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Sábado" v-model.trim="form.days"> Sábado
                </div>
                <div class="form-group">	
                    <input type="checkbox" name="days" value="Domingo" v-model.trim ="form.days"> Domingo
                </div>
            </div>

            <!-- POSTCODE -->
            <div class="form-row flex justify-between flex-col sm:space-x-4 sm:flex-row">
                <div class="customer-phone flex flex-col mb-4 sm:mb-0 sm:w-[    8%]">
                    <label for="txtCustomerPhone" class="text-gray-800">Telefone</label>
                    <input type="tel" v-mask="['(##) ####-####','(##) #####-####']" id="txtCustomerPhone" maxlength="15" class="border-gray-300 rounded-md" :class="{ 'border-red-700': errors.phone }" v-model.trim="form.phone">
                    <small class="text-red-700" v-if="errors.phone">{{ errors.phone }}</small>
                </div>
            </div>
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
            <!-- FIM POSTCODE -->

            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" v-model.trim="form.description"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
            <!--  
            <div class="form-footer flex justify-end space-x-4 mt-4">
                <button class="rounded-full border-1 py-2 px-4 bg-white font-bold hover:shadow-lg hover:shadow-gray-300 transition-colors" type="submit" :disabled="form.processing">Criar Evento</button>
            </div>
            -->
        </form>
        </div>
    </AppLayout>
</template>

<style scoped>
/*      search-container      */
#search-container {
    background-image: url("/imgs/main.png");
    background-size: cover;
    background-position: center;
    height: 400px;
    padding: 50px;
    text-align: center;
}

#search-container h1 {
    color: black;
    margin-bottom: 30px;
    font-weight: 900;
}

#search-container form {
    width: 50%;
    margin: 0 auto;
}
/*      FIM SEARCH CONTAINER       */
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

/*INICIO            <div id="events-container" class="col-md-12">*/
#events-container {
    padding: 50px;
}

#events-container h2 {
    margin-bottom: 10px;
}

#events-container .subtitle {
    color: #757575;
    margin-bottom: 30px;
}

#cards-container {
    display: flex;
}

#events-container .card { /*   ?   */
    flex: 1 1 24%; /* flex: 1 1 0 --> flex: 1 1 24%; - mudou para 24% de largura base */
    max-width: 25%;
    border-radius: 10px;
    padding: 0;
    margin: .5%; /* margin: 5px; */
}

#events-container img {
    max-height: 150px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

/* FINAL */
</style>