<template>
  <div class="student-info">
    <Info type="teacher" title="教师"></Info>
  </div>
</template>

<script>
import Vue from 'vue';
import Info from '../components/Info.vue';

export default {
  name: 'TeacherInfo',
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
