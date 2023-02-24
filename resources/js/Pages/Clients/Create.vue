<template>
    <Head title="Criar" />

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
                            <h2 class="flex items-center gap-2 text-2xl text-slate-500"><i class="ph-users-three"></i> Formulário de cadastro</h2>
                            <Link :href="route('clientes.index')" class="w-auto px-3 py-1 text-lg transition-colors border rounded cursor-pointer border-slate-400 hover:bg-green-700 hover:text-white">Voltar</Link>
                        </div>
                        <div class="flex flex-col items-center justify-center py-4">
                            <form class="flex flex-col gap-3" @submit.prevent="submit">
                                <div class="flex flex-col">
                                    <label for="">Nome:</label>
                                    <input type="text" name="nome" v-model="form.nome" id="" placeholder="Digite o Nome">
                                </div>
                                <div class="flex flex-col">
                                    <label for="">RG:</label>
                                    <input type="text" name="rg" v-model="form.rg" id="" placeholder="RG - apenas número">
                                </div>
                                <div class="flex flex-col">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" v-model="form.email" id="" placeholder="Digite o email">
                                </div>
                                <div class="flex flex-col">
                                    <label for="">Telefone:</label>
                                    <input type="text" name="telefone" v-model="form.telefone" id="" placeholder="Digite o telefone">
                                </div>
                                <div class="flex flex-col">
                                    <label for="">Endereço:</label>
                                    <input type="text" name="endereco" v-model="form.endereco" id="" placeholder="Digite o endereço">
                                </div>
                                <div class="flex flex-col">
                                    <label for="">Imagem:</label>
                                    <input type="file" name="imagem" id="" placeholder="Digite o Nome">
                                </div>

                                <div class="py-4">
                                    <button type="submit" class="w-auto px-3 py-1 text-lg transition-colors border rounded cursor-pointer border-slate-400 hover:border-yellow-600 hover:bg-yellow-600 hover:text-white">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

    
    const props = defineProps({
        clientes: {
            type: Object,
            default: () => ({}),
        },
    });

    const form = useForm({
        nome:'',
        rg:'',
        email: '',
        telefone: '',
        endereco: '',
        imagem: null,
    });

    const submit = () => {
        form.post(route("clientes.store"));
    };
    

    /**
     * d
    methods: {
    },
     * const props = defineProps ({
        clientes: {
            type: Object,
            default: () => ({})
        }
    });

    const form = useForm({
        nome:null,
        rg:null,
        email: null,
        telefone: null,
        endereco: null,
        imagem: null,
    })
    
    function submit() {
        router.post('clientes.store', form)
    }
     */
</script>
