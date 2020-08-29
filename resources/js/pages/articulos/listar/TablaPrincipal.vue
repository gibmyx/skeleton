<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Artículos
                <button type="button" class="btn btn-secondary" @click.prevent="IrFormularioCrear">
                    <i class="icon-plus"></i>&nbsp;Nuevoe ser
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th width="10%" class="text-center">Opciones</th>
                        <th width="10%" class="text-center">Codigo</th>
                        <th width="10%" class="text-center">Nombre</th>
                        <th width="15%" class="text-center">Descripcion</th>
                        <th width="10%" class="text-center">Categoria</th>
                        <th width="15%" class="text-center">Precio de venta</th>
                        <th width="10%" class="text-center">Stock</th>
                        <th width="10%" class="text-center">Estado</th>
                    </tr>
                    </thead>
                    <tbody v-if="articulos.length >= 1">
                    <tr
                        v-bind:is="'fila'"
                        v-for="o in articulos"
                        :o="o"
                        v-on:changeState="ModalchangeState($event)"
                        :key="o.id">
                    </tr>
                    </tbody>
                    <tbody v-else>
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-warning text-center" role="alert">
                                No se encontraron resultados
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination ref="paginacion" :params="params"  v-on:listar="listar($event, params)"></pagination>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->

        <!--Modal de eliminar categoria-->
        <modal-estado :name="'ModalEstado'" v-on:listar="listar(paginacion.current_page, params)"
                      ref="modalestado"></modal-estado>
    </div>

</template>

<script>
    import Pagination from "../../../componentes/Pagination";
    import ModalEstado from "./../modal/ModalEstado";
    import Fila from "./Fila";
    import qs from 'qs';

    import params from "../data/params";

    export default {
        name: "TablaPrincipal",

        data () {
            return {
                params: params(),
                articulos: [],
            }
        },

        mounted() {
            this.listar(1, this.params);
            this.$root.$on('Buscar', data => {
                this.listar(1, data);
            });
        },

        methods: {

            listar(page = 1, params = []){
                let param = {
                    params: params,
                };
                axios.get('/api/articulos/ajax_listar_articulos?page=' + page + '&'+ qs.stringify(param) ).then((response) => {
                    this.articulos = response.data.articulos;
                    this.$refs.paginacion.setPaginacion(response.data.pagination);
                });
            },

            IrFormularioCrear() {
                this.$router.push({name: 'articulos_crear'})
            },

            ModalchangeState(detalle) {
                this.$refs.modalestado.show(detalle);
            },
        },

        components: {
            ModalEstado,
            Fila,
            Pagination,
        },
    }
</script>

<style scoped>

</style>
