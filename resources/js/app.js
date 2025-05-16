/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard-component', require('./components/Dashboard/DashboardComponent.vue').default);
Vue.component('addblog-component', require('./components/Dashboard/AddBlogComponent.vue').default);
Vue.component('updateblog-component', require('./components/Dashboard/UpdateModalComponent.vue').default);
Vue.component('home-component', require('./components/LandingPage/HomeComponent.vue').default);
Vue.component('about-component', require('./components/LandingPage/AboutComponent.vue').default);
Vue.component('categories-component', require('./components/LandingPage/CategoriesComponent.vue').default);
Vue.component('login-component', require('./components/Modals/LoginModalComponent.vue').default);
Vue.component('signin-component', require('./components/Modals/SignInModalComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileModal/ProfileComponent.vue').default);
Vue.component('beaches-component', require('./components/BeachesComponent.vue').default);
Vue.component('waterfalls-component', require('./components/WaterfallsComponent.vue').default);
Vue.component('mountainclimbing-component', require('./components/MountainClimbingComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
