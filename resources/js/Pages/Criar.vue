
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Registro de clientes
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-end py-1">
                            <Link :href="route('listar')" class="w-auto px-3 py-1 text-lg transition-colors border rounded cursor-pointer border-slate-400 hover:bg-green-700 hover:text-white">Voltar</Link>
                        </div>
                        <form >
                            <div class="flex-row items-end grid-cols-8 gap-4 rid">
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
                            <button type="submit" class="w-auto px-3 py-1 text-lg text-white transition-colors bg-green-700 rounded cursor-pointer hover:bg-green-500">Criar</button>
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