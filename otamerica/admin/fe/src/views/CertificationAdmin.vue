<template>
  <div class="content">
    <h1>{{$t('certificateAdmin.title')}}</h1>
    <Lists 
      :Items="Certificates" 
      :Fields="listFields"
      :editFunction="editCertificate"
      :JustEdit="true"></Lists>
  </div>
</template>
<script>
import { mapGetters , mapActions  } from "vuex";
import Lists from "@/components/Lists";

export default ({
  name:"CertificationAdmin",
  components: {Lists},
  data() {
    return {
      listFields: [
        {name: "region", field: "region"},
        {name: "file", field: "url", url: true, urlName: "name" ,urlNameDin:true}
      ]
    }
  },
  created(){
    this.GetCertificateList(this.User);
  },
  computed: {
    ...mapGetters({ Certificates: "StateCertificateList", User: "StateUserLogged" }),
  },
  methods: {
    ...mapActions([ "GetCertificateList"]),
    editCertificate(id){
      this.$router.push({ path: '/editCertificate/'+id })
    }
  }
})
</script>
