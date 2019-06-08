<template>
  <div class="row">
    <div class="col-12">
      <h1>Hola mundo buses</h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      data: null,
      error: null
    };
  },
  methods: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
