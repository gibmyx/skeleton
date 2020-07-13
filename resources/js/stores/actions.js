import * as types from './mutation-types';
import qs from  'qs';

export const setEstadoInicial = ({commit}, value) => {
    commit(types.SET_ESTADO_INICIAL, value);
};
