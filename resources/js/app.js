require('./bootstrap');

window.Vue = require('vue');

Vue.component('master-component', require('./components/MasterComponent.vue').default);

const app = new Vue({
    el: '#app',
});