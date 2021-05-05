<template>
  <div>
    <div class="card-container">
      <div class="photo-container">
        <img :src="DemandeInfo.image" :alt="'photo ' + DemandeInfo.firstname" />
      </div>
      <h2 class="card-title">
        {{ DemandeInfo.firstname }} {{ DemandeInfo.lastname }}
      </h2>
      <p>
        {{ DemandeInfo.description }}
      </p>
      <div class="button-container">
        <button>Modifier</button>
        <button>Supprimer</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "card-component",
  props: ["ListStars", "DemandeInfo"],
  data() {
    return {
      listStars: [],
    };
  },
  created() {},
};
</script>
