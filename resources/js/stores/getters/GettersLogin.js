const GettersLogin = {
    loggedIn(state) {
        return state.token !== null
    }
}

export default GettersLogin;
