<template>
  <div class="content">
    <h1>{{$t('publicAccessAdmin.title')}}</h1>
    <Lists 
      :Items="PublicAccesss" 
      :Fields="listFields"
      :addFunction="addPublicAccess"
      :editFunction="editPublicAccess"
      ></Lists>
  </div>
</template>
<script>
import { mapGetters , mapActions  } from "vuex";
import Lists from "@/components/Lists";

export default ({
  name:"PublicAccessAdmin",
  components: {Lists},
  data() {
    return {
      listFields: [
        {name: "file", field: "name"},
        {name: "Pdf", field: "pdf", iconUrl: true},
        {name: "Excel", field: "excel", iconUrl: true}
      ]
    }
  },
  created(){
    this.GetPublicAccessList();
  },
  computed: {
    ...mapGetters({ PublicAccesss: "StatePublicAccessList" }),
  },
  methods: {
    ...mapActions([ "GetPublicAccessList"]),
    editPublicAccess(id){
      this.$router.push({ path: '/editPublicAccess/'+id })
    },
    addPublicAccess(){
      this.$router.push("/addPublicAccess");
    }
  }
})
</script>
