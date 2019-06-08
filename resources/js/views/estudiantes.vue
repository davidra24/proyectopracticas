<template>
  <div class="container">
    <form action class="form-group" @submit.prevent="save()">
      <br>
      <div class="row">
        <div class="col-12 col-md-4">
          <input class="form-control" placeholder="codigo" type="number" v-model="form.id">
        </div>
        <div class="col-12 col-md-4">
          <input class="form-control" placeholder="nombre" type="text" v-model="form.nombre">
        </div>
        <div class="col-12 col-md-4">
          <button type="submit" class="form-control btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
    <br>
    <div class="col-12">
      <div v-for="estudiante in data">
        <div v-bind:id="estudiante.id" class="p-3 mb-2 bg-info text-white">{{estudiante.nombre}}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      data: [
        {
          id: 1,
          nombre: "Juan"
        },
        {
          id: 2,
          nombre: "Andrea"
        },
        {
          id: 3,
          nombre: "Laura"
        },
        {
          id: 4,
          nombre: "Pedro"
        }
      ],
      form: { id: "", nombre: "" },
      error: null
    };
  },
  methods: {
    save() {
      alert(this.form.id + this.form.nombre);
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
