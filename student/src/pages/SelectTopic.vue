<template>
  <div class="student-info">
    <Title>查看毕设题目</Title>
    <b-table :fields="options" :items="topics" hover>

      <template slot="index" slot-scope="data">
        {{data.index + 1}}
      </template>
      
      <template slot="status" slot-scope="data">
        <div :class="{
                  'error':data.item.status==0
                }">
          {{data.item.status==0?'未审核':'审核通过'}}
        </div>
      </template>

      <template slot="student" slot-scope="data">
        {{data.item.student||'无'}}
      </template>
      
      <template slot="options" slot-scope="data">
        <b-button @click="selectTopic(data.item.id)" 
                  variant="primary"
                  :disabled="data.item.student!=''">选中课题</b-button>
      </template>

    </b-table>

<!--     <b-modal  title="修改信息" ref="editModal"
              @ok="editSure"
              @cancel="cancel">
      <b-row class="my-el">
        <b-col sm="2"><label for="input-username">学号/职工号:</label></b-col>
        <b-col sm="10">
          <b-form-input id="input-username" size="md" v-model="current.username" type="text" placeholder="输入账号"></b-form-input>
        </b-col>
      </b-row>
      <b-row class="my-el">
        <b-col sm="2"><label for="input-username">姓名:</label></b-col>
        <b-col sm="10">
          <b-form-input id="input-username" size="md" v-model="current.real_name" type="text" placeholder="输入密码"></b-form-input>
        </b-col>
      </b-row>
    </b-modal>

    <b-modal  title="删除信息" ref="delModal"
              @ok="delSure"
              @cancel="cancel">
      确认删除该信息吗？
    </b-modal>
 -->
    <b-modal title="提示信息" ref="tip">
      {{msg}}
    </b-modal>
  </div>
</template>

<script>
import Vue from 'vue';

export default {
  name: 'Info',
  props:['title','type'],
  data () {
    return {
      msg:'',
      current:{
        username:'',
        real_name:''
      },
      delId:-1,
      page:0,
      size:10,
      options:[
        { key:'index',label:'序号'},
        { key:'title',label:'题目'},
        { key:'upload_user',label:'上传老师'},
        { key:'student',label:'所属学生'},
        { key:'status',label:'审核状态'},
        { key:'create_time',label:'上传时间'},
        { key:'options',label:'操作'}
      ],
      topics:[]
    }
  },
  methods:{
    getInfo(page=0,size=10) {
      this.$http.get(`/student/topic/getRealTopicByPage?page=${this.page}&size=${this.size}`)
      .then(({ data })=>{
        this.topics=data.data;
      }).catch(err=>{console.log(err)});
    },
    selectTopic(id) {
      this.$http.get(`/student/topic/selectTopic?id=${id}`)
      .then(({ data })=>{
        this.msg = data.msg;
        this.$refs.tip.show();
      }).catch(err=>{console.log(err)});
    }
  },
  mounted() {
    this.getInfo();
  }
}
</script>


<style scoped>

.my-btn {
  margin-top: 20px;
}

</style>
