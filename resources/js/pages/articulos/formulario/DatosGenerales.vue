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

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Precio de venta <span style="color: red">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <vue-numeric
                            class="form-control"
                            currency=""
                            separator=","
                            v-model="precio_venta"
                            :precision="2"
                        ></vue-numeric>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Descripción</label>
                    <input type="text" name="Descripción" class="form-control" id="Descripción"
                           v-model="descripcion"/>
                </div>

            </div>

            <div class="form-group row">
                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Codigo <span style="color: red">*</span></label>
                    <input type="text" name="Codigo" class="form-control" id="Codigo" v-model="codigo"/>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Stock <span style="color: red">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <vue-numeric
                            class="form-control"
                            name="Stock"
                            id="Stock"
                            currency=""
                            v-model="stock"
                        ></vue-numeric>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Categoria <span style="color: red">*</span></label>
                    <v-select :options="options"
                              v-model="categoria_id"
                              label="text"
                              :reduce="categoria => categoria.id"
                              taggable
                    ></v-select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-auto">
                    <barcode :value="codigo" :options="{format: 'EAN-13'}">
                        Generando código de barras
                    </barcode>
                </div>
            </div>
<!--            <div class="form-group row">-->
<!--                <div class="col-md-auto">-->
<!--                    <qrcode-vue :value="json" :size="size" level="H"></qrcode-vue>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <pre>{{detalle}}</pre>
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
            codigo: '',
            nombre: '',
            descripcion: '',
            categoria_id: '',
            precio_venta: 0,
            stock: 0,

            options: [
                {
                    text: 'hola',
                    id: '1'
                },
                {
                    text: 'chao',
                    id: '2'
                },
                {
                    text: 'hi',
                    id: '3'
                },
                {
                    text: 'goodbye',
                    id: '4'
                },
            ],
            json: '',
        }
    },

    methods: {

    },

    mounted() {
        Vue.nextTick(() => {
            this.id = this.detalle.id;
            this.uuid = this.detalle.uuid;
            this.codigo = this.detalle.codigo;
            this.nombre = this.detalle.nombre;
            this.descripcion = this.detalle.descripcion;
            this.categoria_id = this.detalle.categoria_id;
            this.precio_venta = this.detalle.precio_venta;
            this.stock = this.detalle.stock;

            this.json = JSON.stringify({
                uuid: this.uuid,
                codigo: this.codigo,
                nombre: this.nombre,
            });
        });
    },

    watch: {
        id(val) {
            this.detalle['id'] = val;
        },
        uuid(val) {
            this.detalle['uuid'] = val;
        },
        codigo(val) {
            this.detalle['codigo'] = val;
        },
        nombre(val) {
            this.detalle['nombre'] = val;
        },
        descripcion(val) {
            this.detalle['descripcion'] = val;
        },
        categoria_id(val) {
            this.detalle['categoria_id'] = val;
        },
        precio_venta(val) {
            this.detalle['precio_venta'] = val;
        },
        stock(val) {
            this.detalle['stock'] = val;
        },
    },

    components: {
        'barcode': VueBarcode,
        QrcodeVue,
    }
}
</script>

<style scoped>

</style>
