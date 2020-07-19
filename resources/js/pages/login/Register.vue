<template>
    <div class="col-4">
        <form class="form-signin" action="" @submit.prevent="crear" method="post" enctype="multipart/form-data">
            <img class="mb-4" src="img/favicon.png" alt="" width="72" height="72">
            <h1>Registrar</h1>
            <br/>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" v-model="email" placeholder="Email address" required>
            <br/>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control" v-model="name" placeholder="Username" required>
            <br/>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" v-model="password" placeholder="Password" required>
            <br/>
            <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
            <input type="password" id="inputConfirmPassword" class="form-control" v-model="password_confirmacion" placeholder="Confirm Password" required>
            <br/>
            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block px-4">Crear cuenta</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-block px-4" @click.prevent="limpiar">Limpiar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-link px-0" @click.prevent="ir_login">Ya tengo cuenta</button>
                </div>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>
    </div>
</template>

<script>
    import {required} from "vuelidate/lib/validators";

    export default {
        name: "Register",

        data () {
            return {
                password: '',
                password_confirmacion: '',
                email: '',
                name: '',
            }
        },

        validations: {
            username: {
                required
            },
            password: {
                required
            },
        },

        methods: {
            limpiar() {
                this.password = '';
                this.password_confirmacion = '';
                this.email = '';
                this.name = '';
            },
            ir_login() {
                this.$router.push({name: 'login'});
            },
            crear() {
                axios.post('/api/register', {
                    email: this.email,
                    password: this.password,
                    name: this.name,
                }).then(response => {
                    let message = response.data.message
                    this.$toast.success({
                        title: 'Éxito',
                        message: message,
                    });
                    setTimeout(function(){
                        this.limpiar();
                        this.ir_login();
                    }.bind(this), 2000);
                }).catch(error => {
                    let message = error.response.data;
                    this.$toast.error({
                        title: 'Error',
                        message: message,
                    });
                })
            }
        }
    }
</script>

<style scoped>

</style>
