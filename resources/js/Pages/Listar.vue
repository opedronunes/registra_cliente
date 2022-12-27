<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

import { Inertia } from '@inertiajs/inertia';

</script>
<template>
    <Head title="Listagem" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registro de clientes
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center py-1">
                            <h2 class="flex items-center gap-2 text-slate-500 text-2xl"><i class="ph-users-three"></i> Todos os clientes</h2>
                            <Link :href="route('clientes.create')" class="cursor-pointer w-auto px-3 py-1 text-lg border border-slate-400 rounded hover:bg-green-700 hover:text-white transition-colors">Novo</Link>
                        </div>
                        <table class="table rounded-md border-separate border border-slate-500 w-full">
                            <thead>
                                <tr>
                                    <th class="border rounded border-slate-600">nome</th>
                                    <th class="border rounded border-slate-600">Rg</th>
                                    <th class="border rounded border-slate-600">email</th>
                                    <th class="border rounded border-slate-600">telefone</th>
                                    <th class="border rounded border-slate-600">endereco</th>
                                    <th class="border rounded border-slate-600">imagem</th>
                                    <th class="border rounded border-slate-600">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in clientes" :key="cliente.id" class="text-center">
                                    <td>{{ cliente.nome }}</td>
                                    <td>{{ cliente.rg }}</td>
                                    <td>{{ cliente.email }}</td>
                                    <td>{{ cliente.telefone}}</td>
                                    <td>{{ cliente.endereco }}</td>
                                    <td>{{ cliente.imagem }}</td>
                                    <td>
                                        <div class="flex gap-1 justify-center">
                                            <Link :href="route('clientes.edit', cliente.id)" class="px-1 py-1 text-2xl flex items-center border border-1 rounded hover:bg-yellow-400 transition-colors"><i class="ph-pencil-simple"></i></Link>
                                            <Link @click="destroy(cliente.id)" class="px-1 py-1 text-2xl flex items-center border border-1 rounded hover:bg-red-500 transition-colors"><i class="ph-trash"></i></Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {

    props: {
    clientes: Object,
    },
    methods: {
        destroy(id){
            if (confirm("Tem certeza que deseja remover o cliente?")) {
                Inertia.delete(route('clientes.destroy', id));
            }
            
        },
    },
};
</script>