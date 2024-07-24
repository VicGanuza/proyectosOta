<template>
  <div>
    <p class="font-weight-bold">{{$t('documentForm.subtitle')}}</p>
    <div class="form">
      <form @submit.prevent="submit">
        <div>
          <label for="fullname">{{$t('documentForm.fullname')}}:</label>
          <div class="input-content">
            <input type="text" name="fullname" v-model="form.fullname" />
            <span v-if="showError.fullname" class="error">{{ $t(errorMessage.fullname) }}</span>
          </div>
        </div>
        <div>
          <label for="enterprise">{{$t('documentForm.enterprise')}}:</label>
          <div class="input-content">
            <input type="enterprise" name="enterprise" v-model="form.enterprise" />
            <span v-if="showError.enterprise" class="error">{{ $t(errorMessage.enterprise) }}</span>
          </div>
        </div>
        <div>
          <label for="email">{{$t('documentForm.email')}}:</label>
          <div class="input-content">
            <input type="email" name="email" v-model="form.email" />
            <span v-if="showError.email" class="error">{{ $t(errorMessage.email) }}</span>
          </div>
        </div>
        <div>
          <label for="phone">{{$t('documentForm.phone')}}:</label>
          <div class="input-content">
            <input type="phone" name="phone" v-model="form.phone" />
            <span v-if="showError.phone" class="error">{{ $t(errorMessage.phone) }}</span>
          </div>
        </div>
        <button data-btn="default large" type="submit">{{$t('documentForm.submit')}}</button>
      </form>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default({
  name: "DocumentFormComponent",
  props: ['ShowMessage',
  'Id',
  'Message',
  'FileName',
  'FileTitle'],
  data() {
    return {
      form: {
        fullname: "",
        enterprise: "",
        email: "",
        phone: "",
      },
      showError:{
        fullname: false,
        enterprise: false,
        email: false,
        phone: false,
      },
      errorMessage:{
        fullname: '',
        enterprise: '',
        email: '',
        phone: '',
      },
      
    };
  },
  computed:{
    ...mapGetters({ RequestAnsw: "StateRequestAnsw" })
  },
  methods: {
    ...mapActions(["AskForDownload"]),
    async submit(){
      if (this.form.fullname == ''){
        this.showError.fullname=true;
        this.errorMessage.fullname = 'documentForm.fullnameRequired';
      } else
        if (!this.validName(this.form.fullname)){
          this.showError.fullname = true;
          this.errorMessage.fullname = 'documentForm.nameInvalid';
        } else {
          this.showError.fullname=false;
          this.errorMessage.fullname = '';
        }
      if (this.form.enterprise == ''){
        this.showError.enterprise=true;
        this.errorMessage.enterprise = 'documentForm.enterpriseRequired';
      } else
        if (!this.validName(this.form.enterprise)){
          this.showError.enterprise = true;
          this.errorMessage.enterprise = 'documentForm.nameInvalid';
        } else {
          this.showError.enterprise=false;
          this.errorMessage.enterprise = '';
        }
      if (this.form.email == ''){
        this.showError.email=true;
        this.errorMessage.email = 'documentForm.emailRequired';
      } else
        if (!this.validEmail(this.form.email)){
          this.showError.email = true;
          this.errorMessage.email = 'documentForm.emailInvalid';
        } else {
          this.showError.email=false;
          this.errorMessage.email = '';
        }
      if (this.form.phone == ''){
        this.showError.phone=true;
        this.errorMessage.phone = 'documentForm.phoneRequired';
      } else
       if (!this.validPhone(this.form.phone)){
          this.showError.phone = true;
          this.errorMessage.phone = 'documentForm.phoneInvalid';
        } else { 
          this.showError.phone=false;
          this.errorMessage.phone = '';
        }
      
      if (!this.showError.fullname && !this.showError.enterprise && !this.showError.email && !this.showError.phone){
        let data = new FormData();
        data.append("id",this.Id);
        data.append("name",this.form.fullname);
        data.append("empresa", this.form.enterprise);
        data.append("email", this.form.email);
        data.append("tel", this.form.phone);
        data.append("filename", this.FileName);
        data.append("fileTitle", this.FileTitle);

        await this.AskForDownload(data);
        if (this.RequestAnsw.error) {
          this.$emit('update:ShowMessage', true);
          this.$emit('update:Message', this.RequestAnsw.error); 
        } else {
          this.$emit('update:ShowMessage', true);
          this.$emit('update:Message', this.RequestAnsw.message); 
        }
      }
    },
    validName: function (name) {
      var re = /^[a-zA-Z-' ]*$/;
      return re.test(name);
    },
    validEmail: function (email) {
      /* eslint-disable-next-line */
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    validPhone: function (phone) {
      /* eslint-disable-next-line */
      var re = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
      return re.test(phone);
    }
  }
})
</script>
