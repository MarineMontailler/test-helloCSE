<template>
  <div>
    <h1>TEST LARAVEL</h1>
    <p></p>
    <div class="global-container">
      <list-stars-component
        :ListStars="listStars"
        :DemandeInfo="selectedStar"
        @changementStar="selectedStar = $event"
      ></list-stars-component>
      <card-component
        :ListStars="listStars"
        :DemandeInfo="selectedStar"
      ></card-component>
    </div>
    <div style="display: flex; justify-content: center; margin-top: 20px">
      <button @click="addForm">
        {{ displayForm ? "Annuler" : "Ajouter" }}
      </button>
    </div>
    <div v-if="displayForm">
      <creation-card-component @reload="reload"></creation-card-component>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import CardComponent from "./CardComponent.vue";
import ListStarsComponent from "./ListStarsComponent.vue";
import CreationCardComponent from "./CreationCardComponent.vue";
export default {
  components: {
    "card-component": CardComponent,
    "list-stars-component": ListStarsComponent,
    "creation-card-component": CreationCardComponent,
  },
  data() {
    return {
      displayForm: false,
      listStars: [],
      newStar: {},
      selectedStar: {},
    };
  },
  created() {
    this.fetchStars();
  },
  methods: {
    fetchStars() {
      Axios.get("/api/stars")
        .then((response) => {
          console.log("response ", response.data.data);
          this.listStars = response.data.data;
          this.selectedStar = response.data.data[0];
        })
        .catch((error) => {
          console.log("error = ", error);
        });
    },
    addForm() {
      this.displayForm = !this.displayForm;
    },
    reload() {
      window.location.href = "./";
    },
  },
};
</script>