<template>
  <div class="list-container">
    <ul v-for="star in ListStars" :key="star.id">
      <li
        @click="selectStar(star.id)"
        :class="DemandeInfo.id == star.id ? 'list-style' : ''"
      >
        {{ star.firstname }} {{ star.lastname }}
      </li>
    </ul>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "list-stars-component",
  props: ["ListStars", "DemandeInfo"],
  data() {
    return {
      listStars: [],
    };
  },
  methods: {
    selectStar(id) {
      Axios.get("api/stars/" + id)
        .then((response) => {
          this.$emit("changementStar", response.data.data);
        })
        .catch((error) => {
          console.log("error = ", error);
        });
    },
  },
};
</script>