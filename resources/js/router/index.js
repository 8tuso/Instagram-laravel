import { createRouter, createWebHashHistory } from "vue-router";

import PopPost from '../components/PopPost.vue';

const routes = [
  {
    path: '/p/:id',
    component: PopPost,
    props:true
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router