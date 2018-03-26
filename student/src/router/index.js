import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/components/Login'
import Home from '../pages/Home'

// import Check from '../pages/Check'
// import ChangePwd from '@/components/ChangePwd'
// import SelectTopic from '../pages/SelectTopic'
// import Topic from '../pages/Topic'
//import Social from '../pages/Social'

const Check = () => import('../pages/Check')
const ChangePwd = () => import('@/components/ChangePwd')
const SelectTopic = () => import('../pages/SelectTopic')
const Topic = () => import('../pages/Topic')
const Social = () => import('../pages/Social')

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
	    	path: 'SelectTopic',
	      name: 'SelectTopic',
	      component: SelectTopic
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
