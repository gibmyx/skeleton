import Dashboard from "./../Dashboard";

export default [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
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
