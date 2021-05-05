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
        <button @click="deleteStar(DemandeInfo.id)">Supprimer</button>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "card-component",
  props: ["ListStars", "DemandeInfo"],
  data() {
    return {
      listStars: [],
    };
  },
  created() {},
  methods: {
    deleteStar(id) {
      Axios.delete("/api/stars/delete/" + id)
        .then((response) => {
          console.log("Star supprimée");
        })
        .then(() => {
          this.$emit("reload");
        })
        .catch((error) => {
          console.log("error = ", error);
        });
    },
  },
};
</script>
