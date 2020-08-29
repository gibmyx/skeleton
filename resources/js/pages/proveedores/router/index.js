import Listar from "./../Listar"
import Crear from "./../Crear";
import Ver from "./../Ver";

export default [
    {
        path: '/proveedores',
        name: 'proveedores',
        component: Listar,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/proveedores/crear',
        name: 'proveedores_crear',
        component: Crear,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
    {
        path: '/proveedores/ver/:uuid',
        name: 'proveedores_ver',
        component: Ver,
        props: true,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        }
    },
];
