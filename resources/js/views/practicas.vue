<template>
  <div class="container">
    <form action class="form-group" @submit.prevent="save()">
      <br>
      <div class="row">
        <div class="col-12 col-md-4">
          <input class="form-control" placeholder="codigo" type="number" v-model="form.id">
        </div>
        <div class="col-12 col-md-4">
          <input class="form-control" placeholder="lugar" type="text" v-model="form.lugar">
        </div>
        <div class="col-12 col-md-4">
          <button type="submit" class="form-control btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
    <br>
    <div class="col-12">
      <div v-for="practica in data">
        <div v-bind:id="practica.id" class="p-3 mb-2 bg-info text-white">{{practica.lugar}}</div>
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
          lugar: "Cali"
        },
        {
          id: 2,
          lugar: "Medellin"
        },
        {
          id: 3,
          lugar: "Bogotá"
        }
      ],
      form: { id: "", lugar: "" },
      error: null
    };
  },
  methods: {
    save() {
      alert(this.form.id + this.form.lugar);
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
