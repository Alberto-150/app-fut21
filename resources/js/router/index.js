import { createApp } from 'vue';
import { createWebHistory, createRouter } from "vue-router";
import List from '../components/pages/List.vue'
import DetailPlayer from '../components/pages/DetailPlayer.vue'

let app = createApp({});

var routes = [
    {
      path: '/',
      component: List,
      name: 'list',
    },
    {
      path: '/detail',
      component: DetailPlayer,
      name: 'player.detail',
      props: true
    },
  ];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router