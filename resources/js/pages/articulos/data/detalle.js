import { v4 as uuidv4 } from 'uuid';

export default () => {
    return {
        id: '',
        uuid: uuidv4(),
        codigo: '',
        nombre: '',
        descripcion: '',
        categoria_id: '',
        precio_venta: 0,
        stock: 0,
        estado: 'activo',
    }
}
