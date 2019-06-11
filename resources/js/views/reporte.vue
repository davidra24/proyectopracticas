<template>
  <div class="row">
    <div class="col-12 card text-center">
      <div class="card-header">
        <strong>{{info.place}}</strong>
        <br>
        {{info.date_practice}}
      </div>
      <div class="card-body">
        <h5 class="card-title">
          <strong>Docente:</strong>
          {{info.name}}
        </h5>
        <p class="card-text">
          <strong>Vehículo:</strong>
          {{info.type}}
          <br>
          <strong>Conductor:</strong>
          {{info.conductor}}
        </p>
        <a :href="'/user/reportes/'+info.id" class="btn btn-primary">Ver estudiantes</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["info"],
  methods: {},
  mounted() {}
};
</script>
