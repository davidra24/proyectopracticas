<template>
  <div class="row">
    <div class="col-12 col-md-8 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <input
        v-else-if="editMode"
        class="form-control"
        placeholder="Nombre"
        v-model="info.name"
        type
      >
      <p v-else>{{this.form.name}}</p>
    </div>
    <div class="col-6 col-md-2">
      <br>
      <button v-if="editMode" type="button" class="btn btn-outline-dark" @click="updateBuses()">
        <font-awesome-icon icon="check"/>
      </button>
      <button v-else type="button" class="btn btn-outline-dark" @click="edit()">
        <font-awesome-icon icon="edit"/>
      </button>
    </div>
    <div class="col-6 col-md-2">
      <br>
      <button type="button" class="btn btn-outline-danger" @click="del()">
        <font-awesome-icon icon="trash"/>
      </button>
    </div>
  </div>
</template>


<script>
export default {
  name: "docenteinfo",
  props: ["info"],
  data() {
    return {
      id: this.info.id,
      form: {
        name: this.info.name
      },
      editMode: false,
      loading: false,
      error: null
    };
  },
  methods: {
    edit() {
      this.editMode = true;
    },
    async updateBuses() {
      this.loading = true;
      await fetch(`/api/students/${this.id}`, {
        method: "PUT",
        body: JSON.stringify(this.info),
        headers: {
          "Content-Type": "application/json"
        }
      }).then(response => {
        if (response.status === 200) {
          this.loading = false;
          this.get();
          this.$swal({
            position: "top-end",
            title: "Actualizado!",
            text: "Su dato ha sido actualizado satisfactoriamente",
            type: "success",
            showConfirmButton: false,
            timer: 1500
          });
          this.check();
        } else {
          this.loading = false;
          this.$swal({
            position: "top-end",
            title: "Error!",
            text: `No se ha podido actualizar sus datos, codigo de error: ${
              response.status
            }`,
            type: "error",
            showConfirmButton: false,
            timer: 1500
          });
        }
      });
    },
    check() {
      this.editMode = false;
      this.$swal({
        position: "top-end",
        title: "Actualizado!",
        text: "Su dato ha sido actualizado satisfactoriamente",
        type: "success",
        showConfirmButton: false,
        timer: 1500
      });
    },
    get() {
      this.$emit("update", null);
    },
    async remove() {
      this.loading = true;
      await fetch(`/api/students/${this.id}`, {
        method: "DELETE",
        headers: { "Content-Type": "application/json" }
      }).then(res => {
        if (res.status === 200) {
          this.get();
          this.$swal({
            position: "top-end",
            type: "success",
            title: "Se ha eliminado el dato satsfactoriamente",
            showConfirmButton: false,
            timer: 1500
          });
        } else {
          this.loading = false;
          this.$swal({
            type: "error",
            position: "top-end",
            title: "Oops...",
            text: "No se ha podido eliminar el dato seleccionado",
            showConfirmButton: false,
            timer: 1500
          });
        }
      });
    },
    del() {
      this.$swal({
        title: "¿Está seguro?",
        text: "¿Está seguro que desea elimiar este elemento?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí",
        cancelButtonText: "No"
      }).then(result => {
        if (result.value) {
          this.remove();
        }
      });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
 