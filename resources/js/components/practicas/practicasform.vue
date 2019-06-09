<template>
  <form action class="form-group" @submit.prevent="save()">
    <br>
    <div class="row">
      <div class="col-12 col-md-8">
        <input class="form-control" placeholder="codigo" type="text" v-model="form.lugar">
      </div>
      <div class="col-12 col-md-4">
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
