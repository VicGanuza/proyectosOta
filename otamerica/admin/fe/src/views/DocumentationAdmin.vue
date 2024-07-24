<template>
  <div class="content">
    <h1>{{$t('documentAdmin.title')}}</h1>
    <Lists 
      :Items="Documents" 
      :Fields="listFields"
      :addFunction="addDocument"
      :editFunction="editDocument"></Lists>
  </div>
</template>
<script>
import { mapGetters , mapActions  } from "vuex";
import Lists from "@/components/Lists";

export default ({
  name:"DocumentationAdmin",
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
    this.GetDocumentList(this.User);
  },
  computed: {
    ...mapGetters({ User: "StateUserLogged", Documents: "StateDocumentList" }),
  },
  methods: {
    ...mapActions(["GetDocumentList"]),
    addDocument(){
      this.$router.push("/addDocument");
    },
    editDocument(id){
      this.$router.push({ path: '/editDocument/'+id })
    }
  }
})
</script>
