<template>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Crear artículos
        </div>
        <div class="card-body">
            <div class="form-group row">

                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Nombre <span style="color: red">*</span></label>
                    <input type="text" name="Nombre" class="form-control" id="Nombre" v-model="nombre" :class="{ 'is-invalid': submitStatus && $v.nombre.$error }"/>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Descripción</label>
                    <input type="text" name="Descripción" class="form-control" id="Descripción"
                           v-model="descripcion"/>
                </div>


                <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label>Estado <span style="color: red">*</span></label>
                    <select-2 class="form-control" name="Estado" required="" :config="{}" :attr="{}" v-model="estado">
                        <option value="">Seleccione</option>
                        <option :value="termino_pago.id" v-for="termino_pago in myOptions"
                                v-html="termino_pago.text"></option>
                    </select-2>
<!--                    <v-select :options="options" :reduce="country => country.code" label="country" v-model="condicion"/>-->
<!--                    <select2 v-model="condicion" :options="myOptions" :settings="{}" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />-->
<!--                    <select class="form-control">-->
<!--                        <option value="">Seleccione</option>-->
<!--                    </select>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
import { required, minLength } from 'vuelidate/lib/validators';

export default {
    name: "DatosGenerales",

    props: ['detalle', 'submitStatus'],

    data() {
        return {
            id: '',
            uuid: '',
            nombre: '',
            descripcion: '',
            estado: '',
            myOptions: [{id: 'activo', text: 'Activo'}, {id: 'inactivo', text: 'Inactivo'}],

            validation: false,
        }
    },

    mounted() {
        Vue.nextTick(() => {

            this.id = this.detalle.id;
            this.uuid = this.detalle.uuid;
            this.nombre = this.detalle.nombre;
            this.descripcion = this.detalle.descripcion;
            this.estado = this.detalle.estado;

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
        estado(val) {
            this.detalle['estado'] = val;
        },
    },

    validations: {
        nombre: {
            required
        },
    },

    methods: {

        Validation() {
            this.$v.$touch();
            return this.validation = this.$v.$invalid ?  true :  false;
        }
    }
}
</script>

<style scoped>

</style>
