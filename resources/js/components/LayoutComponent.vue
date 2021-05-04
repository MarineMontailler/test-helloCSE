<template>
  <div>
    <h1>Book de stars</h1>
    <card-component></card-component>
  </div>
</template>

<script>
import CardComponent from "./CardComponent.vue";
export default {
  components: { "card-component": CardComponent },
  mounted() {},
};
</script>