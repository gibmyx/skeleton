<template>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Crear artículos
        </div>
        <div class="card-body">
            <div class="form-group row">

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Nombre <span style="color: red">*</span></label>
                    <input type="text" name="Nombre" class="form-control" id="Nombre" v-model="nombre"/>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Descripción</label>
                    <input type="text" name="Descripción" class="form-control" id="Descripción"
                           v-model="descripcion"/>
                </div>


                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Estado <span style="color: red">*</span></label>
                    <v-select :options="options" :reduce="country => country.code" label="country" v-model="condicion"/>
                </div>

            </div>
        </div>
        <pre>{{ detalle }}</pre>
    </div>
</template>

<script>
import VueBarcode from 'vue-barcode';
import QrcodeVue from "qrcode.vue";
import 'vue-select/dist/vue-select.css';

export default {
    name: "DatosGenerales",

    props: ['detalle'],

    data() {
        return {
            id: '',
            uuid: '',
            nombre: '',
            descripcion: '',
            condicion: '',
            options: [{code: 'CA', country: 'Canada'}],
        }
    },

    methods: {},

    mounted() {
        Vue.nextTick(() => {

            this.id = this.detalle.id;
            this.uuid = this.detalle.uuid;
            this.nombre = this.detalle.nombre;
            this.descripcion = this.detalle.descripcion;
            this.condicion = this.detalle.condicion;

        });
    },

    watch: {
        id(val) {
            this.detalle['id'] = val;
        },
        uuid(val) {
            this.detalle['uuid'] = val;
        },
        nombre(val) {
            this.detalle['nombre'] = val;
        },
        descripcion(val) {
            this.detalle['descripcion'] = val;
        },
        condicion(val) {
            this.detalle['condicion'] = val;
        },
    },
}
</script>

<style scoped>

</style>
