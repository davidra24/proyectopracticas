<template>
  <form action class="form-group" @submit.prevent="save()">
    <br>
    <div class="row">
      <div class="col-12 col-md-3">
        <input class="form-control" placeholder="conductor" type="number" v-model="form.conductor">
      </div>
      <div class="col-12 col-md-3">
        <input
          class="form-control"
          placeholder="numero de pasajeros"
          type="text"
          v-model="form.pasajeros"
        >
      </div>
      <div class="col-12 col-md-3">
        <input class="form-control" placeholder="nombre" type="text" v-model="form.tipo">
      </div>
      <div class="col-12 col-md-3">
        <button type="submit" class="form-control btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</template>


<script>
export default {
  name: "docenteform",
  props: ["form"],
  data() {
    return {
      editMode: false,
      loading: false,
      error: null
    };
  },
  methods: {
    edit() {
      this.editMode = true;
    },
    check() {
      this.editMode = false;
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
