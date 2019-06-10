<template>
  <form action class="form-group" @submit.prevent="postBusses()">
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <MiniLoading/>
    </div>
    <div v-else class="row">
      <div class="col-12 col-md-3">
        <input class="form-control" placeholder="conductor" type="text" v-model="form.conductor">
      </div>
      <div class="col-12 col-md-3">
        <input
          class="form-control"
          placeholder="numero de pasajeros"
          type="number"
          v-model="form.number_passagers"
        >
      </div>
      <div class="col-12 col-md-3">
        <input class="form-control" placeholder="tipo" type="text" v-model="form.type">
      </div>
      <div class="col-12 col-md-3">
        <button type="submit" class="form-control btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</template>


<script>
export default {
  name: "busform",
  data() {
    return {
      form: {
        conductor: "",
        number_passagers: "",
        type: ""
      },
      editMode: false,
      loading: false
    };
  },
  methods: {
    get() {
      this.$emit("update", null);
    },
    clear() {
      this.form.conductor = "";
      this.form.number_passagers = "";
      this.form.type = "";
    },
    async postBusses() {
      this.loading = true;
      await fetch("/api/busses", {
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
