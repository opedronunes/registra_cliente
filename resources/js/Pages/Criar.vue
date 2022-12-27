
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

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
                        <div class="flex justify-end items-center py-1">
                            <Link :href="route('listar')" class="cursor-pointer w-auto px-3 py-1 text-lg border border-slate-400 rounded hover:bg-green-700 hover:text-white transition-colors">Voltar</Link>
                        </div>
                        <form @click="addCliente()">
                            <div class="grid grid-cols-8 gap-4 flex flex-row items-end">
                                <div class="col-span-4 lg:col-span-2">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" id="nome" v-model="clientes.nome" class="form-input">
                                </div>

                                <div class="col-span-4 lg:col-span-2">
                                    <label for="rg">Rg:</label>
                                    <input type="text" name="rg" id="rg" v-model="clientes.rg" class="form-input">
                                </div>

                                <div class="col-span-4 lg:col-span-2">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" v-model="clientes.email" class="form-input">
                                </div>

                                <div class="col-span-4 lg:col-span-2">
                                    <label for="telefone">Telefone:</label>
                                    <input type="tel" name="telefone" id="telefone" v-model="clientes.telefone" class="form-input">
                                </div>

                                <div class="col-span-4 lg:col-span-2">
                                    <label for="imagem">Foto:</label>
                                    <input type="image" name="imagem" id="imagem" v-model="clientes.imagem" class="form-input">
                                </div>

                            </div>
                            <button type="submit" class="cursor-pointer w-auto px-3 py-1 text-lg text-white rounded bg-green-700 hover:bg-green-500 transition-colors">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>

export default{
    data() {
        return {
            
        };
    },
    methods: {
        getClientes() {

        },

        addCliente(){
        }
    },
    created() {
        
    },
};





</script>