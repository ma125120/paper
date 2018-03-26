import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/components/Login'
import Home from '../pages/Home'

import Check from '../pages/Check'
import TeacherUpload from '../pages/TeacherUpload';
import StudentUpload from '../pages/StudentUpload';
import StudentInfo from '../pages/StudentInfo';
import TeacherInfo from '../pages/TeacherInfo';
import Notice from '../pages/Notice';
import Topic from '../pages/Topic';

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },{
    	path: '/Home',
      name: 'Home',
      component: Home,
      meta: { requiresAuth: true },
      children:[{
	    	path: 'Check',
	      name: 'Check',
	      component: Check
	    },{
	    	path: 'TeacherUpload',
	      name: 'TeacherUpload',
	      component: TeacherUpload
	    },{
	    	path: 'StudentUpload',
	      name: 'StudentUpload',
	      component: StudentUpload
	    },{
	    	path: 'StudentInfo',
	      name: 'StudentInfo',
	      component: StudentInfo
	    },{
	    	path: 'TeacherInfo',
	      name: 'TeacherInfo',
	      component: TeacherInfo
	    },{
	    	path: 'Notice',
	      name: 'Notice',
	      component: Notice
	    },{
	    	path: 'Topic',
	      name: 'Topic',
	      component: Topic
	    },]
    },
  ]
})
// .beforeEach((to, from, next) => {
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     // this route requires auth, check if logged in
//     // if not, redirect to login page.
//     if (!auth.loggedIn()) {
//       next({
//         path: '/login',
//         query: { redirect: to.fullPath }
//       })
//     } else {
//       next()
//     }
//   } else {
//     next() // 确保一定要调用 next()
//   }
// })
