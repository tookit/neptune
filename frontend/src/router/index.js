import Vue from 'vue'
import Router from 'vue-router'
import NProgress from 'nprogress' // progress bar
import 'nprogress/nprogress.css' // progress bar style
import { constantRouterMap, asyncRouterMap } from '@/config/router.config'
const routes  = constantRouterMap.concat(asyncRouterMap);
Vue.use(Router)

NProgress.configure({ showSpinner: false })

const router =  new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior: () => ({ y: 0 }),
  routes: routes
})

// router hooks

router.beforeEach((to, from, next) => {

  NProgress.start() 
  next();

})

router.afterEach(() => {

  NProgress.done() 
})



export default  router