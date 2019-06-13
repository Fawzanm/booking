/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Datepicker from 'vuejs-datepicker';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const main = new Vue({
    el: '#main',
    data: {
        rooms: [],
        check_in: '',
        check_out: ''
    },
    mounted() {
        this.getRooms();
    },
    components: {
        vuejsDatepicker
    },
    methods: {
        filterRooms() {
            console.log('Filtering rooms : ', this.check_in);
            var vm = this;

            let d = {check_in: this.check_in, check_out: this.check_out};

            if (this.isValid()) {
                axios.post('/rooms/free', d).then(function (resp) {
                    vm.rooms = resp.data;
                    console.log(resp.data);
                })
            }
        },

        getRooms() {

            var vm = this;

            axios.get('/rooms').then(function (resp) {
                vm.rooms = resp.data.rooms;
            })
        },

        checkInDate() {
            if (this.check_in !== '')
                return this.check_in.getFullYear() + "/" + (this.check_in.getMonth() + 1) + "/" + this.check_in.getDate();

            return '';
        },

        checkOutDate() {

            if (this.check_out !== '')

                return this.check_out.getFullYear() + "/" + (this.check_out.getMonth() + 1) + "/" + this.check_out.getDate();

            return '';

        },

        isValid() {

            if (this.check_in.length <= 0) {
                alert('Please select a check in date first.');

                return false;
            }

            if (this.check_out.length <= 0) {
                alert('Please select a check out date first.');

                return false;
            }


            return true;
        }

    }
});



