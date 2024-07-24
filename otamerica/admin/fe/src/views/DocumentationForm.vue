<template>
  <div class="content">
    <h1>{{$t('documentAdmin.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
    @submit="sendData"
  >
     <div class="row">
      <FormulateInput
        type="text"
        v-model="Document.name"
        validation="required"
        :label="$t('documentAdmin.name')"
      />

      <div class="col-2" :class="{'error': officeError}">
        <label>{{$t('documentAdmin.office')}}</label>
        <div class="content-select">
          <select v-model="Document.office">
            <option v-for="o in Offices" :key="o.id" :value="o.id">{{o.name + ', '+$t(o.companyTerminal)}}</option>
          </select>
          <i></i>
          <p class="error" v-if="officeError">{{$t('message.required')}}</p>
        </div>
      </div>
      <!-- <FormulateInput
        type="text"
        v-model="Document.region"
        :label="$t('documentAdmin.region')"
      /> -->
    </div>
    <div class="height-40" v-if="Document.url">
      <MdiSvg> {{ mdiFileEyeOutline }} </MdiSvg>
      <a :href="`http://otamerica.com/files/${Document.url}`" target="_blank">{{$t('file')}}</a>
    </div>
    <FormulateInput
      type="file"
      :label="$t('fileForm.selectDocument')"
      :help="$t('fileForm.selectPdf')"
      v-model="document"
      :validation = "(id == 0) ? 'required|mime:application/pdf': 'optional|mime:application/pdf'"
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
      document: '',
      id:'',
      monthError: false,
      mdiFileEyeOutline,
      officeError: false
    }
  },
  created() {
    this.id = this.$route.params.id ? this.$route.params.id : 0;
    let d = {
      id: this.id,
      user: this.User
    }
    this.GetDocument(d);
    this.GetOfficeList(this.User);
  },
  computed: {
  ...mapGetters(
    { Document: "StateDocument",
      Offices: "StateOfficeList",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage",
      User: "StateUserLogged" 
    }),
    
  },
  methods: {
    ...mapActions(["GetDocument", "EditDocument", "CreateDocument", "GetOfficeList"]),
    async sendData () {
      if (!this.Document.office || this.Document.office == 0) {
        this.officeError=true;
      }  else this.officeError = false;
      
      if (this.document != ''){
        this.Document.file = this.document.fileList[0];
      }
      this.Document.user = this.User;
      if (this.id == 0) {
        console.log(this.Document);
        await this.CreateDocument(this.Document);
      } else {
        await this.EditDocument(this.Document);
      }     
    },
  }
}
</script>