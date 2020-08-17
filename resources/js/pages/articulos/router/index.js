import Listar from "./../Listar"
import Crear from "./../Crear";
import Ver from "./../Ver";

export default [
    {
        path: '/articulos',
        name: 'articulos',
        component: Listar
    },
    {
        path: '/articulos/crear',
        name: 'articulos_crear',
        component: Crear
    },
    {
        path: '/articulos/ver/:uuid',
        name: 'articulos_ver',
        component: Ver,
        props: true
    },
];
