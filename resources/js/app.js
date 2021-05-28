require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import Loading from 'vue-loading-overlay';
Vue.use(Loading);

 import ReadMore from 'vue-read-more';
  Vue.use(ReadMore);

import { Form, HasError, AlertError } from 'vform'
window.Form=Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


   

//sweetalert2
import Swal from 'sweetalert2'
window.swal = Swal

const ToastSuccess = Swal.mixin({
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
window.toastSuccess = ToastSuccess
//sweetalert2

//moment js
import moments from "moment";
Vue.filter('mydate', function (creted) {
    return moments(creted).format('MMMM Do YYYY, h:mm:ss a');
})
//moment js
Vue.use(VueRouter)


Vue.component('master-component', require('./components/MasterComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const routes = [
    
    { path: '/', component: require('./components/frontend/Home.vue').default },

    { path: '/about', component: require('./components/frontend/About.vue').default },
    { path: '/services', component: require('./components/frontend/Services.vue').default },
    { path: '/services-details/:id', component: require('./components/frontend/ServicesDetails.vue').default },
    { path: '/portfolio', component: require('./components/frontend/Portfolio.vue').default },
    { path: '/portfolio-details/:id', component: require('./components/frontend/PortfolioDetails.vue').default },
    { path: '/videos', component: require('./components/frontend/Videos.vue').default },
    { path: '/contact', component: require('./components/frontend/Contact.vue').default },

    //backend router
    { path: '/dashboard', component: require('./components/backend/DashboardComponent.vue').default },

    { path: '/home-page', component: require('./components/backend/HomePage.vue').default },

    { path: '/personal-info', component: require('./components/backend/aboutme/PersonalInfo.vue').default },
    { path: '/get-count', component: require('./components/backend/aboutme/GetCount.vue').default },
    { path: '/resume', component: require('./components/backend/aboutme/Resume.vue').default },

    { path: '/services-page', component: require('./components/backend/services/ServicesPage.vue').default },
    { path: '/add-new-services', component: require('./components/backend/services/NewServices.vue').default },
    { path: '/view-service/:id', component: require('./components/backend/services/ViewService.vue').default },
    { path: '/edit-service/:id', component: require('./components/backend/services/EditService.vue').default },

    { path: '/portfolio-category', component: require('./components/backend/portfolios/PortfolioCategory.vue').default },
    { path: '/portfolio-category-update/:id', component: require('./components/backend/portfolios/PortfolioCategoryUpdate.vue').default },

    { path: '/add-portfolio-category', component: require('./components/backend/portfolios/AddNewCategory.vue').default },
    { path: '/portfolio-list', component: require('./components/backend/portfolios/PortfolioList.vue').default },
    { path: '/add-portfolio', component: require('./components/backend/portfolios/AddNewPortfolio.vue').default },
    { path: '/portfolio-update/:id', component: require('./components/backend/portfolios/PortfolioUpdate.vue').default },
    { path: '/portfolio-view/:id', component: require('./components/backend/portfolios/PortfolioView.vue').default },

    { path: '/contact-info', component: require('./components/backend/contact/ContactInfo.vue').default },
    { path: '/contact-inbox', component: require('./components/backend/contact/Inbox.vue').default },
    { path: '/msg-view/:id', component: require('./components/backend/contact/MsgView.vue').default },


    { path: '/logo-setting', component: require('./components/backend/settings/Logo.vue').default },
    { path: '/menu-setting', component: require('./components/backend/settings/Menu.vue').default },
    { path: '/footer-info-setting', component: require('./components/backend/settings/FooterInfo.vue').default },
    { path: '/others-setting', component: require('./components/backend/settings/Others.vue').default },

    //backend router
]

const router = new VueRouter({
    routes,
    mode: "history",
    linkActiveClass: "active"
});


const app = new Vue({
    el: '#app',
    router,
});