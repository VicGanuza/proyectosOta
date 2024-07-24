<template>
  <div class="content">
    <h1>{{$t('currentPolicyAdmin.title')}}</h1>
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
  name:"CurrentPolicyAdmin",
  components: {Lists},
  data() {
    return {
      listFields: [
        {name: "file", field: "url", url: true, urlName: "name" ,urlNameDin:true}
      ]
    }
  },
  created(){
    this.GetCurrentPoliciesList(this.User);
  },
  computed: {
    ...mapGetters({ User: "StateUserLogged", CurrentPolicies: "StateCurrentPoliciesList" }),
  },
  methods: {
    ...mapActions(["GetCurrentPoliciesList"]),
    addDocument(){
      this.$router.push("/addPolicy");
    },
    editDocument(id){
      this.$router.push({ path: '/editPolicy/'+id })
    }
  }
})
</script>
