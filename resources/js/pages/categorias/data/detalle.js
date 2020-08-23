import { v4 as uuidv4 } from 'uuid';

export default () => {
    return {
        id: '',
        uuid: uuidv4(),
        nombre: '',
        descripcion: '',
        condicion: '',
    }
}
