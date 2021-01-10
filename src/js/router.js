import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router)

import Home from './views/Home.vue';
import Example from './views/Example.vue';
import Blog from './views/Blog.vue';
// import Archive from './views/Archive.vue';
import Article from './views/Article.vue';
import Search from './views/Search.vue';
import Error404 from './views/404.vue';

export default new Router({
  mode: 'history',
  routes: [
    {path: '/', component: Home},
    {path: '/about', component: Example},
    {
      path: '/blog',
      component: Blog,
      children: [
        {path: 'page/:page_index', component: Blog},
      ]
    },
    {path: '/blog/:article_slug', component: (panda.body_class == 'error404') ? Error404 : Article},
    {path: '/search', component: Search},
    {path: '*', component: Error404},
  ],
})
