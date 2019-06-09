<template>
  <div class="row">
    <div class="col-12 col-md-3 p-3 mb-2 bg-info text-white">
      <input v-if="editMode" class="form-control" placeholder="conductor" v-model="info.conductor">
      <p v-else>{{info.conductor}}</p>
    </div>
    <div class="col-12 col-md-3 p-3 mb-2 bg-info text-white">
      <input
        v-if="editMode"
        class="form-control"
        placeholder="conductor"
        v-model="info.number_passagers"
      >
      <p v-else>{{info.number_passagers}}</p>
    </div>
    <div class="col-12 col-md-3 p-3 mb-2 bg-info text-white">
      <input v-if="editMode" class="form-control" placeholder="conductor" v-model="info.type">
      <p v-else>{{info.type}}</p>
    </div>
    <div class="col-6 col-md-1">
      <br>
      <button v-if="editMode" type="button" class="btn btn-outline-dark" @click="check()">
        <font-awesome-icon icon="check"/>
      </button>
      <button v-else type="button" class="btn btn-outline-dark" @click="edit()">
        <font-awesome-icon icon="edit"/>
      </button>
    </div>
    <div class="col-6 col-md-1">
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
      this.$swal({
        position: "top-end",
        title: "Actualizado!",
        text: "Su dato ha sido actualizado satisfactoriamente",
        type: "success",
        showConfirmButton: false,
        timer: 1500
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
          this.$swal({
            position: "top-end",
            title: "Eliminado!",
            text: "Su dato ha sido eliminado satisfactoriamente",
            type: "success",
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
