<template>
  <div class="content">
    <h1>{{$t('publicAccessAdmin.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
      @submit="sendData"
      #default="{ hasErrors }"
    >
      <div class="row">
        <FormulateInput
          type="text"
          v-model="PublicAccess.name"
          validation="required"
          :label="$t('publicAccessAdmin.name')"
        />
      </div>
      <div class="height-40" v-if="PublicAccess.url">
        <MdiSvg> {{ mdiFilePdfBox }} </MdiSvg>
        <a :href="`http://otamerica.com/files/${PublicAccess.url}`" target="_blank">{{$t('file')}}</a>
      </div>
      <div class="height-40" v-if="PublicAccess.pdf">
        <MdiSvg> {{ mdiFilePdfBox }} </MdiSvg>
        <a :href="`http://otamerica.com/files/${PublicAccess.pdf}`" target="_blank">{{$t('file')}}</a>
      </div>
      <div class="height-40" v-if="PublicAccess.excel">
        <MdiSvg> {{ mdiMicrosoftExcel }} </MdiSvg>
        <a :href="`http://otamerica.com/files/${PublicAccess.excel}`" target="_blank">{{$t('file')}}</a>
      </div>
      <FormulateInput
        type="file"
        :label="$t('fileForm.selectDocument')"
        :help="$t('fileForm.selectFile')"
        v-model="document"
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
          :disabled="hasErrors || (id == 0 && (!document || document.fileList.length == 0))"
          :label="$t('fileForm.save')"
          data-btn="default large"
        />
      </div>
    </FormulateForm>
  </div>
</template>
  
<script>
import { mapGetters, mapActions } from "vuex";
import { mdiFilePdfBox, mdiMicrosoftExcel } from '@mdi/js';

export default {
  data(){
    return {
      document:'',
      id:'',
      mdiFilePdfBox,
      mdiMicrosoftExcel
    }
  },
  created() {
    this.id = this.$route.params.id ? this.$route.params.id : 0;
    this.GetPublicAccess(this.id);
  },
  computed: {
  ...mapGetters(
    { PublicAccess: "StatePublicAccess",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage",
    }),
  },
  methods: {
    ...mapActions(["GetPublicAccess", "CreatePublicAccess", "EditPublicAccess"]),
    async sendData () {
      console.log('en sendData',this.document );
      this.PublicAccess.file = this.document ? this.document.fileList[0] : null;
      if (this.id == 0) {
        await this.CreatePublicAccess(this.PublicAccess);
      } else {
        await this.EditPublicAccess(this.PublicAccess);
      }
    },
  }
}
</script>