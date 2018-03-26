<template>
  <div class="student-info">
    <Title>修改密码</Title>
    <b-row class="my-el">
        <b-col sm="2"><label for="old_pwd">原始密码:</label></b-col>
        <b-col sm="10">
          <b-form-input id="old_pwd" size="md" v-model="old_pwd" type="text" placeholder="输入原始密码"></b-form-input>
        </b-col>
    </b-row>
    <b-row class="my-el">
        <b-col sm="2"><label for="new_pwd">新密码:</label></b-col>
        <b-col sm="10">
          <b-form-input id="new_pwd" size="md" v-model="new_pwd" type="text" placeholder="输入新密码"></b-form-input>
        </b-col>
    </b-row>
    <b-row class="my-el">
        <b-col sm="2"><label for="new_pwd1">确认新密码:</label></b-col>
        <b-col sm="10">
          <b-form-input id="new_pwd1" size="md" v-model="new_pwd1" type="text" placeholder="输入新密码"></b-form-input>
        </b-col>
    </b-row>
    <b-row class="my-el">
        <b-col sm="2"></b-col>
        <b-col sm="10">
          <b-button variant="primary" 
              @click="submit"
              class="my-btn col-md-2">提交</b-button>
        </b-col>
    </b-row>
  </div>
</template>

<script>
import Vue from 'vue';

export default {
  name: 'Info',
  props:['title','type'],
  data () {
    return {
      old_pwd:'',
      new_pwd:'',
      new_pwd1:''
    }
  },
  methods:{
    submit() {
      this.checkPwd();
      this.sendForm();
    },
    checkPwd() {
      if(this.new_pwd != this.new_pwd1) {
        this.$emit("changeModal","新密码不一致，请检查");
        throw new Error("pwd");
      }
    },
    sendForm() {
      var data = {
        old_pwd:this.old_pwd,
        new_pwd:this.new_pwd,
        new_pwd1:this.new_pwd1
      };
      this.$http.post(`/teacher/changePwd`,data)
      .then(res=>{
        this.$emit("changeModal",res.data.msg);
      }).catch(err=>{console.log(err)});
    }
  },
  mounted() {
    //this.getInfo();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.my-btn {
  margin-top: 20px;
}

</style>
