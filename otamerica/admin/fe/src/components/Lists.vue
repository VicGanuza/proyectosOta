<template>
  <div class="m-list">
    <div class="m-list--header">
      <button data-btn="default circle" type="button" @click="addFunction()" v-if="!JustEdit">
        <MdiSvg> {{ mdiPlusCircleOutline }} </MdiSvg>
      </button>
    </div>
    <div class="m-list--body">
      <div class="m-list--row header"> 
        <div class="m-list--cell" v-for="f in Fields" :key="f.id">
          {{$t(f.name)}}
        </div>
        <div class="m-list--actions"></div>
      </div>
      <div class="m-list--row" v-for="item in Items" :key="item.id"> 
        <div class="m-list--cell" v-for="f in Fields" :key="f.id">
          <span v-if="f.trans">{{$t(f.trans+'.'+item[f.field])}}</span> 
          <span v-else-if="f.url">
            <a :href="`https://otamerica.com/files/${item[f.field]}`" target="_blank">
              <span v-if="f.urlNameDin">{{$t(item[f.urlName])}}</span>
              <span v-else>{{$t(f.urlName)}}</span>
            </a>
          </span>
          <span v-else-if="f.icon">
            <MdiSvg v-if="item[f.field]=== 'PDF'"> {{ mdiFilePdfBox }} </MdiSvg>
            <MdiSvg v-else> {{ mdiMicrosoftExcel }} </MdiSvg>
          </span> 
          <span v-else-if="f.iconUrl && (item[f.field] || item['url'])">
            <a :href="`https://otamerica.com/files/${item[f.field]}`" target="_blank">
              <MdiSvg v-if="f.field === 'pdf' && (item['pdf'] ||  item['url'])"> {{ mdiFilePdfBox }} </MdiSvg>
              <MdiSvg v-if="f.field=== 'excel' && item['excel']"> {{ mdiMicrosoftExcel }} </MdiSvg>
            </a>
          </span> 
          <span v-else>{{item[f.field]}}</span> 
        </div>
        <div class="m-list--actions">
          <button data-btn="default circle" type="button" @click="editFunction(item.id)">
            <MdiSvg> {{ mdiPencilCircleOutline }} </MdiSvg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mdiPencilCircleOutline, mdiPlusCircleOutline, mdiFilePdfBox, mdiMicrosoftExcel } from "@mdi/js"

export default ({
  name:"List",
  props: {
    Items: Array,
    addFunction: Function,
    editFunction: Function,
    id: Number,
    Fields: Array,
    JustEdit: Boolean
  },
  data: () => ({
    mdiPencilCircleOutline,
    mdiPlusCircleOutline,
    mdiFilePdfBox,
    mdiMicrosoftExcel
  }),
})
</script>
