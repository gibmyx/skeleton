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
                        <label>Codigo</label>
                        <input type="text" name="Codigo" class="form-control" id="Codigo" v-model="params.codigo"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Nombre</label>
                        <input type="text" name="Nombre" class="form-control" id="Nombre" v-model="params.nombre"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Descripción</label>
                        <input type="text" name="Descripción" class="form-control" id="Descripción" v-model="params.descripcion"/>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Rango de montos</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <vue-numeric
                                class="form-control"
                                currency=""
                                separator=","
                                v-model="params.monto_desde"
                                :precision="2"
                            ></vue-numeric>
                            <div class="input-group-addon">a </div>
                            <vue-numeric
                                class="form-control"
                                currency=""
                                separator=","
                                v-model="params.monto_hasta"
                                :precision="2"
                            ></vue-numeric>
                        </div>
                    </div>

                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-md-3 d-flex justify-content-center">
                        <button class="btn btn-info btn-block" @click.prevent="LimpiarBusqueda()"><i
                            class="fa fa-clean"></i> Limpiar
                        </button>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center">
                        <button class="btn btn-primary btn-block" @click.prevent="listarArticulo(1)"><i
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
import params from "../data/params";

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
            this.$root.$emit('Buscar', data);
        },
        LimpiarBusqueda() {
            this.params = params();
            this.$root.$emit('Buscar', this.params);
        }
    },
    beforeDestroy: function () {
        this.$root.$off('Buscar')
    },
}
</script>

<style scoped>

</style>
