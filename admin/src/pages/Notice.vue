<template>
  <div class="student-info">
    <Title>发布公告</Title>

    <b-row class="my-el">
        <b-col sm="2"><label for="input-username">标题:</label></b-col>
        <b-col sm="10">
          <b-form-input id="input-username" size="md" v-model="title" type="text" placeholder="输入标题"></b-form-input>
        </b-col>
    </b-row>
    <b-row class="my-el">
        <b-col sm="2"><label for="input">内容:</label></b-col>
        <b-col sm="10">
          <quill-editor v-model="content"
                ref="myQuillEditor"
                :options="editorOption"
                @blur="onEditorBlur($event)"
                @focus="onEditorFocus($event)"
                @ready="onEditorReady($event)">
          </quill-editor>
        </b-col>
    </b-row>
    <b-row class="my-el">
        <b-col sm="2"></b-col>
        <b-col sm="10">
          <b-button variant="primary" 
              @click="upload"
              class="my-btn col-md-2">提交</b-button>
        </b-col>
    </b-row>
    
  </div>
</template>

<script>
import Vue from 'vue';

export default {
  name: 'TeacherInfo',
  data () {
    return {
      content:'',
      title:'',
      editorOption: {
          // some quill options
      }
    }
  },
  methods:{
    upload() {
      var form = {
        title:this.title,
        content:this.content,
        upload_user:'管理员'
      };
      this.$http.post(`/admin/notice/upload`,form)
      .then(res=>{
        this.$emit("changeModal", res.data.msg);
      }).catch(err=>{console.log(err)});
      console.log(this.content)
    },
    onEditorBlur(quill) {
      console.log('editor blur!', quill)
    },
    onEditorFocus(quill) {
      console.log('editor focus!', quill)
    },
    onEditorReady(quill) {
      console.log('editor ready!', quill)
    },
    onEditorChange({ quill, html, text }) {
      console.log('editor change!', quill, html, text)
      this.content = html;
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
