<template>
  <div class="content">
    <h1>{{$t('userForm.title')}}</h1>
    <div class="row">
      <div class="col-2">
        <label>{{$t('userForm.country')}}</label>
        <div class="content-select">
          <select v-model="filtro.location" @change="search()">
            <option v-for="m in Locations" :key="m.id" :value="m.id">{{$t('locations.'+m.name)}}</option>
          </select>
          <i></i>
        </div>
      </div>
    </div>
    <Lists 
      :Items="Users" 
      :Fields="listFields"
      :addFunction="addUser" 
      :editFunction="editUser"></Lists>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Lists from "@/components/Lists";

export default {
  name: "UserManager",
  components: {Lists},
  data() {
    return {
      filtro:{
        location:  0
      },
      listFields: [
        {name: "userForm.username", field: "username"},
        {name: "userForm.location", field: "lang_key", trans: "locations"}
      ]
    };
  },
  created: function() {
    this.getLocations();
    this.search();
  },
  computed: {
    ...mapGetters(
      { Locations: "StateLocation", 
        Users: "StateUserList", 
      }),
  },
  methods: {
    ...mapActions([ "GetUserList", "GetLocations"]),
    async getLocations(){
      await this.GetLocations();
    },
    async search(){
      await this.GetUserList(this.filtro);
    },
    addUser(){
      this.$router.push("/addUser");
    },
    editUser(id){
      this.$router.push({ path: '/editUser/'+id })
    }
  },
};
</script>
