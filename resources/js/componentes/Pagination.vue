<template>
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" v-if="paginacion.current_page > 1"
                   @click.prevent="cambiar(paginacion.current_page - 1)">Ant</a>
            </li>
            <li class="page-item" v-for="page in pagesNumber" :key="page"
                :class="page === isActived ? 'active' : ''">
                <a class="page-link" href="#" @click.prevent="cambiar(page)" v-text="page"></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" v-if="paginacion.current_page < paginacion.last_page"
                   @click.prevent="cambiar(paginacion.current_page + 1)">Sig</a>
            </li>
        </ul>
    </nav>
</template>

<script>
import paginacion from "./data/paginacion";

export default {
    name: "paginacion",

    props: ['params'],

    data() {
        return {
            offset: 1,
            paginacion: paginacion()
        }
    },

    computed: {
        pagesNumber() {
            if (!this.paginacion.to) {
                return [];
            }

            let from = this.paginacion.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }

            let to = from + (this.offset * 2);
            if (to >= this.paginacion.last_page) {
                to = this.paginacion.last_page;
            }

            let pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },

        isActived() {
            return this.paginacion.current_page;
        },
    },
    methods: {
        cambiar(page) {
            this.$emit('listar', page);
        },
        setPaginacion(paginacion) {
            this.paginacion = paginacion;
        },
    }
}
</script>

<style scoped>

</style>
