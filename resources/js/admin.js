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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const admin_booking = new Vue({
    el: '#admin_booking',
    data: {
        room_id: '',
        user_id: '',
        no_adults: '',
        comments: '',
        check_in: '',
        check_out: '',
        status: '',
        price: ''
    },
    components: {
        vuejsDatepicker
    },
    mounted() {
        console.log('admin booking mounted');
    },
    methods: {

        fetchTotal() {
            let vm = this;
            let d = {
                room_id: this.room_id,
                check_in: this.check_in,
                check_out: this.check_out
            };

            axios.post('/booking/fetchTotal', d)
                .then(function (resp) {
                    vm.room = resp.data;
                    console.log(resp.data);
                    vm.price = resp.data.price;
                })

        },
        saveForm() {
            // alert('save');
            let vm = this;

            let d = {
                user_id: this.user_id,
                check_in: this.check_in,
                check_out: this.check_out,
                comments: this.comments,
                room_id: this.room_id,
                no_adults: this.no_adults,
                price: this.price
            };
            console.log(d);

            if (this.isValid()) {
                axios.post('/admin_booking', d)
                    .then(function (resp) {
                        console.log(resp.data);
                        vm.status = resp.data.message;

                        setTimeout(function () {
                            vm.status = '';
                        }, 5000)
                    })
            }
        },

        resetForm() {

            this.comments = '';
            this.no_adults = '';
            this.status = '';


        },

        isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        },

        isValid() {


            if (!this.isNumeric(this.user_id)) {
                alert('Please select a customer.');
                return false;
            }

            if (!this.isNumeric(this.room_id)) {
                alert('Please select a room.');
                return false;
            }

            if (this.check_in.length <= 0) {
                alert('Please select a check in date.');
                return false;
            }

            if (this.check_out.length <= 0) {
                alert('Please select a check out date.');
                return false;
            }


            if (!this.isNumeric(this.no_adults)) {
                alert('Please enter a number for no. of adults.');
                return false;
            }

            if (!this.isNumeric(this.price)) {
                alert('Please update the total first.');
                return false;
            }


            return true;


        },


    }
});
