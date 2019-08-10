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
import 'jquery/dist/jquery.min.js'
import 'jquery/dist/jquery.js'

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


  $(document).ready(function() {
    // document is loaded and DOM is ready
    $(".se-pre-con").fadeOut("slow");
});


  /**
    * Disable right-click of mouse, F12 key, and save key combinations on page
    * By Arthur Gareginyan (arthurgareginyan@gmail.com)
    * For full source code, visit https://mycyberuniverse.com
    */
  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      // if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
      //   disabledEvent(e);
      // }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };