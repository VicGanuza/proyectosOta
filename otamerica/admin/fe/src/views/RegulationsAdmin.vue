<template>
  <div class="content">
    <h1>{{$t('regulationAdmin.title')}}</h1>
    <Lists 
      :Items="CurrentPolicies" 
      :Fields="listFields"
      :addFunction="addDocument"
      :editFunction="editDocument"></Lists>
  </div>
</template>
<script>
import { mapGetters , mapActions  } from "vuex";
import Lists from "@/components/Lists";

export default ({
  name:"RegulationAdmin",
  components: {Lists},
  data() {
    return {
      listFields: [
        {name: "file", field: "url", url: true, urlName: "name" ,urlNameDin:true}
      ]
    }
  },
  created(){
    this.GetRegulationList(this.User);
  },
  computed: {
    ...mapGetters({ User: "StateUserLogged", CurrentPolicies: "StateRegulationList" }),
  },
  methods: {
    ...mapActions(["GetRegulationList"]),
    addDocument(){
      this.$router.push("/addRegulation");
    },
    editDocument(id){
      this.$router.push({ path: '/editRegulation/'+id })
    }
  }
})
</script>
