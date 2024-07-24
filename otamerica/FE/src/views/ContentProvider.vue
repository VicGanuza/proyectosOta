<template>
  <div class="contentProvider">
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/image_ot-flags_1920px.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1 class="my-5">
        {{$t('contentProvider.title')}}
      </h1>
      <h2>{{$t('contentProvider.websiteOwnerTitle')}}</h2>
      <p>
        <span  class="font-weight-black">
          {{$t('contentProvider.websiteOwnerCompany')}}<br/>
        </span>
        {{$t('contentProvider.websiteOwnerAddress')}}<br/>
        {{$t('contentProvider.websiteOwnerCity')}}<br/>
        {{$t('contentProvider.websiteOwnerCountry')}}<br/>
      </p>
      <p class="blue--text text--accent-4">
        <span>
          <v-icon small class="mr-2">mdi-phone-in-talk</v-icon>
          +49 40 37099-0
          <br/>
        </span>
      </p>
      <p>
        {{$t('contentProvider.websiteOwnerManagement')}}:<br/>
        {{$t('contentProvider.websiteOwnerPersonal')}}<br/>
      </p>
      <h2>{{$t('contentProvider.websiteContents.title')}}</h2>
      <p >
        <span  class="font-weight-black">
          {{$t('contentProvider.websiteContents.company')}}<br/>
        </span>
        {{$t('contentProvider.websiteContents.address')}}<br/>
        {{$t('contentProvider.websiteContents.city')}}<br/>
        {{$t('contentProvider.websiteContents.country')}}<br/>
      </p>
      <p>
        {{$t('contentProvider.websiteContents.management')}}:<br/>
        {{$t('contentProvider.websiteContents.personal')}}<br/>
      </p>
      <p class="blue--text text--accent-4">
        <span>
          <v-icon small class="mr-2">mdi-email-outline</v-icon>
          <a href="`mailto:online-media@oiltanking.com`">media-communications@otamerica.com</a>
          <br/>
        </span>
      </p>
      <!-- <h2>{{$t('contentProvider.websiteDesign.title')}}</h2>
      <p>
        <span  class="font-weight-black">
          {{$t('contentProvider.websiteDesign.company')}}<br/>
        </span>
        <span v-html="$t('contentProvider.websiteDesign.address')"></span><br/>
        {{$t('contentProvider.websiteDesign.city')}}<br/>
        {{$t('contentProvider.websiteDesign.country')}}<br/>
      </p>
      <p class="blue--text text--accent-4">
        <span>
          <v-icon small class="mr-2">mdi-web</v-icon>
          <a href="www.raz-design.de" target="_blank">www.raz-design.de</a>
          <br/>
        </span>
      </p> -->
     
      <h2>{{$t('contentProvider.websiteProgramming.title')}}</h2>
      <p>
        <span  class="font-weight-black">
          {{$t('contentProvider.websiteProgramming.company')}}<br/>
        </span>
        {{$t('contentProvider.websiteProgramming.description')}}<br/>
        {{$t('contentProvider.websiteProgramming.city')}}<br/>
        {{$t('contentProvider.websiteProgramming.country')}}<br/>
      </p>
      <p class="body-1 blue--text text--accent-4">
        <span>
          <v-icon small class="mr-2">mdi-web</v-icon>
          <a href="https://www.linkedin.com/in/victoriaganuza/" target="_blank">LinkedIn</a>
          <br/>
        </span>
      </p>
    </v-container>
  </div>
</template>
<script>

export default {
  name: "ContentProvider",
}
</script>
