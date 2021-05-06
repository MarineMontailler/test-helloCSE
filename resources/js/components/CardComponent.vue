<template>
  <div>
    <div class="card-container">
      <div class="photo-container">
        <img :src="DemandeInfo.image" :alt="DemandeInfo.firstname" />
      </div>
      <h2 class="card-title">
        {{ DemandeInfo.firstname }} {{ DemandeInfo.lastname }}
      </h2>
      <p>
        {{ DemandeInfo.description }}
      </p>
      <div class="button-container">
        <button @click="addCreateForm">
          {{ DisplayCreateForm ? "Cancel" : "Add" }}
        </button>
        <button @click="addUpdateForm">
          {{ DisplayUpdateForm ? "Cancel" : "Update" }}
        </button>
        <button @click="openModal">Delete</button>
      </div>
    </div>
    <modal-component
      v-if="displayModal"
      :SelectedStar="DemandeInfo"
      @displayModal="removeModal"
      @reload="reload"
    ></modal-component>
  </div>
</template>

<script>
import ModalComponent from "./ModalComponent.vue";
export default {
  components: {
    "modal-component": ModalComponent,
  },
  name: "card-component",
  props: ["ListStars", "DemandeInfo", "DisplayCreateForm", "DisplayUpdateForm"],
  data() {
    return {
      displayModal: false,
      listStars: [],
    };
  },
  methods: {
    addCreateForm() {
      this.$emit("addCreateForm");
    },
    addUpdateForm() {
      this.$emit("addUpdateForm");
    },
    openModal() {
      this.displayModal = true;
    },
    reload() {
      window.location.href = "./";
    },
    removeModal() {
      this.displayModal = false;
    },
  },
};
</script>
