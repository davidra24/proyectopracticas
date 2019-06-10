<template>
  <form action class="form-group" @submit.prevent="postPractices()">
    <br>
    <div class="d-flex justify-content-center" v-if="this.loading">
      <MiniLoading/>
    </div>
    <div v-else class="row d-flex justify-content-center">
      <div class="col-12 col-md-4">
        <label for="lugar">Lugar:</label>
        <input class="form-control" id="lugar" type="text" v-model="form.place">
      </div>
      <div class="col-12 col-md-4">
        <label for="lugar">Fecha:</label>
        <datepicker input-class="form-control bg-white" v-model="form.date_practice" name="date"/>
      </div>
      <div class="col-12 col-md-4">
        <label for="lugar">Docente:</label>
        <select class="form-control" placeholder="Docente" type="text" v-model="form.id_teacher">
          <option
            v-for="teacher in teachers"
            :value="teacher.id"
            :key="teacher.id"
          >{{ teacher.name }}</option>
        </select>
      </div>
      <div class="col-12 col-md-4 top-buffer">
        <label for="lugar">Bus:</label>
        <select class="form-control" placeholder="Bus" type="text" v-model="form.id_bus">
          <option v-for="bus in busses" :value="bus.id" :key="bus.id">{{ bus.type }}</option>
        </select>
      </div>
      <div class="col-12 col-md-4 top-buffer-btn">
        <button type="submit" class="form-control btn btn-success">Guardar</button>
      </div>
    </div>
  </form>
</template>


<script>
export default {
  name: "estudianteform",
  props: ["teachers", "busses"],
  data() {
    return {
      form: {
        place: "",
        date_practice: "",
        id_teacher: "",
        id_bus: ""
      },
      loading: false
    };
  },
  methods: {
    get() {
      this.$emit("update", null);
    },
    clear() {
      this.form.place = "";
      this.form.date_practice = "";
      this.form.id_teacher = "";
      this.form.id_bus = "";
    },
    async postPractices() {
      this.loading = true;
      await fetch("/api/practices", {
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
