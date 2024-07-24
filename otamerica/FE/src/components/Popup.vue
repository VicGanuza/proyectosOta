<template>
    <div :class="['popup', { 'popup-show': showPopup }]">
      <video class="video" autoplay loop controls muted>
        <source src="../assets/VideoOiltanking-Otamerica-10.11.23.mp4" type="video/mp4" class="source">
      </video>
      <img src="../assets/times-circle.svg" alt="" class="close-button" @click="closePopup">
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        showPopup: false,
      };
    },
    mounted() {
      this.$nextTick(() => {
        setTimeout(() => {
          this.showPopup = true;
        }, 50);
      });
    },
    methods: {
      closePopup() {
        this.showPopup = false;
        setTimeout(() => {
          this.$emit('close');
        }, 300);
      },
    },
  };
  </script>
  
  <style scoped>
  .popup {
    width: 98vw;
    height: 98%;
    position: fixed;
    top: 12px;
  z-index: 1000000;
    background-color: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: translateY(-100%);
    transition: opacity 0.3s ease 0s, transform 0.3s ease 0.3s;
  }
  
  .video {
    width: 98vw;
    height: 98vh;
    object-fit: cover;
  }
  .source {
    width: 100%;
    height: 100%;
  }
  
  .popup-show {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.3s ease 0.3s, transform 0.3s ease 0s;
    z-index: 1000000;
    padding: 12px 12px 12px 24px;
  }
  
  .close-button {
    position: absolute;
    top: 12px;
    right: 12px;
    height: 30px;
    width: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
  }
  </style>
  