import Listar from "./../Listar"
import Crear from "./../Crear";
import Ver from "./../Ver";

export default [
    {
        path: '/articulos',
        name: 'articulos',
        component: Listar,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/articulos/crear',
        name: 'articulos_crear',
        component: Crear,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/articulos/ver/:uuid',
        name: 'articulos_ver',
        component: Ver,
        props: true,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
];
