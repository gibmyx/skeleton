<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Categorías
                <button type="button" class="btn btn-secondary" @click.prevent="IrFormularioCrear()">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th width="10%" class="text-center">Opciones</th>
                        <th width="20%" class="text-center">Nombre</th>
                        <th width="30%" class="text-center">Descripción</th>
                        <th width="20%" class="text-center">Estado</th>
                    </tr>
                    </thead>
                    <tbody v-if="categorias.length >= 1">
                    <tr
                        v-bind:is="'fila'"
                        v-for="o in categorias"
                        :o="o"
                        v-on:changeState="ModalchangeState($event)"
                        :key="o.id">
                    </tr>
                    </tbody>
                    <tbody v-else>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-warning text-center" role="alert">
                                No se encontraron resultados
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination ref="paginacion" :params="params" v-on:listar="listar($event, params)"></pagination>
            </div>
        </div>

        <!--Modal de eliminar categoria-->
        <modal-estado :name="'ModalEstado'" v-on:listar="listar(pagination.current_page, params)"
                      ref="modalestado"></modal-estado>
    </div>

</template>

<script>
    import Fila from "./Fila";
    import ModalEstado from "./../modal/ModalEstado";
    import qs from 'qs';
    import params from "../../articulos/data/params";
    import Pagination from "../../../componentes/Pagination";

    export default {
        name: "Categorias",

        data() {
            return {
                params: params(),
                categorias: [],
            }
        },

        mounted() {
            this.listar(1, this.params);
            this.$root.$on('Buscar', data => {
                this.listar(1, data);
            });
        },

        methods: {

            listar(page = 1, params = []) {
                let param = {
                    params: params,
                };
                axios.get('/api/categorias/ajax_listar_categorias?page=' + page + '&' + qs.stringify(param)).then((response) => {
                    this.categorias = response.data.categorias;
                    this.$refs.paginacion.setPaginacion(response.data.pagination);
                });
            },

            IrFormularioCrear() {
                this.$router.push({name: 'categorias_crear'})
            },

            ModalchangeState(detalle = null) {
                this.$refs.modalestado.show(detalle);
            },
        },

        components: {
            Fila,
            ModalEstado,
            Pagination,
        },
}
</script>

<style scoped>

</style>

