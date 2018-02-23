import Axios from 'axios';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notification', require('./components/Notification.vue'));

const app = new Vue({
    el: '#app',
    data: {
        notifications: ''
    },
    created(){
        var userId = $('meta[name="userId"]').attr('content');
        axios.post('http://localhost/LibraryApp/public/notification/get').then(response=>{
            this.notifications=response.data;
        
        });

        
        Echo.private('App.User.'+ userId).notification((notification) => {
            console.log('asdasdasdads');
            this.notifications.push(notification);
        });
    }
});