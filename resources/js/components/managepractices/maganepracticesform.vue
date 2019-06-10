<template>
  <form action class="form-group" @submit.prevent="postManagePractice()">
    <br>
    <div class="d-flex justify-content-center" v-if="this.load">
      <MiniLoading/>
    </div>
    <div v-else class="row">
      <div class="col-12 col-md-8">
        <label for="lugar">Estudiante:</label>
        <select class="form-control" placeholder="Docente" type="text" v-model="form.id_student">
          <option
            v-for="student in students"
            :value="student.id"
            :key="student.id"
          >{{ student.name }}</option>
        </select>
      </div>
      <div class="col-12 col-md-4 top-buffer-btn">
        <button type="submit" class="form-control btn btn-success">Agregar</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  props: ["students", "load", "id"],
  data() {
    return {
      form: {
        id_student: "",
        id_practice: this.id
      },
      data: [],
      error: null
    };
  },
  methods: {
    async postManagePractice() {
      this.handleLoad();
      await fetch("/api/managePractices", {
        method: "POST",
        body: JSON.stringify(this.form),
        headers: {
          "Content-Type": "application/json"
        }
      }).then(response => {
        if (response.status === 200) {
          this.handleLoad();
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
          this.handleLoad();
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
    },
    clear() {
      this.form.id_student = "";
    },
    handleLoad() {
      this.$emit("handleLoad", null);
    },
    get() {
      this.$emit("update", null);
    }
  },
  mounted() {}
};
</script>
