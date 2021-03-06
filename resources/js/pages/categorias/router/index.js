import Listar from "./../Listar";
import Crear from "./../Crear";
import Ver from "./../Ver";

export default [
    {
        path: '/categorias',
        name: 'categorias',
        component: Listar,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/categorias/crear',
        name: 'categorias_crear',
        component: Crear,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/categorias/ver/:uuid',
        name: 'categorias_ver',
        component: Ver,
        props: true,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
];
