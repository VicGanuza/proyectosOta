<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="
        require('@/assets/images/image_ot-germany-hamburg_operators_1920px.jpg')
      "
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("corporateMovies.title") }}
      </h1>
      <p>{{ $t("corporateMovies.p") }}</p>
      <h2 class="my-4 w-700">{{ $t("corporateMovies.video2") }}</h2>
      <video-player
        class="vjs-custom-skin"
        ref="videoPlayer"
        :options="video2"
        :playsinline="true"
      >
      </video-player>
      <h2 class="my-4 w-700">{{ $t("corporateMovies.video1") }}</h2>
      <video-player
        class="vjs-custom-skin"
        ref="videoPlayer"
        :options="video1"
        :playsinline="true"
      >
      </video-player>
    </v-container>
  </div>
</template>
<script>
export default {
  name: "CorporateMovies",
  data: () => {
    return {
      video1: {
        height: "360",
        autoplay: true,
        muted: true,
        language: "en",
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            type: "video/mp4",
            // mp4
            src: "https://www.otamerica.com/files/videos/VideoVitoria.mp4",
          },
        ],
      },
      video2: {
        height: "360",
        autoplay: true,
        muted: true,
        language: "en",
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            type: "video/mp4",
            // mp4
            src: "https://www.otamerica.com/files/videos/VideoPortAçu.mp4",
          },
        ],
      },
      video3: {
        height: "360",
        autoplay: true,
        muted: true,
        language: "en",
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            type: "video/mp4",
            // mp4
            src: "https://www.otamerica.com/files/videos/Oiltanking-Spring-Meeting2017-Social-Day.mp4",
          },
        ],
      },
    };
  },
  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    },
  },
};
</script>
