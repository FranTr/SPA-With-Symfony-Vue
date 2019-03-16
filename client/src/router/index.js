/* eslint-disable */
import Vue from 'vue'
import Router from 'vue-router'
import store from '../store'
import HelloWorld from '../components/HelloWorld'
import Home from '../views/Home'
import Posts from '../views/Posts'
import Login from '../views/Login'

Vue.use(Router)

let router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/home',
      component: Home
    },
    {
      path: '/login',
      component: Login
    },
    { path: '*', redirect: '/home' },
    { path: '/posts',
      component: Posts,
      meta: { requiresAuth: true }
    },
    {
      path: '/hello',
      name: 'HelloWorld',
      component: HelloWorld
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (store.getters['security/isAuthenticated']) {
      next();
    } else {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      });
    }
  } else {
    next(); // make sure to always call next()!
  }
});

export default router;
