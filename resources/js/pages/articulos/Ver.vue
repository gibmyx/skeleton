<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Ver artículos</li>
        </ol>
        <loading  v-if="loading"></loading>
        <formulario :detalle="detalle" v-if="!loading"></formulario>
    </main>
</template>

<script>
import Formulario from "./Formulario";
import detalle from "./data/detalle";
import Loading from "./../../componentes/loading";

export default {
    name: "ver",

    props: ['uuid'],

    data () {
        return {
            loading: true,
            detalle: detalle(),
            catalogos: [],
        }
    },
    mounted() {
        if(this.loading){
            this.getCatalogos().then(() => {
                setTimeout(() => { this.loading = false; }, 2000);
            });
        }
    },
    methods: {
        getCatalogos() {
            return new Promise((resolve) => {
                axios.get('/api/articulos/ajax_get_catalogos').then((response) => {
                    this.catalogos = response.data;
                    this.getDetalle().then(() => {
                        resolve();
                    });
                });
            });
        },
        getDetalle() {
            return new Promise((resolve) => {
                let params = {erptkn: tkn, uuid: this.uuid};
                axios.get('/api/articulos/ajax_get_detalle/'+this.uuid).then((response) => {
                    this.detalle = response.data;
                    resolve();
                });
            });
        }
    },
    components: {
        Loading,
        Formulario,
    }
}
</script>

<style scoped>

</style>
