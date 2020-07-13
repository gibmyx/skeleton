<template>
    <div class="container">
        <div class="row full-screan d-flex justify-content-center align-content-center text-center">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "App",

        computed: {
            ...mapGetters(['loggedIn'])
        }
    }
</script>

<style scoped>

</style>
