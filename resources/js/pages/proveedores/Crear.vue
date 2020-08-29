<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Crear artículos</li>
        </ol>
        <loading v-if="loading"></loading>
        <formulario :detalle="detalle" :catalogos="catalogos" v-if="!loading"></formulario>
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
            catalogos: [],
        }
    },
    mounted() {
        if(this.loading){
            this.getCatalogos().then(() => {
                this.loading = false;
            });
        }
    },
    methods: {
        getCatalogos() {
            return new Promise((resolve) => {
                axios.get('/api/proveedores/ajax_get_catalogos').then((response) => {
                    this.catalogos = response.data;
                        resolve();
                });
            });
        },
    },
    components: {
        Formulario,
        Loading,
    }
}
</script>

<style scoped>

</style>
