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
    <ManagePracticesForm
      @handleLoad="this.handleLoad"
      @update="this.update"
      :id="this.id"
      :load="this.load"
      :students="this.students"
    />
    <div class="col-12 d-flex justify-content-center" v-if="loader">
      <Loading/>
    </div>
    <div v-else v-for="managePractices in practices" v-bind:key="managePractices.id_student">
      <ManagePracticesInfo
        :key="managePractices.id_student"
        :info="managePractices"
        @update="update"
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      students: [],
      practices: [],
      load: true,
      error: null,
      loader: true,
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
    },
    async getManagePractices() {
      await fetch(`/api/managePractices/${this.id}`)
        .then(res => res.json())
        .then(res => {
          this.practices = res;
          this.loader = false;
        })
        .catch(error => {
          this.error = error;
          this.loader = false;
        });
    },
    update() {
      this.loader = true;
      this.getManagePractices();
    },
    handleLoad() {
      this.load = !this.load;
    }
  },
  mounted() {
    this.getManagePractices();
    this.getPractice();
    this.getStudents();
  }
};
</script>
