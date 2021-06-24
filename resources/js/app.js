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
require('../js/select2/select2.full');


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

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});

// generamos un evento click y keyup para cada elemento input con la clase .input
var input=document.querySelectorAll(".input");
input.forEach(function(e) {
    e.addEventListener("click",multiplica);
    e.addEventListener("keyup",multiplica);
});
 
// funcion que genera la multiplicacion
function multiplica() {
 
    // nos posicionamos en el tr del producto
    var tr=this.closest("tr");
 
    var total=1;
 
    // recorremos todos los elementos del tr que tienen la clase .input
    var inputs=tr.querySelectorAll(".input");
    inputs.forEach(function(e) {
        total*=e.value;
    });
 
    // mostramos el total con dos decimales
    tr.querySelector(".total").value=total.toFixed(2);
 
    // indicamos que calcule el total
    calcularTotal(this.closest("table"));
}
 
// funcion que calcula la suma total de los productos
function calcularTotal(e) {
    var total=0;
 
    // obtenemos todos los totales y los sumamos
    var totales=e.querySelectorAll(".total");
    totales.forEach(function(e) {
        total+=parseFloat(e.value);
    });
 
    // mostramos la suma total con dos decimales
    e.getElementsByClassName("totales")[0].value=total.toFixed(2);
}

function pruebaDivAPdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#imprimir')[0];

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            source, 
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, 
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Prueba.pdf');
            }, margins
        );
    }