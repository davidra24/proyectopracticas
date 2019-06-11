<template>
  <div class="row">
    <div class="col-12 col-md-3 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <input
        v-else-if="editMode"
        class="form-control"
        placeholder="Nombre"
        v-model="info.place"
        type
      >
      <p v-else>{{this.form.place}}</p>
    </div>
    <div class="col-12 col-md-2 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <datepicker
        v-else-if="editMode"
        input-class="form-control bg-white"
        calendar-class="text-dark"
        v-model="info.date_practice"
        name="date"
      />
      <p v-else>{{this.form.date_practice}}</p>
    </div>
    <div class="col-12 col-md-2 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>
      <select v-else-if="editMode" class="form-control" type="text" v-model="info.id_teacher">
        <option v-for="teacher in teachers" :value="teacher.id" :key="teacher.id">{{ teacher.name }}</option>
      </select>
      <p v-else>{{this.form.name}}</p>
    </div>
    <div class="col-12 col-md-2 p-3 mb-2 bg-info text-white">
      <div class="d-flex justify-content-center" v-if="this.loading">
        <MiniLoading/>
      </div>

      <select v-else-if="editMode" class="form-control" type="text" v-model="info.id_bus">
        <option v-for="bus in busses" :value="bus.id" :key="bus.id">{{ bus.type }}</option>
      </select>
      <p v-else>{{this.form.type}}</p>
    </div>
    <div class="col-4 col-md-1">
      <br>
      <button v-if="editMode" type="button" class="btn btn-outline-dark" @click="updateBuses()">
        <font-awesome-icon icon="check"/>
      </button>
      <button v-else type="button" class="btn btn-outline-dark" @click="edit()">
        <font-awesome-icon icon="edit"/>
      </button>
    </div>
    <div class="col-4 col-md-1">
      <br>
      <button type="button" class="btn btn-outline-info" @click="redirect()">
        <font-awesome-icon icon="database"/>
      </button>
    </div>
    <div class="col-4 col-md-1">
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
  props: ["info", "teachers", "busses"],
  data() {
    return {
      id: this.info.id,
      form: {
        place: this.info.place,
        date_practice: this.info.date_practice,
        name: this.info.name,
        type: this.info.type,
        id_teacher: this.info.id_teacher,
        id_bus: this.info.id_bus
      },
      editMode: false,
      loading: false,
      error: null
    };
  },
  methods: {
    redirect() {
      window.location = `/admin/practicas/${this.id}`;
    },
    edit() {
      this.editMode = true;
    },
    async updateBuses() {
      this.loading = true;
      await fetch(`/api/practices/${this.id}`, {
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
      await fetch(`/api/practices/${this.id}`, {
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
 