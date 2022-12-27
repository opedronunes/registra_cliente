import { createRouter, createWebHashHistory } from "vue-router";


const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "clientes/index",
            name: "index",
            component: () => import("../Pages/Listar.vue"),
        },
        {
            path: "clientes/create",
            name: "criar",
            component: () => import("../Pages/Criar.vue"),
        },
        {
            path: "clientes/:id/edit",
            name: "editar",
            component: () => import("../Pages/Editar.vue"),
        }

    ]
})
export default router;