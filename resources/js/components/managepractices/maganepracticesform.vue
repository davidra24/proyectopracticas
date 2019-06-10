<template>
  <form action class="form-group" @submit.prevent="postManagePractice()">
    <br>
    <div class="d-flex justify-content-center" v-if="this.load">
      <MiniLoading/>
    </div>
    <div v-else class="row">
      <div class="col-12 col-md-8">
        <label for="lugar">Estudiante:</label>
        <select class="form-control" placeholder="Docente" type="text" v-model="form.id">
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
  props: ["students", "load"],
  data() {
    return {
      form: {
        id: this.students.id,
        name: this.students.name
      },
      data: [],
      error: null
    };
  },
  mounted() {}
};
</script>
