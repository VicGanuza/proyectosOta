<template>
  <div class="content">
    <h1>{{$t('historicalMovement.title')}}</h1>
    <p v-if="ShowSuccess" class="success">{{$t(Success)}}</p>
    <FormulateForm
      @submit="sendData"
      #default="{ hasErrors }"
    >
      <FormulateInput
        type="text"
        v-model="Historical.name"
        :label="$t('name')"
      />
      <div class="row">
        <FormulateInput
          type="number"
          v-model="Historical.year"
          validation="required"
          :label="$t('year')"
        />
        <div class="cols-2" :class="{'error': monthError}">
          <label>{{$t('monthLabel')}}</label>
          <div class="content-select">
            <select v-model="Historical.month" @change="updateError()">
              <option v-for="m in Months" :key="m.id" :value="m.id">{{ m.id==0 ? $t('month.select') : $t(m.name) }}</option>
            </select>
            <i></i>
            <p class="error" v-if="monthError">{{$t('message.required')}}</p>
          </div>
        </div>
      </div>
      <div class="height-40" v-if="Historical.url">
        <MdiSvg> {{ mdiFileEyeOutline }} </MdiSvg>
        <a :href="`http://otamerica.com/files/${Historical.url}`" target="_blank">{{$t('file')}}</a>
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
          :disabled="hasErrors || monthError"
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
      monthError: false,
      id:'',
      mdiFileEyeOutline
    }
  },
  created() {
    this.id = this.$route.params.id ? this.$route.params.id : 0;
    this.GetHistorical(this.id);
  },
  computed: {
  ...mapGetters(
    { Months: "StateTotalMonths", 
      Historical: "StateHistorical",
      ShowError: "StateShowError",
      ShowSuccess: "StateShowSuccess",
      Error: "StateErrorMessage",
      Success: "StateSuccessMessage"
    }),
  },
  methods: {
    ...mapActions(["CreateHistorical","GetHistorical", "EditHistorical"]),
    updateError(){
      this.monthError=(!this.Historical.month || this.Historical.month == 0);
    },
    async sendData () {
      if (!this.Historical.month || this.Historical.month == 0) {
        this.monthError=true;
      } 
      
      this.Historical.file = this.document ? this.document.fileList[0] : null;
      if (this.id == 0) {
        await this.CreateHistorical(this.Historical);
      } else {
        await this.EditHistorical(this.Historical);
      }     
    },
  }
}
</script>