<template>
  <div class="modal-layout">
    <div class="modal-container">
      <h1>Are you sure ?</h1>
      <div class="button-modal">
        <button @click="deleteStar(SelectedStar.id)">Yes</button>
        <button @click="removeModal">No</button>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "modal-component",
  props: ["SelectedStar"],
  data() {
    return {};
  },
  mounted() {},
  methods: {
    deleteStar(id) {
      Axios.delete("/api/stars/delete/" + id)
        .then((response) => {})
        .then(() => {
          this.$emit("reload");
        })
        .catch((error) => {
          console.log("error = ", error);
        });
    },
    removeModal() {
      this.$emit("displayModal");
    },
  },
};
</script>