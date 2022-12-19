<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { mask } from "vue-the-mask";
import { Inertia } from '@inertiajs/inertia';

export default {
 components: {
  AppLayout,
 },

 props: {
  projects: Object,
  search_projects: Object,
  filter: Object,
 },

 data() {
  return {
   search: this.filter?.search,
  };
 },
 watch: {
    'search': {
            handler(search) {
                Inertia.get(
                    this.$page.url,
                    { search: search },
                    {
                        preserveScroll: true,
                        preserveState: true,
                    }
                );
            }
        },
  },
  /*keyword(after, before) {
   if (this.keyword.length >= 3) {
    this.getResults();
   } else if (this.keyword.length == 0) {
    this.Projetos = [];
   }
  },*/
 
 methods: {
  validateSearch(search) {
   if (!search) {
    return false;
   } else if (search.length < 3) {
    return false;
   }
   return true;
  },
  /*getResults() {
   axios
    .get("/filtro", { search: this.search })
    .then((res) => (this.search = res.data))
    .catch((error) => {});
  },*/
  showProject(id) {
   Inertia.get(route("project", { project: id }));
  },
 },

 directives: {
  mask,
 },
};
</script>

<template>
 <AppLayout title="Home">
  <section
   class="
    w-full
    h-[calc(100vh_-_64px)]
    bg-no-repeat
    justify-around
    bg-[length:100vw_91vh]
   "
   style="background-image: url(../imgs/main3.png)"
  >
   <div class="flex items-center flex-col text-center justify-center h-[74%]">
    <div class="p-[3.25rem]">
     <img class="inline-flex w-32 sm:w-40" src="imgs/fh150.png" alt="logo" />
    </div>

    <div class="flex items-center justify-center w-4/5 max-w-xl">
     <input
      type="search"
      class="w-4/5 max-w-xl padding-top texto rounded-xl shadow-md shadow-black"
      placeholder="Busque um projeto"
      v-model="search"
     />
    </div>
    <div
     v-if="search_projects"
     class="flex items-center justify-center w-4/5 max-w-xl"
    >
     <ul
      v-for="result in search_projects"
      :key="result.id"
      class="w-4/5 shadow-md shadow-black bg-white rounded-xl p-2"
     >
      <a href="" @click="showProject(result.id)">
       <li>{{ result.title }}</li>
      </a>
     </ul>
    </div>

    <div class="pt-8 justify-center w-full paddin-top-1-5">
     <span class="text-xs text-white sm:text-lg">
      BUSQUE POR CIDADE, INSTITUIÇÃO OU TIPO DO EVENTO
     </span>
    </div>
   </div>
  </section>

  <section>
   <div class="py-8 text-center text-black text-xl font-bold lg:text-2xl">
    <h1>PROJETOS EM DESTAQUE</h1>
   </div>

   <ul
    class="
     after:content-['']
     after:bg-stone-900/[.3]
     after:h-0.5
     after:w-3/6
     after:block
     after:ml-auto
     after:mr-auto
     after:mt-8
    "
    v-for="p in projects.data"
    :key="p.id"
   >
    <li
     class="
      pb-4
      mb-4
      flex
      items-center
      justify-center
      flex-col-reverse
      sm:flex-row
      md:justify-evenly
      hover:shadow-xl
      mr-4
      ml-4
      md:ml-8 md:mr-8
     "
    >
     <div class="inline-block sm:w-2/5">
      <p class="font-bold text-center sm:mb-4 lg:text-2xl">{{ p.title }}</p>
      <p
       class="
        trucante
        w-auto
        ml-2
        text-sm text-slate-500 text-justify
        mr-2
        2xl:text-xl
       "
      >
       {{ p.description }}
      </p>
      <div class="mr-2 ml-2 flex items-end justify-between">
       <p class="w-6/12 text-base">Organizado por: SENAI<br /></p>
       <p class="w-6/12 text-base">Cidade: {{ p.city }}<br /></p>
       <p class="w-6/12 text-base">Data: 15/10/2022</p>
       <a
        class="
         border-solid border-2 border-gray-300
         bg-[#1da1f2]
         text-white
         rounded
         p-2
        "
        href="#"
        @click="showProject(project.id)"
        >Ver mais....</a
       >
      </div>
     </div>

     <div class="inline-block">
      <img
       :src="'imgs/projects/' + p.image_path"
       alt="doacao"
       class="w-full border-solid border-2 border-blue-300 max-w-md"
      />
     </div>
    </li>
   </ul>

   <div class="py-8 text-center text-black font-bold lg:text-2xl text-xl">
    <h1>SOBRE FILANTROHUB</h1>
   </div>

   <div class="mb-3 sm:flex sm:flex-row-reverse sm:w-full lg:justify-evenly">
    <div class="flex sm:w-full lg:w-3/6">
     <p
      class="
       ml-2
       text-sm text-slate-500 text-justify
       mr-2 mr-2
       mt-auto
       mb-auto
       2xl:text-xl
      "
     >
      <strong class="font-bold">Título institucional</strong><br />
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum
      iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse
      necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!
     </p>
    </div>

    <div class="inline-block w-full lg:max-w-md lg:ml-5 lg:mr-5">
     <img
      src="imgs/img_do_sobre.png"
      alt="doação de roupas"
      class="
       mr-auto
       ml-auto
       w-4/5
       border-solid border-2 border-blue-300
       mt-2
       max-w-sm
       lg:w-full lg:max-w-md
      "
     />
    </div>
   </div>

   <div class="mb-3 sm:flex lg:justify-evenly">
    <div class="flex sm:w-full lg:w-3/6">
     <p
      class="
       ml-2
       text-sm text-slate-500 text-justify
       mr-2
       mt-auto
       mb-auto
       2xl:text-xl
      "
     >
      <strong class="font-bold">Título institucional</strong><br />
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus dolorum
      iure exercitationem, error, aut ex ad aperiam fugit, nam eum esse
      necessitatibus quibusdam. Iste vel itaque, ratione temporibus nulla dolor!
     </p>
    </div>

    <div class="inline-block w-full lg:max-w-md lg:ml-5 lg:mr-5">
     <img
      src="imgs/img_do_sobre.png"
      alt="doação de roupas"
      class="
       mr-auto
       ml-auto
       w-4/5
       border-solid border-2 border-blue-300
       mt-2
       max-w-sm
       lg:w-full lg:max-w-md
      "
     />
    </div>
   </div>
  </section>
  <footer class="bg-[#1da1f2] p-20">
   <p class="text-center font-bold truncate">FILANTROHUB</p>
   <p class="text-center">@Copyright - No ar desde Dezembro/2022</p>
  </footer>
 </AppLayout>
</template>
