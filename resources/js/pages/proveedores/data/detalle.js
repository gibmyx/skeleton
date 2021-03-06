import { v4 as uuidv4 } from 'uuid';

export default () => {
    return {
        id: '',
        uuid: uuidv4(),
        nombre: '',
        tipo_documento: '',
        categoria_id: '',
        precio_venta: 0,
        stock: 0,
        estado: 'activo',
    }
}
