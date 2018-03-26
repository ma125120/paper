<template>
  <div class="LR">
    <aside class='left col-sm-4 col-md-2'>
      <dl>
        <div v-for="(link,index) in links">
          <dt :class="index==0?'c1':''">{{link.title}}</dt>
          <dd v-if="link.lists" 
              v-for="list in link.lists"
              :class="{
                'active':list.url==isPage
              }"
              @click="navTo(list.url)">
              {{list.title}}
          </dd>
        </div> 
      </dl>
    </aside>
    <slot class='right'></slot>
  </div>
</template>

<script>
import Vue from 'vue';
export default {
  name: 'LR',
  data () {
    return {
      isPage:'/',
      links:[{
        title:'个人信息',
        lists:[{
          title: '密码修改',
          url:'/home/ChangePwd'
        }]
      },{
        title:'题目管理',
        lists:[{
          title:'上传题目',
          url:'/home/UploadTopic'
        },{
          title:'查看信息',
          url:'/home/Topic'
        }]
      },{
        title:'互动关系',
        lists:[{
          title:'指导学生',
          url:'/home/Social'
        }]
      },{
        title:'成绩评定',
        lists:[{
          title:'查看信息',
          url:'/home/Notice'
        }]
      }]
    }
  },
  methods:{
    navTo(path) {
      this.isPage=path;
      this.$router.push(path);
    }
  },
  created() {
    
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.LR {
  display: flex;
  padding-top:60px;
  min-height: 100vh;
}
.left {
  text-align: left;
  background: #324057;
  color:#c0ccda;
}
.left dd:hover {
  cursor:pointer;
}
dd.active {
  color:#44b5df;
  font-weight:500;
}
dt {
  margin-top:12px;
  margin-bottom: 12px;
}
dd {
  text-indent: 2em;
  line-height: 2em;
}
.right {
  flex:1;
}
</style>
