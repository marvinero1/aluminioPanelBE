/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('../template/plugins/jquery/jquery.min.js');
require('../template/plugins/jquery-ui/jquery-ui.min.js');
require('../template/plugins/bootstrap/js/bootstrap.bundle.min.js');
//require('../template/plugins/moment/moment.min.js');
// require('../template/plugins/chart.js/Chart.min.js');WARNING moment.JS
require('../template/plugins/sparklines/sparkline.js');
require('../template/plugins/jqvmap/jquery.vmap.min.js');
require('../template/plugins/jqvmap/maps/jquery.vmap.usa.js');
require('../template/plugins/jquery-knob/jquery.knob.min.js');
//require('../template/plugins/daterangepicker/daterangepicker.js');
//require('../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
require('../template/plugins/summernote/summernote-bs4.min.js');
require('../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');
require('../template/dist/js/adminlte.js');
require('../template/dist/js/pages/dashboard.js');
require('../template/dist/js/demo.js');

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

const app = new Vue({
    el: '#app',
});