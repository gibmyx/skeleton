
const actionsLogin = {
    retrieveToken(context, credentials) {
        return new Promise((resolve, reject) => {
            axios.post('/api/login', {
                username: credentials.username,
                password: credentials.password,
            })
                .then(response => {
                    if(typeof response.data.access_token == 'undefined'){
                        reject({response: {data: 'Ha ocurrido un error con el servidor'}})
                    }else{
                        const token = response.data.access_token
                        localStorage.setItem('access_token', token)
                        context.commit('retrieveToken', token)
                        resolve(response)
                    }
                })
                .catch(error => {
                    reject(error)
                })
        })
    },

    destroyToken(context) {
        if (context.getters.loggedIn){
            return new Promise((resolve, reject) => {
                axios.post('/api/logout', '', {
                    headers: { Authorization: "Bearer " + context.state.token }
                })
                    .then(response => {
                        //console.log(response)
                        localStorage.removeItem('access_token')
                        context.commit('destroyToken')

                        resolve(response)
                    })
                    .catch(error => {
                        //console.log(error)
                        localStorage.removeItem('access_token')
                        context.commit('destroyToken')

                        reject(error)
                    })
            })
        }
    }

}

export default actionsLogin;
