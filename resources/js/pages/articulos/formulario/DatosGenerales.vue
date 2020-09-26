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
                    <label class="mt-2" style="color: red" v-show="!$v.nombre.required&& submitStatus">El nombre es
                        requerido </label>
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
                    <label class="mt-2" style="color: red" v-show="!$v.precio_venta.required&& submitStatus">El precio
                        de venta es requerido </label>
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
                    <label class="mt-2" style="color: red" v-show="!$v.codigo.required && submitStatus">El Codigo es
                        requerido </label>
                    <label class="mt-2" style="color: red"
                           v-show="(!$v.codigo.minLength || !$v.codigo.maxLength) &&  submitStatus">El codigo debe tener
                        entre 8 - 10 caracteres </label>
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
                    <label class="mt-2" style="color: red" v-show="!$v.stock.required && submitStatus">El Stock es
                        requerido </label>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Categoria <span style="color: red">*</span></label>
                    <select class="form-control" name="Estado" required="" :config="{}" :attr="{}"
                              v-model="categoria_id">
                        <option value="">Seleccione</option>
                        <option :value="termino_pago.id" v-for="termino_pago in catalogos.categorias"
                                v-html="termino_pago.text"></option>
                    </select>
                    <label class="mt-2" style="color: red" v-show="!$v.categoria_id.required&& submitStatus">La
                        Categoria es requerido </label>
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
    </div>
</template>

<script>
import VueBarcode from 'vue-barcode';
import QrcodeVue from "qrcode.vue";
import {required, minLength, maxLength} from 'vuelidate/lib/validators';

export default {
    name: "DatosGenerales",

    props: ['detalle', 'catalogos', 'submitStatus'],

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
            estado: '',
            myOptions: [
                {id: '1', text: 'Telefono'},
                {id: '2', text: 'Laptos'},
                {id: '3', text: 'Alimentos'},
                {id: '4', text: 'Cocina'},
            ],
            json: '',
        }
    },

    validations: {
        nombre: {
            required
        },
        precio_venta: {
            required
        },
        categoria_id: {
            required
        },
        stock: {
            required
        },
        codigo: {
            required,
            minLength: minLength(8),
            maxLength: maxLength(10),
        },
    },

    methods: {
        Validation() {
            this.$v.$touch();
            return this.validation = this.$v.$invalid ? true : false;
        }
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
            this.estado = this.detalle.estado;

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
        estado(val) {
            this.detalle['estado'] = val;
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
