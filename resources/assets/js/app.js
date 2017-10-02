
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.today = function() {
    var date = new Date();
    if (date.getHours() > 16)
        date.setDate(date.getDate()+1);
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    if (day < 10) day = "0"+day;
    if (month < 10) month = "0"+month;
    return year+"-"+month+"-"+day;
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('todo', require('./components/Todo.vue'));

const app = new Vue({
    el: '#app'
});
