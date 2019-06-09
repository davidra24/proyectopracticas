<template>
  <div class="container">
    <DocenteForm :form="form"></DocenteForm>
    <br>
    <div v-for="docente in data" v-bind:key="docente">
      <DocenteInfo :key="docente.id" :info="docente"></DocenteInfo>
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
