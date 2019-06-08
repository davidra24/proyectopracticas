<template>
  <div class="row">
    <div class="col-12 col-md-8 p-3 mb-2 bg-info text-white" v-bind:id="info.id">
      <input v-if="editMode" class="form-control" placeholder="nombre" v-model="info.nombre">
      <p v-else>{{info.nombre}}</p>
    </div>
    <div class="col-6 col-md-2">
      <button v-if="editMode" type="button" class="btn btn-outline-dark" @click="check()">
        <font-awesome-icon icon="check-circle"/>
      </button>
      <button v-else type="button" class="btn btn-outline-dark" @click="edit()">
        <font-awesome-icon icon="edit"/>
      </button>
    </div>
    <div class="col-6 col-md-2">
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
          this.$swal(
            "Eliminado!",
            "Su dato ha sido eliminado satisfactoriamente",
            "success"
          );
        }
      });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
