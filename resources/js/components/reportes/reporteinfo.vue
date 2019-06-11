<template>
  <div class="container">
    <h1>Los siguientes estudiantes asistirán a la práctica</h1>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <Loading/>
    </div>
    <div v-else v-for="practica in data" v-bind:key="practica.id">
      <div class="alert alert-info row" role="alert">
        <div class="col-12">
          <strong>Codigo:</strong>
          {{ practica.id_student}}
          <br>
          <strong>Nombre:</strong>
          {{ practica.namestudent}}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: window.location.href
        .toString()
        .charAt(window.location.href.toString().length - 1),
      loading: true,
      data: [],
      error: null
    };
  },
  methods: {
    async getManagePractices() {
      await fetch(`/api/managePractices/${this.id}`)
        .then(res => res.json())
        .then(res => {
          this.data = res;
          this.loading = false;
        })
        .catch(error => {
          this.error = error;
          this.loading = false;
        });
    }
  },
  mounted() {
    this.getManagePractices();
  }
};
</script>
