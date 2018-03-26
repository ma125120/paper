<template>
  <div class="login ">
    <b-card title="太原工业学院自动化系管理员系统"
            class='col-md-4 my-center'>
      <b-form-input v-model="form.username"
                  type="text"
                  class="login-el"
                  placeholder="账号"></b-form-input>
      <b-form-input v-model="form.password"
                  type="password"
                  class="login-el"
                  placeholder="密码"></b-form-input>
      <b-button @click="login" variant="primary"
                class="login-el col-md-12"
                >登录</b-button>
    </b-card>

    <b-modal ref="myModalRef" id="modal1" title="提示信息">
      <p class="my-4">{{msg}}</p>
    </b-modal>
  </div>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';

export default {
  name: 'Login',
  data () {
    return {
      form:{
        username:"",
        password:""
      },
      msg:'登陆成功!'
    }
  },
  methods:{
    login() {
      var t=this;
      t.$http.post(`/admin/login`,
        t.form)
      .then(({ data })=>{
        if(data.token) {
          t.success(data)
        } else {
          t.fail(data);
        }
      }).catch(err=>{
        console.log(err);
      })
    },
    success(data) {
      this.msg='登陆成功!1s后跳转至新页面！';
      this.$refs.myModalRef.show();
      window.localStorage.token=data.token;
      axios.defaults.headers.token = data.token;
      setTimeout(()=>{
        this.$router.replace('/home');
      },1000);
    },
    fail(data) {
      this.msg=data.msg;
      this.$refs.myModalRef.show();
    }
  },
  created() {
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.login {
  min-height: 100vh;
  background: #1f2d3d;
  padding-top:10%;
}
.login-el {
  margin-top:32px;
}
</style>
