<template>
  <div>
    <h3 class="my-3 blue--text text--accent-4 w-700">
      {{ $t("quickFinder.title") }}
    </h3>
    <v-btn depressed large to="/QuickfinderResults">
      {{ $t("quickFinder.button") }}
    </v-btn>
  </div>
</template>

<script>
export default {
  name: "QuickFinder",
};
</script>
