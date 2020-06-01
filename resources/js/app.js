/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//moment js
import {filter} from './filter'
//image

//vuex

import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from "./store/index"
const store=new Vuex.Store(
  storeData
)
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import { routes } from './routes';


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/Adminmaster.vue').default);


//V-form
import { Form, HasError, AlertError } from 'vform'


Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form;
//sweet alert
import Swal from 'sweetalert2'
window.Swal=Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast=Toast

const router = new VueRouter({
     routes,
     mode:'hash',
  })



const app = new Vue({
    el: '#app',
    router,
    store
});
