
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';

if(API_TOKEN) {
    window.axios.defaults.headers.common['Authorization'] = 'Bearer '+API_TOKEN;
}

window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (error.response) {
            switch (error.response.status) {
                case 401:
                    location.href = './login'
            }
        }
        return Promise.reject(error.response.data) 
    });

window.axios.defaults.baseURL = './api/';
Vue.prototype.$http = window.axios;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './routes';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

function twoDigit(d) {
    return d<10?'0'+d:d;
}

function formatDate(date) {
    return date.getFullYear() + '/' + 
        twoDigit(date.getMonth() + 1) + '/' + 
        twoDigit(date.getDate()) + ' ' + 
        twoDigit(date.getHours()) + ':' + 
        twoDigit(date.getMinutes()) + ':' + 
        twoDigit(date.getSeconds());
}

function dateOffset(val) {
    var time = new Date(val.replace(/-/g, '/')), _time = time.getTime(),
    offset = time.getTimezoneOffset();
    return new Date(_time - offset * 60 * 1000);
}

Vue.filter('dateOffset', function (value) {
    return formatDate(dateOffset(value));
})


const app = new Vue({
    el: '#app',
    router
});

export default app;