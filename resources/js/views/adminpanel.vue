<template>
  <div class="row">
    <div class="col-12">
      <h1>Hola, bienvenido al sistema de gestión de prácticas de la UPTC, a continuación podrás realizar la gestión de todas las prácticas de la universidad, gestionar los alumnos que asisten a las mismas, los docentes que los acompañan en éstas, así como las fechas y los lugares que se visitarán y por último los buses que se contratan para la mismas, esperámos que disfrutes de tu experiencia.</h1>
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
