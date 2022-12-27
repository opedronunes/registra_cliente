
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
                        <div>
                            <h1>chegou no edit</h1>
                        </div>
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
            clientes: [],
            nome: "",
            rg: "",
            email: "",
            telefone: "",
            endereco: "",
            imagem: "",
        };
    },
    methods: {
        async getCliente() {
            await axios
                .get("http://127.0.0.1:8000/api/v1/clientes" + id)
                .then((response) => {
                    this.clientes = response.data.data;
                    console.log(response);
            });
        },
    },
    created() {
        this.getCliente();
    },
};





</script>