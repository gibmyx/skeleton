<template>
    <div>
        <navbar></navbar>
        <div class="app-body">
            <sidebar></sidebar>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>

</style>
