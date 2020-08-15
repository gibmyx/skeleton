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
                        <input type="text" name="Nombre" class="form-control" id="Nombre"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Descripción</label>
                        <input type="text" name="Descripción" class="form-control" id="Descripción"/>
                    </div>

                </div>
                <div class="form-group row justify-content-end">
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

export default {
    name: "PanelBusqueda",
    methods: {
        listarArticulo() {
            let data = 'hola';
            this.$root.$emit('Buscar', data);
        }
    },
}
</script>

<style scoped>

</style>
