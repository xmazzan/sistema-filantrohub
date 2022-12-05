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
        subject: Object,
    },

    data() {
        return {
            form: useForm({
                image: this.subject.image,
                title: this.subject.title,
                postcode: this.subject.postcode,
                days: this.subject.days,
                state: this.subject.state,
                city: this.subject.city,
                neighborhood: this.subject.neighborhood,
                street: this.subject.street,
                number: this.subject.number,
                complement: this.subject.complement,
                description: this.subject.description,
            }),
        };
    },

    methods: {
        submitForm() {
            this.form
                .put(
                    route('Projects.update', {project: this.subject.id}),
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
        <div class="container-fluid">
            <div class="row">
                <div id="search-container" class="col-md-12"> <!-- div#search-container.col-md-12 -->
                    <h1>Busque um Projeto Social</h1>
                    <form action="/" method="GET">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..."> <!--id para estilizar / name para pegar o conteúdo do formulário no backend / class form-control é do bootstrap para deixar o input mais bonito -->
                    </form>
                </div>

                <div id="events-container" class="col-md-12">
                    <h2>Próximos Eventos</h2>
                    <p class="subtitle">Veja os eventos dos próximos dias</p>
                    <div id="cards-container" class="row" style="border: 1px solid black">
                        <div class="card col-md-3">
                            <img src="/imgs/doacao_de_comida.jpeg" alt="Imagem do Evento">
                            <div class="card-body">
                                <p class="card-date"> formateDate</p>
                                <h5 class="card-title"> project.title </h5>
                                <p class="cards-participants"> Participantes</p>
                                <a href="" class="btn btn-primary">Saber mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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