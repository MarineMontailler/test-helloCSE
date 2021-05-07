<template>
  <div>
    <form class="form-container">
      <label for="firstname">Firstname : </label>
      <input
        type="text"
        id="firstname"
        name="firstname"
        v-model="DemandeInfo.firstname"
        required
      />
      <label for="lastname">Lastname : </label>
      <input
        type="text"
        id="lastname"
        name="lastname"
        v-model="DemandeInfo.lastname"
        required
      />
      <label for="image">Url Image : </label>
      <input
        type="text"
        id="image"
        name="image"
        v-model="DemandeInfo.image"
        required
      />
      <label for="description">Description : </label>
      <textarea
        type="textarea"
        id="description"
        name="description"
        v-model="DemandeInfo.description"
        required
      />
      <div v-if="errorForm" class="notification-error">
        No empty field please
      </div>
      <div style="text-align: center">
        <button type="button" @click="updateStarCard(DemandeInfo)">
          Update
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "update-card-component",
  props: ["DemandeInfo", "DisplayUpdateForm"],

  data() {
    return {
      errorForm: false,
    };
  },
  methods: {
    updateStarCard(DemandeInfo) {
      let updateStar = DemandeInfo;
      if (
        updateStar.firstname != "" &&
        updateStar.lastname != "" &&
        updateStar.image != "" &&
        updateStar.description != ""
      ) {
        Axios.put("/api/stars/update/" + updateStar.id, updateStar)
          .then((response) => {})
          .then(() => {
            this.$emit("reload");
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        // Notification Bar OPTIONNAL
        this.errorForm = true;
        const errorFormAction = () => {
          this.errorForm = false;
        };
        setTimeout(errorFormAction, 3000);
      }
    },
  },
};
</script>