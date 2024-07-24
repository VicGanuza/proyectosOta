<template>
  <div id="nav" class="navbar">
    <div class="menu">
      <router-link v-for="i in Items" :key="i.id" :to="i.access">{{$t('section.'+i.section)}}</router-link>
    </div>
  </div>
</template>
<script>
export default {
    name: "Menu",
    props: ['Items']
}
</script>