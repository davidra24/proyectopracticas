<template>
  <h1>Hola desde {{this.data}}</h1>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      error: null,
      loading: false,
      id: window.location.href
        .toString()
        .charAt(window.location.href.toString().length - 1)
    };
  },
  methods: {
    async getPractice() {
      await fetch(`/api/practices/${this.id}`)
        .then(res => res.json())
        .then(res => {
          this.data = res;
          this.loading = false;
        })
        .catch(error => {
          this.error = error;
          this.loading = false;
        });
    }
  },
  mounted() {
    this.getPractice();
  }
};
</script>
