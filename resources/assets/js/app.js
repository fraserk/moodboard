var Vue = require('Vue');
var vueResource = require('vue-resource');
Vue.use(vueResource);
window.Vue = Vue;
require('./components/bootstrap');

new Vue({
  el : '#app-layout',
});
