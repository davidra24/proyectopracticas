<template>
  <div class="container">
    <BusForm :form="form" @update="update"></BusForm>
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading" :inserted="this.inserted()">
      <Loading/>
    </div>
    <div class="d-flex justify-content-center" v-else-if="this.error">
      <h2>Ha ocurrido un error {{this.error.message}}</h2>
    </div>
    <div v-else v-for="bus in data" v-bind:key="bus.id">
      <BusInfo :key="bus.id" :info="bus" @update="update"></BusInfo>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      data: [],
      form: { id: "", nombre: "" },
      error: null
    };
  },
  methods: {
    async getBuses() {
      this.loading = true;
      await fetch("/api/busses")
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
      this.getBuses();
    },
    inserted() {
      this.loading = true;
      this.getBuses();
    }
  },
  mounted() {
    this.getBuses();
  }
};
</script>
