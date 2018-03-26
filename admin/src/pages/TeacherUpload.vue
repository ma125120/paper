<template>
  <div class="teacher-upload">
    <Title>录入教师信息</Title>
    <b-form-file v-model="file" 
                :state="Boolean(file)" 
                placeholder="请选择文件，文件名不能含有中文"
                class="col-md-4"
      ></b-form-file>
    <div class="mt-3">所选择的的文件为: {{file && file.name}}</div>
    <b-button variant="primary" 
              @click="upload"
              class="my-btn col-md-2">提交</b-button>
  </div>
</template>

<script>
import Vue from 'vue';

export default {
  name: 'TeacherUpload',
  data () {
    return {
      file:null
    }
  },
  methods:{
    upload() {
      var form=new FormData();
      form.append('file',this.file);
      this.$http.post(`/admin/teacher/upload`,form,{
        headers:{
          'Content-Type':'application/x-www-form-urlencoded'
        }
      })
      .then(res=>{
        this.$emit("changeModal",res.data.msg);
      }).catch(err=>{
        console.log(err);
      })
    }
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
