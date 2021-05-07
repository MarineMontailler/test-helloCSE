<template>
  <div>
    <form class="form-container">
      <label for="firstname">Firstname : </label>
      <input
        type="text"
        id="firstname"
        name="firstname"
        v-model="newStar.firstname"
        required
      />
      <label for="lastname">Lastname : </label>
      <input
        type="text"
        id="lastname"
        name="lastname"
        v-model="newStar.lastname"
        required
      />
      <label for="image">Url Image : </label>
      <input
        type="text"
        id="image"
        name="image"
        v-model="newStar.image"
        required
      />
      <label for="description">Description : </label>
      <textarea
        type="textarea"
        id="description"
        name="description"
        v-model="newStar.description"
        required
      />
      <div v-if="errorForm" class="notification-error">
        No empty field please
      </div>
      <div style="text-align: center">
        <button type="button" @click="createStar">Add</button>
      </div>
    </form>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "creation-card-component",
  data() {
    return {
      errorForm: false,
      newStar: {
        firstname: "",
        lastname: "",
        image: "",
        description: "",
      },
    };
  },
  methods: {
    createStar() {
      let newData = {
        firstname: this.newStar.firstname,
        lastname: this.newStar.lastname,
        image: this.newStar.image,
        description: this.newStar.description,
      };
      if (
        this.newStar.firstname != "" &&
        this.newStar.lastname != "" &&
        this.newStar.image != "" &&
        this.newStar.description != ""
      ) {
        Axios.post("/api/stars/new", newData)
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