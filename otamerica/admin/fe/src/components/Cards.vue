<template>
  <div class="m-cards" :class="{'m-cards--1': Items.length == 1, 'm-cards--2': Items.length > 1}">
    <router-link class="m-card" v-for="item in Items" :key="item.id" :to="item.access">{{$t('section.'+item.section)}}</router-link>
  </div>
</template>
<script>

export default ({
  name:"Cards",
  props: {
    Items: Array,
  },
})
</script>
