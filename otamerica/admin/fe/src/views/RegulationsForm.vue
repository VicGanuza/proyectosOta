<template>
  <div class="content">
    <h1>{{$t('regulationAdmin.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
    @submit="sendData"
  >
     <div class="row">
      <FormulateInput
        type="text"
        v-model="Document.name"
        validation="required"
        :label="$t('regulationAdmin.name')"
      />

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
    this.GetRegulation(d);
  },
  computed: {
  ...mapGetters(
    { Document: "StateRegulation",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage",
      User: "StateUserLogged" 
    }),
    
  },
  methods: {
    ...mapActions(["GetRegulation", "EditRegulation", "CreateRegulation"]),
    async sendData () {
      if (this.document != ''){
        this.Document.file = this.document.fileList[0];
      }
      this.Document.user = this.User;
      if (this.id == 0) {
        console.log(this.Document);
        await this.CreateRegulation(this.Document);
      } else {
        await this.EditRegulation(this.Document);
      }     
    },
  }
}
</script>