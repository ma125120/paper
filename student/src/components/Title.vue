<template>
  <div class="title">
    <slot></slot>
  </div>
</template>

<script>
import Vue from 'vue';
export default {
  name: 'Title',
  data () {
    return {
      title:'教务管理系统'
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
.title {
  border-left:6px solid #007BFF;
  padding-left:36px;
  margin-bottom: 32px;
  border-radius: 6px;
  color:#000;
  font-weight: 500;
  line-height: 3em;
  background: rgba(0,0,0,.05);
}
</style>
