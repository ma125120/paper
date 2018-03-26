<template>
  <div class="student-info">
    <Info type="student" title="学生"></Info>
  </div>
</template>

<script>
import Vue from 'vue';
import Info from '../components/Info.vue';

export default {
  name: 'StudentInfo',
  components:{
    Info
  },
  data () {
    return {

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

.my-btn {
  margin-top: 20px;
}
</style>
