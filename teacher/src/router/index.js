import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/components/Login'
import Home from '../pages/Home'

import Check from '../pages/Check'
import ChangePwd from '@/components/ChangePwd'
import UploadTopic from '../pages/UploadTopic'
import Topic from '../pages/Topic'
import Social from '../pages/Social'

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
	    	path: 'ChangePwd',
	      name: 'ChangePwd',
	      component: ChangePwd
	    },{
	    	path: 'UploadTopic',
	      name: 'UploadTopic',
	      component: UploadTopic
	    },{
        path: 'Topic',
        name: 'Topic',
        component: Topic
      },{
        path: 'Social',
        name: 'Social',
        component: Social
      }]
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
