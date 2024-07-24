<template>
  <div class="home">
    <div class="content error">
      <span v-if="Message != ''">{{$t(Message)}}</span>
      <span v-else>{{$t('message.restrictedAccess')}}</span>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  name: "RestrictedAccess",
  computed:{
    ...mapGetters(
      { Message: "StateErrorMessage"}
    ),
  }
};
</script>