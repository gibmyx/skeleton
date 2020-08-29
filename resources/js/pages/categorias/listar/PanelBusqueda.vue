<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Buscar artículos
            </div>
            <div class="card-body">
                <div class="form-group row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Nombre</label>
                        <input type="text" name="Nombre" class="form-control" id="Nombre" v-model="params.nombre"/>
                    </div>

                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-info btn-block" @click.prevent="LimpiarBusqueda"><i
                            class="fa fa-clean"></i> Limpiar
                        </button>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-primary btn-block" @click.prevent="listarArticulo"><i
                            class="fa fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

</template>

<script>
import params from "./../data/params";

export default {
    name: "PanelBusqueda",
    data() {
        return {
            params: params(),
        }
    },
    methods: {
        listarArticulo() {
            let data = this.params;
            // this.$root.$emit('Buscar', data);
        },
        LimpiarBusqueda() {
            this.params = params();
            // this.$root.$emit('Buscar', this.params);
        }
    },
    // beforeDestroy: function () {
    //     this.$root.$off('Buscar')
    // },
}
</script>

<style scoped>

</style>
