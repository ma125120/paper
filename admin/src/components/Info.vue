<template>
  <div class="student-info">
    <Title>查看{{title}}信息</Title>
    <b-table :fields="options" :items="students" hover>

      <template slot="index" slot-scope="data">
        {{data.index + 1}}
      </template>

      <template slot="options" slot-scope="data">
        <b-button @click="edit(data.item.id,data.index)" variant="primary">编辑</b-button>
        <b-button @click="del(data.item.id)" variant="danger">删除</b-button>
      </template>

    </b-table>

    <b-modal  title="修改信息" ref="editModal"
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
      options:[
        { key:'index',label:'序号'},
        { key:'username',label:'学号/职工号'},
        { key:'real_name',label:'姓名'},
        { key:'options',label:'操作'}
      ],
      students:[]
    }
  },
  methods:{
    edit(id,index) {
      this.current = this.students.slice(0)[index];
      this.$refs.editModal.show();
    },
    del(id) {
      this.$refs.delModal.show();
      this.delId = id;
    },
    delSure(id) {
      this.$http.get(`/admin/${this.type}/delete?id=${this.delId}`)
      .then(({ data })=>{
        this.msg=data.msg;
        this.$refs.tip.show();
      }).catch(err=>{console.log(err)});
    },
    getInfo(page=0,size=10) {
      this.$http.get(`/admin/${this.type}/getInfoByPage?page=${page}&size=${size}`)
      .then(({ data })=>{
        this.students=data;
      }).catch(err=>{console.log(err)});
    },
    editSure() {
      var info = this.current;
      this.$http.get(`/admin/${this.type}/edit?id=${info.id}&username=${info.username}&real_name=${info.real_name}`)
      .then(({ data })=>{
        this.msg=data.msg;
        this.$refs.tip.show();
      }).catch(err=>{console.log(err)});
    },
    cancel() {
      this.current = null;
    }
  },
  mounted() {
    this.getInfo();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.my-btn {
  margin-top: 20px;
}

</style>
