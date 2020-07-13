import * as types from './mutation-types';

export default {
    [types.GET_BREADCRUMBS](state, params) {
        state.breadcrumbs = params;
    },
};
