<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Artículos</li>
        </ol>
        <articulos></articulos>
    </main>
</template>

<script>
import Articulos from "./listar/Articulos";

export default {
    name: "listar",
    components: {
        Articulos
    }
}
</script>

<style scoped>

</style>
