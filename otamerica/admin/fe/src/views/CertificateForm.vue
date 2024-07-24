<template>
  <div class="content">
    <h1>{{$t('certificateAdmin.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
    @submit="sendData"
  >
     <div class="row">
      <FormulateInput
        type="text"
        v-model="Certificate.name"
        disabled
        :label="$t('certificateAdmin.name')"
      />
      <div class="col-2">
        <label>{{$t('documentAdmin.office')}}</label>
        <div class="content-select">
          <select v-model="Certificate.office" disabled>
            <option v-for="o in Offices" :key="o.id" :value="o.id">{{o.name + ', '+$t(o.companyTerminal)}}</option>
          </select>
          <i></i>
        </div>
      </div>
    </div>
    <div class="height-40" v-if="Certificate.url">
      <MdiSvg> {{ mdiFileEyeOutline }} </MdiSvg>
      <a :href="`http://otamerica.com/files/${Certificate.url}`" target="_blank">{{$t('file')}}</a>
    </div>
    <FormulateInput
      type="file"
      :label="$t('fileForm.selectDocument')"
      :help="$t('fileForm.selectPdf')"
      v-model="document"
      validation="required|mime:application/pdf"
      upload-behavior="delayed"
    />
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
import { mdiFileEyeOutline } from '@mdi/js';

export default {
  data(){
    return {
      document:'',
      id:'',
      mdiFileEyeOutline
    }
  },
  created() {
    this.id = this.$route.params.id ? this.$route.params.id : 0;
    let d = {
      id: this.id,
      user: this.User
    }
    this.GetCertificate(d);
    this.GetOfficeList(this.User);
  },
  computed: {
  ...mapGetters(
    { Certificate: "StateCertificate",
      Offices: "StateOfficeList",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage",
      User: "StateUserLogged" 
    }),
  },
  methods: {
    ...mapActions(["GetCertificate", "EditCertificate", "GetOfficeList"]),
    async sendData () {
      this.Certificate.file = this.document.fileList[0];
      this.Certificate.user = this.User;
      await this.EditCertificate(this.Certificate);
    },
  }
}
</script>