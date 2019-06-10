<template>
  <div class="container">
    <div class="d-flex justify-content-center" v-if="this.loadingTeachers&&this.loadingBusses">
      <MiniLoading/>
    </div>
    <PracticaForm v-else :teachers="this.teachers" :busses="this.busses" @update="update"></PracticaForm>
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <Loading/>
    </div>
    <div class="d-flex justify-content-center" v-else-if="this.error">
      <h2>Ha ocurrido un error {{this.error.message}}</h2>
    </div>
    <div v-else v-for="practica in data" v-bind:key="practica.id">
      <PracticaInfo
        :teachers="teachers"
        :busses="busses"
        :key="practica.id"
        :info="practica"
        @update="update"
      ></PracticaInfo>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      data: [],
      error: null,
      teachers: [],
      busses: [],
      loadingBusses: true,
      loadingTeachers: true
    };
  },
  methods: {
    async getPractices() {
      await fetch("/api/practices")
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
      this.getPractices();
    },
    async getBuses() {
      await fetch("/api/busses")
        .then(res => res.json())
        .then(res => {
          this.busses = res;
          this.loadingBusses = false;
        })
        .catch(error => {
          this.error = error;
          this.loadingBusses = false;
        });
    },
    async getTeachers() {
      await fetch("/api/teachers")
        .then(res => res.json())
        .then(res => {
          this.teachers = res;
          this.loadingTeachers = false;
        })
        .catch(error => {
          this.error = error;
          this.loadingTeachers = false;
        });
    }
  },
  mounted() {
    this.getTeachers();
    this.getBuses();
    this.getPractices();
  }
};
</script>
