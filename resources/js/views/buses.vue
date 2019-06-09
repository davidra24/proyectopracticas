<template>
  <div class="container">
    <BusForm :form="form"></BusForm>
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <Loading/>
    </div>
    <div class="d-flex justify-content-center" v-else-if="this.error">
      <h2>Ha ocurrido un error {{this.error.message}}</h2>
    </div>
    <div v-else v-for="bus in data" v-bind:key="bus">
      <BusInfo :key="bus.id" :info="bus"></BusInfo>
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
    getBuses() {
      fetch("/api/busses")
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
    save() {}
  },
  mounted() {
    this.getBuses();
  }
};
</script>
