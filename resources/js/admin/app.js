/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Admin panel components
Vue.component('user-show-component', require('./components/user/Show.vue').default);
Vue.component('user-edit-component', require('./components/user/Edit.vue').default);
Vue.component('role-create-component', require('./components/role/create.vue').default);
Vue.component('role-edit-component', require('./components/role/Show.vue').default);
Vue.component('permission-create-component', require('./components/permission/create.vue').default);
Vue.component('permission-edit-component', require('./components/permission/Show.vue').default);
Vue.component('settings-component', require('./components/setting/Index.vue').default);

// Import link preview component
//import LinkPrevue from 'link-prevue';
Vue.component('link-prevue', require('../components/Linkprevue.vue').default);

// Import vForm components for dynamic form creation with validation.
import { Form, HasError, AlertError, AlertSuccess } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertSuccess.name, AlertSuccess);
window.Form = Form;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
