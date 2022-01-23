import Vue from 'vue';
import Router from 'vue-router';
import RouterPrefetch from 'vue-router-prefetch';

Vue.use(Router)
Vue.use(RouterPrefetch)

import Home from './views/Home.vue';

export default new Router({
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
  mode: 'history',
  routes: [
    { 
      path: '/',
      component: Home,
      name: 'home',
    },
    {
      path: '/about',
      component: () => import(/* webpackChunkName: "about" */'./views/Example.vue'),
      name: 'about',
    },
    {
      path: '/example',
      component: () => import(/* webpackChunkName: "example" */'./views/Example.vue'),
      name: 'example',
    },
    {
      path: '/blog',
      component: () => import(/* webpackChunkName: "blog" */'./views/Blog.vue'),
      children: [
        { path: 'page/:page_index', component: () => import(/* webpackChunkName: "blog" */'./views/Blog.vue') },
      ],
      name: 'blog',
    },
    { 
      path: '/blog/:article_slug',
      component: () => (panda.body_class == 'error404')
        ? import(/* webpackChunkName: "error404" */'./views/404.vue')
        : import(/* webpackChunkName: "article" */'./views/Article.vue'),
    },
    {
      path: '/search',
      component: () => import(/* webpackChunkName: "search" */'./views/Search.vue'),
      name: 'search',
    },
    {
      path: '*',
      component: () => import(/* webpackChunkName: "error404" */'./views/404.vue'),
      name: '404',
    },
  ],
})
