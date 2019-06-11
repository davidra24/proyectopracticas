<template>
  <div class="row">
    <div class="col-10 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <h4 v-else>{{info.namestudent}}</h4>
    </div>
    <div class="col-2">
      <br>
      <button type="button" class="btn btn-outline-danger" @click="del()">
        <font-awesome-icon icon="trash"/>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["info"],
  data() {
    return {
      loading: false,
      error: null
    };
  },
  methods: {
    async remove() {
      this.loading = true;
      await fetch(
        `/api/managePractices/${this.info.id_practice}/${this.info.id_student}`,
        {
          method: "DELETE",
          headers: { "Content-Type": "application/json" }
        }
      ).then(res => {
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
    },
    get() {
      this.$emit("update", null);
    }
  },
  mounted() {}
};
</script>
