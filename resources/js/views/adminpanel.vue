<template>
  <h1>Hola mundo</h1>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
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
