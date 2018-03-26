<template>
  <div class="home ">
    <Tabbar></Tabbar>
    <LR>
      <transition name="scale" mode="out-in">
        <router-view class='right' @changeModal="setTitle"></router-view>
      </transition>
    </LR>

    <b-modal ref="modalRef" id="modal1" title="提示信息">
      <p class="my-4">{{msg}}</p>
    </b-modal>
  </div>
</template>

<script>
import Vue from 'vue';
import Tabbar from '../components/Tabbar.vue';
import LR from '../components/LR.vue';
import axios from 'axios';
export default {
  name: 'Home',
  components:{
    Tabbar,
    LR
  },
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
    setTitle(msg) {
      this.msg=msg;
      this.$refs.modalRef.show();
    }
  },
  created() {
    var token = window.localStorage.token||'',
        t=this;
    if(token) {
      this.$http.get(`/admin/user/verifyToken?token=${token}`)
      .then(res=>{
        if(res.data.msg) {
          axios.defaults.headers.token = token;
        } else {
          t.$router.replace('/');
        }
      }).catch(err=>{
        //console.log(err);
        t.$router.replace('/');
      })
    } else {
      t.$router.replace('/');
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.right {
  flex:1;
  padding: 60px;
  text-align: left;
  //background: #F1F2F7;
}
</style>
