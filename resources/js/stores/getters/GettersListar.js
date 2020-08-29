const GettersListar = {
    pagesNumber(state) {
        if (!state.pagination.to) {
            return [];
        }

        let from = state.pagination.current_page - state.offset;
        if (from < 1) {
            from = 1;
        }

        let to = from + (state.offset * 2);
        if (to >= state.pagination.last_page) {
            to = state.pagination.last_page;
        }

        let pagesArray = [];
        while (from <= to) {
            pagesArray.push(from);
            from++;
        }
        return pagesArray;
    },

    isActived (state) {
        return state.pagination.current_page;
    },

}

export default GettersListar;
