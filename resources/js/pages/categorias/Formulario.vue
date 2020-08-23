<template>
    <div class="container-fluid">
        <form id="myform" autocomplete="off">
            <!-- Ejemplo de tabla Listado -->
            <datos-generales :detalle="detalle"></datos-generales>

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

export default {
    name: "formulario",

    props: ['detalle'],

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
            axios.post('/api/categorias/ajax_guardar/'+this.detalle.uuid, {params: this.detalle}).then((response) => {
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
