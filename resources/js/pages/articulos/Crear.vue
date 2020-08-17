<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Almacén</li>
            <li class="breadcrumb-item active">Crear artículos</li>
        </ol>
        <formulario :detalle="detalle"></formulario>
    </main>
</template>

<script>
import Formulario from "./Formulario";
import detalle from "./data/detalle";

export default {
    name: "crear",
    data () {
      return {
          loading: true,
          detalle: detalle(),
      }
    },
    components: {
        Formulario,
    }
}
</script>

<style scoped>

</style>
