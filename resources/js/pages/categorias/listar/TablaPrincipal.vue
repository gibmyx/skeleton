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
                        v-on:EliminarCategoria="ModalDeshabilitar($event)"
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
                               @click.prevent="cambiarPagina(pagination.current_page - 1 )">Ant</a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" :key="page"
                            :class="page == isActived ? 'active' : ''">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page)" v-text="page"></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" v-if="pagination.current_page < pagination.last_page"
                               @click.prevent="cambiarPagina(pagination.current_page + 1 )">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!--Modal de eliminar categoria-->
        <modal-estado :name="'ModalEstado'" v-on:listarCategoria="listarCategoria(pagination.current_page, params)"
                      ref="modalestado"></modal-estado>
    </div>

</template>

<script>
import Fila from "./Fila";
import ModalEstado from "./../modal/ModalEstado";
import qs from 'qs';
import params from "../../articulos/data/params";

export default {
    name: "Categorias",

    data() {
        return {
            params: params(),

            opcion: 'nombre',
            texto: '',
            categorias: [],

            pagination: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0,
            },
            offset: 1
        }
    },

    computed: {

        isActived: function () {
            return this.pagination.current_page;
        },

        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }

            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }

            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }

            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },


    },

    mounted() {
        this.listarCategoria(1, this.params);
        this.$root.$on('Buscar', data => {
            this.listarCategoria(1, data);
        });
    },

    methods: {
        listarCategoria(page = 1, params = []) {
            let param = {
                params: params,
            };
            axios.get('/api/categorias/ajax_listar_categorias?page=' + page + '&'+ qs.stringify(param) ).then((response) => {
                this.categorias = response.data.categorias;
                this.pagination = response.data.pagination;
            });
        },
        cambiarPagina(page) {
            let me = this;
            me.pagination.current_page = page;
            me.listarCategoria(page, this.params)
        },
        IrFormularioCrear() {
            this.$router.push({name: 'categorias_crear'})
        },
        ModalDeshabilitar(categoria = null) {
            this.$refs.modalestado.show(categoria);
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

