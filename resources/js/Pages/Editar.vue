
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
                            <Link :href="route('Listar')" class="w-auto px-3 py-1 text-lg transition-colors border rounded cursor-pointer border-slate-400 hover:bg-green-700 hover:text-white">Voltar</Link>
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
    },
    methods: {
    }
};





</script>