<template>
  <div class="container text-center">
    <div class="row justify-content-center my-auto">
      <div class="col-12">
        <form action class="form-group" v-on:submit.prevent="login()">
          <div class="row">
            <div class="col-12 col-lg-6">
              <label>Usuario:</label>
              <input type="text" class="form-control" v-model="data.user">
            </div>
            <div class="col-12 col-lg-6">
              <label>Contraseña:</label>
              <input type="password" class="form-control" v-model="data.password">
              <br>
            </div>
            <div class="col-12">
              <button class="btn btn-block btn-success">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      data: { user: null, password: null },
      error: null
    };
  },
  methods: {
    login() {
      window.location = "/admin";
      //window.location.href = "/admin";
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
