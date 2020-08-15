<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Artículos</li>
        </ol>
        <panel-busqueda></panel-busqueda>
        <tabla-principal></tabla-principal>
    </main>
</template>

<script>
import TablaPrincipal from "./listar/TablaPrincipal";
import PanelBusqueda from "./listar/PanelBusqueda";

export default {
    name: "listar",
    components: {
        TablaPrincipal,
        PanelBusqueda,
    }
}
</script>

<style scoped>

</style>
