require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter)

Vue.component('master-component', require('./components/MasterComponent.vue').default);

const routes = [
    { path: '/test', component: require('./components/TestComponent.vue').default },
    { path: '/dashboard', component: require('./components/DashboardComponent.vue').default },
]

const router = new VueRouter({
    routes, 
    mode:'history'
})


const app = new Vue({
    el: '#app',
    router
});