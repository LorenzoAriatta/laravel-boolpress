/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//const { result } = require('lodash');

require('./bootstrap');

window.axios = require('axios');
window.axios.default.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.get('/api/posts').then(results => {
    console.log(results);
}).catch(e => {
    console.log(e);
})

window.Vue = require('vue');

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//AppComponent = require('./app/AppComponent.vue').default;

import AppComponent from './app/AppComponent.vue';

import router from './routes';

const app = new Vue({
    el: '#app',
    render: (createElement) => createElement(AppComponent),
    router
});

console.log(app);
