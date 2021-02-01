import VueRouter from "vue-router";
import mainForm from './components/mainForm.vue';
import resumeFormAdd from './components/resumeFormAdd.vue';
const routes = [
  {
    path: '/',
    name: 'mainForm',
    component: mainForm
  },
  {
    path: '/add',
    name: 'Add',
    component: resumeFormAdd
  },
  {
    path: '/:id/edit',
    name: 'Edit',
    component: resumeFormAdd,
  },
  {
    path: "*",
    component: { render: (h) => h("div", ["404! Page Not Found!"]) },
  },
]

export default new VueRouter({
    mode: 'history',
    routes:routes,
});