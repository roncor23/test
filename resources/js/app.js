import 'es6-promise/auto'
import axios from 'axios'

window.axios = require('axios');
import './bootstrap'


import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
// import socket from './socket'  
import VueStripeCheckout from './stripe'
 
import swal from 'sweetalert';

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import 'bootstrap/dist/css/bootstrap.min.css'


import VModal from 'vue-js-modal'


//Set Vue Modal 
Vue.use(VModal, { dynamic: true, injectModalsContainer: true })
//Set VueStripe
Vue.use(VueStripeCheckout, 'pk_test_NVmSgXCEdFshqgAVEF6RR9my');
// Set Vuetify
Vue.use(Vuetify)
// Set Vue globally
window.Vue = Vue
// Set Vue router
Vue.router = router
Vue.use(VueRouter)
// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `/api`
// axios.defaults.baseURL = '/api'
Vue.use(VueAuth, auth)
// Load Index
Vue.component('index', Index)




const app = new Vue({
  el: '#app',
  router
});