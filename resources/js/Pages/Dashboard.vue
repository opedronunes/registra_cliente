<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registro de clientes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <template>
                            <ul>
                                <li v-for="cliente in clientes" :key="cliente.id">
                                    {{ cliente.nome }}
                                    <h1>
                                        {{ cliente.nome }} 
                                    </h1>
                                </li>
                            </ul>
                            
                        </template>
                        uai
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
//import axios from 'axios';

export default{
    data(){
        return {
            clientes: [],
            nome: '',
            rg: '',
            email: '',
            telefone: '',
            endereco: '',
            imagem: '',
        }

    },
    methods: {
        getClientes(){
            axios
            .get("http://127.0.0.1:8000/api/clientes")
            .then((response) => {
                console.log(response);
            });
            /*
            this.http.get('clientes').then((response => {
                this.clientes =  response.data;
            }))
            */
        }
    },
    created() {
        this.getClientes();
    },
    
    /*
    data(){
        return {
          clientes: []  
        } 
    },
    created(){
        axios
            .get("http://127.0.0.1:8000/api/clientes")
            .then(response => {
                this.$clientes = response.data;
            });
    }
    */
};





</script>
