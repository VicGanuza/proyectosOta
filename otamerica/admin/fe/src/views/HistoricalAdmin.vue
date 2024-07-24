<template>
  <div class="content">
    <h1>{{$t('historicalMovement.title')}}</h1>
    <div class="row">
      <div class="col-2">
        <label>{{$t('year')}}</label>
        <div class="content-select">
          <select v-model="filtro.year" @change="getMonths()">
            <option v-for="y in Years" :key="y.id">{{y.name}}</option>
          </select>
          <i></i>
        </div>
      </div>
      <div class="col-2">
        <label>{{$t('monthLabel')}}</label>
        <div class="content-select">
          <select v-model="filtro.month" @change="search()">
            <option v-for="m in Months" :key="m.id" :value="m.id">{{$t(m.name)}}</option>
          </select>
          <i></i>
        </div>
      </div>
    </div>
    <Lists 
      :Items="HistoricalMovements" 
      :Fields="listFields"
      :JustEdit="true"
      :editFunction="editHistorical"></Lists>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Lists from "@/components/Lists";

export default {
  name: "HistoricalAdmin",
  components: {Lists},
  data() {
    return {
      filtro:{
        year:  0,
        month:  0
      },
      listFields: [
        {name: "name", field: "name"},
        {name: "monthLabel", field: "month"},
        {name: "file", field: "url", url: true, urlName: "file"},
        {name: "type", field: "type", icon: true}
      ]
    };
  },
  created: function() {
    this.filtro.year = this.CurrentYear;
    this.UpdateYears();
    this.getMonths();
    this.search();
  },
  computed: {
    ...mapGetters(
      { HistoricalMovements: "StateHistoricalMovements", 
        Years: "StateYears", 
        Months: "StateMonths", 
        CurrentYear: "StateCurrentYear", 
      }),
  },
  methods: {
    ...mapActions([ "GetHistoricalMovements", "UpdateYears", "UpdateMonths"]),
    getMonths() {
      this.filtro.month = 0;
      this.UpdateMonths(this.filtro.year);
      this.search();
    },
    async search(){
      await this.GetHistoricalMovements(this.filtro);
    },
    addHistorical(){
      this.$router.push("/addHistorical");
    },
    editHistorical(id){
      this.$router.push({ path: '/editHistorical/'+id })
    }
  },
};
</script>
