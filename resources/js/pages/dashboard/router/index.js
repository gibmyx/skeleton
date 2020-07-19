import Dashboard from "./../Dashboard";
import navbar from "../../../componentes/navbar";

export default [
    {
        path: '/dashboard',
        name: 'dashboard',
        components: {
            header: navbar,
            default: Dashboard
        },
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/',
        redirect: '/dashboard',
    },
]
