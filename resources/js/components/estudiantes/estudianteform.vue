<template>
  <form action class="form-group" @submit.prevent="save()">
    <br>
    <div class="row">
      <div class="col-12 col-md-8">
        <input class="form-control" placeholder="nombre" type="text" v-model="form.nombre">
      </div>
      <div class="col-12 col-md-4">
        <button type="submit" class="form-control btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</template>


<script>
export default {
  name: "estudianteform",
  props: ["form"],
  data() {
    return {
      editMode: false,
      loading: false,
      error: null
    };
  },
  methods: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
