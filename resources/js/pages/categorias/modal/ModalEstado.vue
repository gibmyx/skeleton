<template>
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" :id="name+'Modal'" tabindex="-1" role="dialog" :aria-labelledby="name+'ModalLabel'"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog" :class="detalle.estado === 'activo' ? 'modal-danger' : 'modal-info' " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 v-if="detalle.estado === 'activo'" class="modal-title">Eliminar categoria</h4>
                    <h4 v-else class="modal-title">activar categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p v-if="detalle.estado === 'activo'">Estas seguro de eliminar la categoria?</p>
                    <p v-else>Estas seguro de activar la categoria?</p>
                    <p>Nombre: <strong>{{ detalle.nombre }}</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn" :class="detalle.estado === 'activo' ? 'btn-danger' : 'btn-info' "
                            v-text="detalle.estado === 'activo'  ? 'Eliminar' : 'Activar'"
                            @click.prevent="Guardar"></button>
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

    data() {
        return {
            detalle: []
        }
    },

    methods: {
        hide() {
            let modal = $('#' + this.name + 'Modal');
            modal.modal('hide');
        },
        show(detalle = null) {
            this.asignarDatos(detalle);
            let modal = $('#' + this.name + 'Modal');
            modal.modal('show');
        },
        Guardar() {
            let estado = this.detalle.estado.toString() === 'activo' ? 'inactivo' : 'activo';
            axios.post('/api/categorias/ajax_guardar/' + this.detalle.uuid, {
                params: {
                    id: this.detalle.id,
                    estado: estado
                }
            }).then((response) => {
                let mensaje = response.data.message;
                this.$toast.success({
                    title: 'Éxito',
                    message: mensaje,
                });
                this.$emit('Listar');
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
        asignarDatos(detalle) {
            this.detalle = detalle;
        }
    },
    watch: {}
}
</script>

<style scoped>

</style>
