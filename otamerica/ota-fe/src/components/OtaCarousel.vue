<template>
  <v-carousel cycle hide-delimiter-background show-arrows="hover">
    <v-carousel-item
      v-for="(item, i) in Imgs"
      :key="i"
      :src="require(`@/assets/images/carousel/${item.src}`)"
    >
      <v-sheet class="mx-auto m-carousel--info">
        <v-container>
          <v-row
            align="center"
            justify="center"
            class="title text-uppercase blue--text text--accent-4"
            v-t="item.title"
          >
          </v-row>
          <v-row align="center" justify="center" class="body-2">
            <span v-html="$t(item.text)"></span>
            <span class="ml-3">
              <router-link :to="item.link">{{ $t("keepReading") }}</router-link>
            </span>
          </v-row>
        </v-container>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
  props: ["Imgs"],
};
</script>
