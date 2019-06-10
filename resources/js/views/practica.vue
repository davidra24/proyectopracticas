<template>
  <div class="container">
    <div class="row alert alert-info" role="alert">
      <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <div v-else class="col-12 col-md-6 col-lg-4">
        <Strong>Lugar: {{this.data.place}}</Strong>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <div v-else class="col-12 col-md-6 col-lg-4">
        <Strong>Fecha: {{this.data.date_practice}}</Strong>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <div v-else class="col-12 col-md-6 col-lg-4">
        <Strong>Docente: {{this.data.name}}</Strong>
      </div>
    </div>
    <ManagePracticesForm :load="this.load" :students="this.students"/>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      students: [],
      load: true,
      error: null,
      loading: true,
      id: window.location.href
        .toString()
        .charAt(window.location.href.toString().length - 1)
    };
  },
  methods: {
    async getPractice() {
      await fetch(`/api/practices/${this.id}`)
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
    async getStudents() {
      await fetch("/api/students")
        .then(res => res.json())
        .then(res => {
          this.students = res;
          this.load = false;
        })
        .catch(error => {
          this.error = error;
          this.load = false;
        });
    }
  },
  mounted() {
    this.getPractice();
    this.getStudents();
  }
};
</script>
