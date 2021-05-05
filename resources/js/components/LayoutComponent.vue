<template>
  <div>
    <h1>HelloCSE</h1>
    <br />
    <div class="global-container">
      <list-stars-component
        :ListStars="listStars"
        :DemandeInfo="selectedStar"
        @changementStar="selectedStar = $event"
      ></list-stars-component>
      <card-component
        :ListStars="listStars"
        :DemandeInfo="selectedStar"
        :DisplayCreateForm="displayCreateForm"
        :DisplayUpdateForm="displayUpdateForm"
        @reload="reload"
        @addCreateForm="addCreateForm"
        @addUpdateForm="addUpdateForm"
      ></card-component>
    </div>
    <div v-if="displayCreateForm">
      <creation-card-component @reload="reload"></creation-card-component>
    </div>
    <div v-if="displayUpdateForm">
      <update-card-component
        :DemandeInfo="selectedStar"
        @reload="reload"
      ></update-card-component>
    </div>
    <footer>
      <img src="/images/clap.png" alt="clap" width="25" />
      <p>Marine Montailler for HelloCSE</p>
    </footer>
  </div>
</template>

<script>
import Axios from "axios";
import CardComponent from "./CardComponent.vue";
import ListStarsComponent from "./ListStarsComponent.vue";
import CreationCardComponent from "./CreationCardComponent.vue";
import UpdateCardComponent from "./UpdateCardComponent.vue";

export default {
  components: {
    "card-component": CardComponent,
    "list-stars-component": ListStarsComponent,
    "creation-card-component": CreationCardComponent,
    "update-card-component": UpdateCardComponent,
  },
  data() {
    return {
      displayCreateForm: false,
      displayUpdateForm: false,
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
    addCreateForm() {
      this.displayUpdateForm = false;
      this.displayCreateForm = !this.displayCreateForm;
    },
    addUpdateForm() {
      this.displayCreateForm = false;
      this.displayUpdateForm = !this.displayUpdateForm;
    },
    reload() {
      window.location.href = "./";
    },
  },
};
</script>