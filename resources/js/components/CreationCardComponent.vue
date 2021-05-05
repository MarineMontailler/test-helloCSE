<template>
  <div>
    <div class="form-container">
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
    </div>
    <div style="text-align: center">
      <button @click="createStar">Créer</button>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "creation-card-component",
  data() {
    return {
      newStar: {},
    };
  },
  created() {
    //
  },
  methods: {
    createStar() {
      let newStar = {
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
        Axios.post("/api/stars/new/", newStar)
          .then((response) => {
            console.log("response ", response);
          })
          .then(() => {
            this.$emit("reload");
          });
      } else {
        console.log("error");
      }
    },
  },
};
</script>