const ActionsListar = {
    cambiarPagina(context, params) {
        context.commit('ChangerPages', params.page);
    },
    setPagination(context, params) {
        return new Promise((resolve, reject) => {
            context.commit('SetPaginationState', params);
            resolve
        });
    }
}

export default ActionsListar;
