<template>
  <div class="container">
    <div class="d-flex justify-content-center" v-if="this.loading">
      <Loading/>
    </div>
    <div v-else v-for="managePractices in practices" v-bind:key="managePractices.id_student">
      <Reporte :key="managePractices.id_student" :info="managePractices" @update="update"/>
      <br>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      practices: [],
      error: null,
      loading: true,
      id: window.location.href
        .toString()
        .charAt(window.location.href.toString().length - 1)
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
    },
    async getPractices() {
      await fetch("/api/practices")
        .then(res => res.json())
        .then(res => {
          this.practices = res;
          this.loading = false;
        })
        .catch(error => {
          this.error = error;
          this.loading = false;
        });
    },
    update() {
      this.loading = true;
      this.getManagePractices();
    }
  },
  mounted() {
    this.getPractices();
  }
};
</script>
