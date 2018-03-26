<template>
  <div class="tabbar">
    <div class='title-bar'>太原工业学院自动化系{{title}}</div>
  </div>
</template>

<script>
import Vue from 'vue';
export default {
  name: 'Tabbar',
  data () {
    return {
      title:'教师系统'
    }
  },
  methods:{

  },
  created() {
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.tabbar {
  width:100%;
  background: #1f2d3d;
  line-height: 60px;
  color:#fff;
  text-align: left;
  padding-left: 32px;
  position: fixed;
  top:0;
  left:0;
  z-index:100;
}
</style>
