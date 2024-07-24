<template>
  <div class="content">
    <div class="login">
      <form @submit.prevent="submit">
        <div>
          <label for="username">{{$t('login.username')}}:</label>
          <input type="text" name="username" v-model="form.username" />
        </div>
        <div>
          <label for="password">{{$t('login.password')}}:</label>
          <input type="password" name="password" v-model="form.password" />
        </div>
        <p v-if="showError" class="error">{{$t('login.error')}}</p>
        <button data-btn="default large" type="submit">{{$t('login.submit')}}</button>
      </form>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import md5 from 'md5';

export default {
  name: "Login",
  components: {},
  data() {
    return {
      form: {
        username: "",
        password: "",
      },
      showError: false
    };
  },
  methods: {
    ...mapActions(["LogIn"]),
    async submit() {
      const User = new FormData();
      User.append("username", this.form.username);
      User.append("password", md5(this.form.password)); 
      try {
        await this.LogIn(User);
        this.$router.push("/");
        this.showError = false
      } catch (error) {
        console.log('error',error.response);
        this.showError = true
      }
    },
  },
};
</script>

