<template>
  <div class="contentProvider">
    <v-container class="text-justify">
      <v-row>
        <v-col cols="12" lg="3" md="6" v-for="n in NewsList" :key="n.id"> 
          <NewTemplate 
            v-bind:Img="n.image" 
            v-bind:DateNews="n.date" 
            v-bind:FechaNews="n.fecha" 
            v-bind:Headline="n.title"
            v-bind:External="n.external_url"
            v-bind:Readmore="n.readmore"/>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
import NewTemplate from './news/NewTemplate.vue';
import { mapGetters, mapActions } from "vuex";

export default {
  name: "News",
  components: {
    NewTemplate
  },
  created() {
    this.ResetStateNewsList();
    this.getNewsListData();
  },
  computed: {
    ...mapGetters(
      { NewsListLoading: "StateNewsListLoading", 
        NewsList: "StateNewsList", 
        
      }),
  },
  methods: {
    ...mapActions([ "GetNewsList", "ResetStateNewsList"]),
    async getNewsListData() {
      await this.GetNewsList();
    }
  },
}
  </script>