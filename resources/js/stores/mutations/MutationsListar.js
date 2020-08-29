const MutationsListar = {
    ChangerPages(state, page) {
        state.pagination.current_page = page;
    },
    SetPaginationState(state, params) {
        state.pagination = params;
    }
}

export default MutationsListar;
