<template>
  <div class="content">
    <h1>{{$t('userForm.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
      @submit="sendData"
    >
      <FormulateInput
        type="text"
        v-model="User.username" 
        validation="required"
        :label="$t('userForm.username')"
      />
      <FormulateInput
        type="password"
        v-model="User.password"
        :label="$t('userForm.password')"
      />
      <FormulateInput
        type="password"
        v-if="id!=0"
        v-model="User.newPassword"
        :label="$t('userForm.newPassword')"
      />
      <div class="mb-20" :class="{'error': countryError}">
        <label>{{$t('userForm.country')}}</label>
        <div class="content-select">
          <select v-model="User.location" @change="updateError()">
            <option v-for="m in Locations" :key="m.id" :value="m.id">{{ m.id==0 ? $t('locations.select') : $t('locations.'+m.name) }}</option>
          </select>
          <i></i>
          <p class="error" v-if="countryError">{{$t('message.required')}}</p>
        </div>
      </div>
      
      <p v-if="ShowError" class="error">{{$t(Error)}}</p>
      <div class="actions">
        <FormulateInput
          type="button"
          :label="$t('fileForm.goBack')"
          data-ghost
          data-btn="large"
          @click="$router.go(-1)"
        />
        <FormulateInput
          type="submit"
          :label="$t('fileForm.save')"
          data-btn="default large"
        />
      </div>
    </FormulateForm>
  </div>
  
</template>
  
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data(){
    return {
      countryError: false,
      id:'',
      country: 0
    }
  },
  created() {
    this.id = this.$route.params.id ? this.$route.params.id : 0;
      this.GetUser(this.id);
    console.log(this.User);
  },
  computed: {
  ...mapGetters(
    { Locations: "StateLocation",
      User: "StateUser",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage"
    }),
  },
  methods: {
    ...mapActions(["CreateUser", "GetUser", "EditUser"]),
    updateError(){
      this.countryError=(!this.User.location || this.User.location == 0);
    },
    async sendData () {
      if (!this.User.location || this.User.location == 0) {
        this.countryError=true;
      } else {
        this.countryError=false;
        if (this.id == 0) {
          await this.CreateUser(this.User);
        } else {
          await this.EditUser(this.User);
        }    
      } 

      
    },
  }
}
</script>