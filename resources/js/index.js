import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '@/Pages/Dashboard.vue';
import Notes from '@/Pages/Notes.vue';
import ApiTokens from '@/Pages/ApiTokens.vue';

const routes = [
    { path: '/', component: Dashboard },
    { path: '/notes', component: Notes },
    { path: '/api-tokens', component: ApiTokens },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
