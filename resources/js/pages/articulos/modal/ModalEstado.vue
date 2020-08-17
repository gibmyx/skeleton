<template>
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" :id="name+'Modal'" tabindex="-1" role="dialog" :aria-labelledby="name+'ModalLabel'"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog" :class="estado == 'activo' ? 'modal-danger' : 'modal-info' " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 v-if="estado == 'activo'" class="modal-title">Eliminar artículo</h4>
                    <h4 v-else class="modal-title">activar Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p v-if="estado == 'activo'">Estas seguro de eliminar el artículo?</p>
                    <p v-else>Estas seguro de activar el artículo?</p>
                    <p>Nombre: <strong>{{nombre}}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn" :class="estado == 'activo' ? 'btn-danger' : 'btn-info' " v-text="estado == 'activo' ? 'Eliminar' : 'Activar'" @click.prevent="GuardarCategoria"></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin del modal Eliminar -->
</template>

<script>
    export default {
        props: ['name'],

        name: "ModalEstado",

        data () {
            return {
                id: '',
                nombre: '',
                descripcion: '',
                estado: '',
            }
        },

        methods: {
            hide() {
                let modal = $('#' + this.name + 'Modal');
                modal.modal('hide');
            },
            show(categoria  = null) {
                this.asignarDatos(categoria);
                let modal = $('#' + this.name + 'Modal');
                modal.modal('show');
            },
            GuardarCategoria() {

                let formData = new FormData();
                let estado = this.estado.toString() === '1' ? '0' : '1' ;
                formData.append("id", this.id);
                formData.append("estado", estado);

                axios.post('/articulos/ajax_update_state', formData).then((response) => {
                    let mensaje = response.data.message;
                    this.$toast.success({
                        title: 'Éxito',
                        message: mensaje,
                    });
                    this.$emit('listarArticulo');
                }).catch((error) => {
                    console.log(error);
                    let mensaje = error.data.message;
                    this.$toast.error({
                        title: 'Error',
                        message: mensaje,
                    });
                }).finally(() => {
                    this.hide();
                });
            },
            asignarDatos(value) {
                if(value == null){
                    this.id = '';
                    this.nombre = '';
                    this.descripcion = '';
                    this.estado = '';
                }else{
                    this.id = value.id;
                    this.nombre = value.nombre;
                    this.descripcion = value.descripcion;
                    this.estado = value.estado;
                }
            }
        },
        watch: {

        }
    }
</script>

<style scoped>

</style>
