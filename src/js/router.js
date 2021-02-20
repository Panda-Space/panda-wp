import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    { path: '/', component: import(/* webpackChunkName: "home" */'./views/Home.vue') },
    { path: '/about', component: () => import(/* webpackChunkName: "about" */'./views/Example.vue') },
    {
      path: '/blog',
      component: Blog,
      children: [
        {path: 'page/:page_index', component: import(/* webpackChunkName: "blog" */'./views/Blog.vue')},
      ]
    },
    { 
      path: '/blog/:article_slug',
      component: (panda.body_class == 'error404')
        ? import(/* webpackChunkName: "error404" */'./views/404.vue')
        : import(/* webpackChunkName: "article" */'./views/Article.vue')
    },
    { path: '/search', component: import(/* webpackChunkName: "search" */'./views/Search.vue') },
    { path: '*', component: import(/* webpackChunkName: "error404" */'./views/404.vue') },
  ],
})
