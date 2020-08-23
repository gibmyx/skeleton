<template>
    <tr>
        <td width="10%" class="text-center">
            <button type="button" class="btn btn-warning btn-sm" @click.prevent="EditarCategoria">
                <i class="icon-pencil"></i>
            </button>
            <button v-if="o.estado === 'activo'"  type="button" class="btn btn-danger btn-sm" @click.prevent="DesactivarCategoria">
                <i class="icon-trash"></i>
            </button>
            <button v-else type="button" class="btn btn-info btn-sm" @click.prevent="DesactivarCategoria">
                <i class="icon-check"></i>
            </button>
        </td>
        <td width="20%" v-html="o.nombre"></td>
        <td width="30%" v-html="o.descripcion"></td>
        <td width="20%" class="text-center">
            <span v-if="o.estado === 'activo'" class="badge badge-success">Activo</span>
            <span v-else class="badge badge-danger">Inactivo</span>
        </td>
    </tr>
</template>

<script>
export default {
    props:{
        o: Object,
    },

    name: "Categoria",

    data () {
        return {
            id: '',
            uuid: '',
            nombre: '',
            descripcion: '',
            estado: '',
        }
    },

    mounted() {
        Vue.nextTick(() => {
            this.id = this.o.id;
            this.uuid = this.o.uuid;
            this.nombre = this.o.nombre;
            this.descripcion = this.o.descripcion;
            this.estado = this.o.estado;
        });
    },

    methods: {
        EditarCategoria() {
            this.$router.push({name: 'categorias_ver', params: {uuid: this.uuid}})
        },
        DesactivarCategoria() {

            this.$emit('EliminarCategoria', this.o);
        }
    },
    watch: {
        id(val){
            this.o['id'] = val;
        },
        uuid(val){
            this.o['uuid'] = val;
        },
        nombre(val){
            this.o['nombre'] = val;
        },
        descripcion(val){
            this.o['descripcion'] = val;
        },
        estado(val){
            this.o['estado'] = val;
        },
    }
}
</script>

<style scoped>

</style>
