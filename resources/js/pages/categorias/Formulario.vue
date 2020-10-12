<template>
    <div class="container-fluid">
        <form id="myform" autocomplete="off">
            <!-- Ejemplo de tabla Listado -->
            <datos-generales :detalle="detalle" :submitStatus="submitStatus" ref="detalle"></datos-generales>

            <div class="form-group row justify-content-end">
                <div class="col-md-3 d-flex justify-content-center">
                    <button class="btn btn-light btn-block" @click.prevent="cancelar()"><i
                        class="fa fa-arrow-left"></i> Cancelar
                    </button>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <button class="btn btn-primary btn-block" @click.prevent="Guardar()"><i
                        class="fa fa-save"></i> Guardar
                    </button>
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </form>
    </div>
</template>

<script>
import DatosGenerales from "./formulario/DatosGenerales";
import qs from 'qs';
import { required, minLength } from 'vuelidate/lib/validators';

export default {
    name: "formulario",

    props: ['detalle'],

    data() {
        return {
            submitStatus: false,
        }
    },

    components: {
        DatosGenerales
    },

    methods: {
        initJQuery() {
            // let body = $('body');
            // let context = this;
            // body.off('click', '#helpFacturasCompras').on('click', "#helpFacturasCompras", function (e) {
            //     window.open(phost() + 'ayudas/ver/facturas_compras', '_blank');
            // });
        },
        cancelar() {
            this.$router.push({name: 'categorias'})
        },
        Guardar() {
            if(this.$refs.detalle.Validation()){
                this.$toast.error({
                    title: 'Error',
                    message: 'Debe completar todos los campos requeridos *',
                });
                return 0;
            }
            axios.post('/api/categorias/ajax_guardar/'+this.detalle.uuid, {...this.detalle}).then((response) => {
                let message = response.data.message
                this.$toast.success({
                    title: 'Éxito',
                    message: message,
                });
                this.$router.push({name: response.data.name});
            }).catch((error) => {
                let message = error.response.data;
                this.$toast.error({
                    title: 'Error',
                    message: message,
                });
            });
        }

    }

}
</script>

<style scoped>

</style>
