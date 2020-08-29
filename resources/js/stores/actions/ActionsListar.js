const ActionsListar = {
    cambiarPagina(context, params) {
        context.commit('ChangerPages', params.page)
        console.log(params);
        // params.entity.Listar(params.page, params.entity.params)
    },
    setPagination(context, params) {
        context.commit('SetPaginationState', params)
    }
}

export default ActionsListar;
