import Listar from "./../Listar"
import Crear from "./../Crear";

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
];
