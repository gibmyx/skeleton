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

        <!--Modal de eliminar categoria-->
        <modal-estado :name="'ModalEstado'" v-on:Listar="Listar(pagination.current_page, params)"
                      ref="modalestado"></modal-estado>
    </div>

</template>

<script>
import Fila from "./Fila";
import ModalEstado from "./../modal/ModalEstado";
import qs from 'qs';
import params from "../../articulos/data/params";
import {mapGetters, mapActions, mapState} from 'vuex';

export default {
    name: "Categorias",

    data() {
        return {
            params: params(),
            categorias: [],
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

        Listar(page = 1, params = []) {
            let param = {
                params: params,
            };
            axios.get('/api/categorias/ajax_listar_categorias?page=' + page + '&'+ qs.stringify(param) ).then((response) => {
                this.categorias = response.data.categorias;
                this.setPagination(response.data.pagination);
            });
        },

        cambiar(page) {
            this.cambiarPagina(page).then(() => {
                this.Listar(page, this.params);
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
    },
}
</script>

<style scoped>

</style>

