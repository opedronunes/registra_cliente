<template>
    <Head title="Clientes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Registro de clientes
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between py-1">
                            <h2 class="flex items-center gap-2 text-2xl text-slate-500"><i class="ph-users-three"></i> Todos os clientes</h2>
                            <Link :href="route('clientes.create')" class="w-auto px-3 py-1 text-lg transition-colors border rounded cursor-pointer border-slate-400 hover:bg-green-700 hover:text-white">Novo</Link>
                        </div>
                        <div class="overflow-x-auto ">
                            <table class="w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">#</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">nome</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">Rg</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">telefone</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">endereco</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">imagem</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900  dark:text-white">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="cliente, i in clientes" :key="cliente.id" class="bg-white dark:bg-gray-700">
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ i+1 }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.nome }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.rg }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.email }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.telefone}}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.endereco }}</td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-white">{{ cliente.imagem }}</td>
                                        <td>
                                            <div class="flex gap-1">
                                                <Link :href="route('clientes.edit', cliente.id)" class="flex items-center px-1 py-1 text-2xl transition-colors border rounded border-1 hover:bg-yellow-400"><i class="ph-pencil-simple"></i></Link>
                                                <Link @click="eliminar(cliente.id)" class="flex items-center px-1 py-1 text-2xl transition-colors border rounded border-1 hover:bg-red-500"><i class="ph-trash"></i></Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm  } from '@inertiajs/inertia-vue3';


/*
const eliminar = (id) => {
    form.delete(route('cliente.destroy', id))
};
*/
export default {

    components: {
        AuthenticatedLayout,
        Head,
        Link,
},
    props: {
        clientes: Object,
    },
    methods: {
        eliminar(id) {
            if (confirm("Tem certeza que deseja remover o cliente?")) {
                Inertia.delete(route("clientes.destroy", id));
            }
        },
    }
}

</script>