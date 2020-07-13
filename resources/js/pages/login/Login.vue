<template>
    <div class="col-4">
        <form class="form-signin" action="" @submit.prevent="login" method="post" enctype="multipart/form-data">
            <img class="mb-4" src="img/favicon.png" alt="" width="72" height="72">
            <h1>Acceder</h1>
            <p class="text-muted">Control de acceso al sistema</p>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" v-model="username" placeholder="Email address" required>
            <br/>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" v-model="password" placeholder="Password" required>
            <br/>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block px-4">Acceder</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary btn-block px-4" @click.prevent="register">Registrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-link px-0">Olvidaste tu password?</button>
                </div>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>
    </div>
</template>

<script>
    import {required} from "vuelidate/lib/validators";

    export default {
        name: "Login",

        data() {
            return {
                username: '',
                password: '',
                error: '',
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

        methods:{
            login() {
                this.$store
                .dispatch("retrieveToken", {
                    username: this.username,
                    password: this.password
                })
                .then(response => {
                    this.$router.push({ name: "dashboard" });
                    this.$toast.success({
                        title: 'Éxito',
                        message: 'Logueado con existo',
                    });
                })
                .catch(error => {
                    this.error = error.response.data;
                    this.$toast.error({
                        title: 'Éxito',
                        message: this.error,
                    });
                });
            },
            register() {
                this.$router.push({name: 'register'});
            }
        }
    }
</script>

<style scoped>

</style>
