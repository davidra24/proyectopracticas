<template>
  <div class="row">
    <div class="col-12">
      <h1>Hola, bienvenido al sistema de gestión de prácticas de la UPTC, a continuación podrás realizar la consulta de todas las prácticas de la universidad, esperámos que disfrutes de tu experiencia.</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      data: null,
      error: null
    };
  },
  methods: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
