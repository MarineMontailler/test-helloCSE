<template>
  <div>
    <h1>HelloCSE</h1>
    <br />
    <div class="global-container">
      <!-- This is the star list (on the left) -->
      <list-stars-component
        :ListStars="listStars"
        :DemandeInfo="selectedStar"
        @changementStar="selectedStar = $event"
      ></list-stars-component>

      <!-- This is the card with star's information (on the middle) -->
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

    <!-- This is the creation form to add a new star to the list (on the bottom) -->
    <div v-if="displayCreateForm">
      <creation-card-component @reload="reload"></creation-card-component>
    </div>

    <!-- This is the update form to change data for a selected star -->
    <div v-if="displayUpdateForm">
      <update-card-component
        :DemandeInfo="selectedStar"
        @reload="reload"
      ></update-card-component>
    </div>

    <!-- This is the footer -->
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
    //all the methods order by ABC
    addCreateForm() {
      this.displayUpdateForm = false;
      this.displayCreateForm = !this.displayCreateForm;
    },
    addUpdateForm() {
      this.displayCreateForm = false;
      this.displayUpdateForm = !this.displayUpdateForm;
    },
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
    reload() {
      window.location.href = "./";
    },
  },
};
</script>