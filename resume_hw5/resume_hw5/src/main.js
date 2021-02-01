import '@babel/polyfill'
import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueRouter from "vue-router";
import router from './route';

Vue.use(VueRouter);
Vue.use(axios);

new Vue({
	router,
  render: h => h(App),
}).$mount('#app');