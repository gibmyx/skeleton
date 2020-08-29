<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Artículos
                <button type="button" class="btn btn-secondary" @click.prevent="IrFormularioCrear()">
                    <i class="icon-plus"></i>&nbsp;Nuevo
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
                    <tbody v-if="proveedores.length >= 1">
                    <tr
                        v-bind:is="'fila'"
                        v-for="o in proveedores"
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
                <nav class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" v-if="pagination.current_page > 1"
                               @click.prevent="cambiar(pagination.current_page - 1)">Ant</a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" :key="page"
                            :class="page == isActived ? 'active' : ''">
                            <a class="page-link" href="#" @click.prevent="cambiar(page)" v-text="page"></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" v-if="pagination.current_page < pagination.last_page"
                               @click.prevent="cambiar(pagination.current_page + 1)">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->

        <!--Modal de eliminar categoria-->
        <modal-estado :name="'ModalEstado'" v-on:Listar="Listar(pagination.current_page, params)"
                      ref="modalestado"></modal-estado>
    </div>

</template>

<script>
    import ModalEstado from "./../modal/ModalEstado";
    import Fila from "./Fila";
    import qs from 'qs';
    import params from "../data/params";
    import {mapActions, mapGetters, mapState} from "vuex";

    export default {
        name: "TablaPrincipal",

        data () {
            return {
                params: params(),
                proveedores: [],
            }
        },

        computed: {
            ...mapGetters(['isActived', 'pagesNumber']),
            ...mapState(['pagination']),
        },

        mounted() {
            this.Listar(1, this.params);
            this.$root.$on('Buscar', data => {
                this.Listar(1, data);
            });
        },

        methods: {
            ...mapActions(['cambiarPagina', 'setPagination']),

            Listar(page = 1, params = []){
                let param = {
                    params: params,
                };
                axios.get('/api/proveedores/ajax_listar_proveedores?page=' + page + '&'+ qs.stringify(param) ).then((response) => {
                    this.proveedores = response.data.proveedores;
                    this.pagination = response.data.pagination;
                });
            },

            cambiar(page) {
                this.cambiarPagina(page).then(() => {
                    this.Listar(page, this.params);
                });
            },

            IrFormularioCrear() {
                this.$router.push({name: 'proveedores_crear'})
            },

            ModalchangeState(detalle) {
                this.$refs.modalestado.show(detalle);
            },
        },

        components: {
            ModalEstado,
            Fila,
        },
    }
</script>

<style scoped>

</style>
