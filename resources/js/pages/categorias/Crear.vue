<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Crear categorias</li>
        </ol>
        <loading v-if="loading"></loading>
        <formulario :detalle="detalle" v-if="!loading"></formulario>
    </main>
</template>

<script>
import Formulario from "./Formulario";
import detalle from "./data/detalle";
import Loading from "./../../componentes/loading";

export default {
    name: "crear",
    data() {
        return {
            loading: true,
            detalle: detalle(),
        }
    },
    mounted() {
        this.loading = false;
    },
    components: {
        Formulario,
        Loading,
    }
}
</script>

<style scoped>

</style>
