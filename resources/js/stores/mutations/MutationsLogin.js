const MutationsLogin = {
    retrieveToken(state, token) {
        state.token = token
    },
    destroyToken(state) {
        state.token = null
    }
}

export default MutationsLogin;
