<template>
    <tr>
        <td width="10%" class="text-center">
            <button type="button" class="btn btn-warning btn-sm" @click.prevent="EditarCategoria">
                <i class="icon-pencil"></i>
            </button>
            <button v-if="o.estado == 'activo'"  type="button" class="btn btn-danger btn-sm" @click.prevent="changeState">
                <i class="icon-trash"></i>
            </button>
            <button v-else type="button" class="btn btn-info btn-sm" @click.prevent="changeState">
                <i class="icon-check"></i>
            </button>
        </td>

        <td width="10%" v-html="o.codigo"></td>
        <td width="10%" v-html="o.nombre"></td>
        <td width="15%" v-html="o.descripcion"></td>
        <td width="10%" v-html="o.categoria"></td>
        <td width="15%" v-html="o.precio_venta"></td>
        <td width="10%" v-html="o.stock"></td>

        <td width="10%" class="text-center">
            <span v-if="o.estado == 'activo'" class="badge badge-success">Activo</span>
            <span v-else class="badge badge-danger">Inactivo</span>
        </td>
    </tr>
</template>

<script>
    export default {
        props:{
            o: Object,
        },

        name: "Fila",

        data () {
            return {
                id: '',
                uuid: '',
                nombre: '',
                categoria_id: '',
                categoria: '',
                codigo: '',
                precio_venta: '',
                descripcion: '',
                stock: '',
                estado: '',
            }
        },

        mounted() {
            Vue.nextTick(() => {
                this.id = this.o.id;
                this.uuid = this.o.uuid;
                this.nombre = this.o.nombre;
                this.categoria_id = this.o.categoria_id;
                this.categoria = this.o.categoria;
                this.codigo = this.o.codigo;
                this.precio_venta = this.o.precio_venta;
                this.descripcion = this.o.descripcion;
                this.stock = this.o.stock;
                this.estado = this.o.estado;
            });
        },

        methods: {
            EditarCategoria() {
                this.$router.push({name: 'proveedores_ver', params: {uuid: this.uuid}})
            },

            changeState() {
                this.$emit('changeState', this.o);
            }
        },
        watch: {
            nombre(val){
                this.o['nombre'] = val;
            },
            categoria_id(val){
                this.o['categoria_id'] = val;
            },
            categoria(val){
                this.o['categoria'] = val;
            },
            codigo(val){
                this.o['codigo'] = val;
            },
            precio_venta(val){
                this.o['precio_venta'] = val;
            },
            descripcion(val){
                this.o['descripcion'] = val;
            },
            stock(val){
                this.o['stock'] = val;
            },
            estado(val){
                this.o['estado'] = val;
            },
        }
    }
</script>

<style scoped>

</style>
