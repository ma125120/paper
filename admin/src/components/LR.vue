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
      title:'教务管理系统',
      isPage:'/',
      links:[{
        title:'题目管理',
        lists:[{
          title: '题目审核',
          url:'/home/Topic'
        }]
      },{
        title:'教师管理',
        lists:[{
          title:'录入教师信息',
          url:'/home/TeacherUpload'
        },{
          title:'查看教师信息',
          url:'/home/TeacherInfo'
        }]
      },{
        title:'学生管理',
        lists:[{
          title:'录入学生信息',
          url:'/home/StudentUpload'
        },{
          title:'查看学生信息',
          url:'/home/StudentInfo'
        }]
      },{
        title:'公告管理',
        lists:[{
          title:'发布公告',
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
