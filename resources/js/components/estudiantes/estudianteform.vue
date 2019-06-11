<template>
  <form action class="form-group" @submit.prevent="postStudents()">
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <MiniLoading/>
    </div>
    <div v-else class="row">
      <div class="col-12 col-md-4">
        <input class="form-control" placeholder="codigo" type="number" v-model="form.id">
      </div>
      <div class="col-12 col-md-4">
        <input class="form-control" placeholder="nombre" type="text" v-model="form.name">
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

  data() {
    return {
      form: {
        id: "",
        name: ""
      },
      loading: false
    };
  },
  methods: {
    get() {
      this.$emit("update", null);
    },
    clear() {
      this.form.id = "";
      this.form.name = "";
    },
    async postStudents() {
      this.loading = true;
      await fetch("/api/students", {
        method: "POST",
        body: JSON.stringify(this.form),
        headers: {
          "Content-Type": "application/json"
        }
      }).then(response => {
        if (response.status === 200) {
          this.loading = false;
          this.clear();
          this.get();
          this.$swal({
            position: "top-end",
            title: "Guardado!",
            text: "Su dato ha sido guardado satisfactoriamente",
            type: "success",
            showConfirmButton: false,
            timer: 1500
          });
        } else {
          this.loading = false;
          this.$swal({
            position: "top-end",
            title: "Error!",
            text: `No se ha podido guardar sus datos, codigo de error: ${
              response.status
            }`,
            type: "error",
            showConfirmButton: false,
            timer: 1500
          });
        }
      });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
