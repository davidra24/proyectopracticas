<template>
  <div class="container">
    <EstudianteForm @update="update"></EstudianteForm>
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <Loading/>
    </div>
    <div class="d-flex justify-content-center" v-else-if="this.error">
      <h2>Ha ocurrido un error {{this.error.message}}</h2>
    </div>
    <div v-else v-for="estudiante in data" v-bind:key="estudiante.id">
      <EstudianteInfo :key="estudiante.id" :info="estudiante" @update="update"></EstudianteInfo>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      data: [],
      error: null
    };
  },
  methods: {
    async getStudents() {
      await fetch("/api/students")
        .then(res => res.json())
        .then(res => {
          this.data = res;
          this.loading = false;
        })
        .catch(error => {
          this.error = error;
          this.loading = false;
        });
    },
    update() {
      this.loading = true;
      this.getStudents();
    }
  },
  mounted() {
    this.getStudents();
  }
};
</script>
