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



const room = new Vue({
    el: '#room',
    data: {
        room_id: '',
        room: '',
        no_adults: '',
        comments: '',
        check_in: '',
        check_out: '',
        status: ''


    },
    mounted() {
        console.log('ROOM');
        this.room_id = document.getElementById('room_id').value;
        this.check_in = document.getElementById('from').value;
        this.check_out = document.getElementById('to').value;
        this.fetchRoom();

    },
    methods: {

        fetchRoom() {
            let vm = this;
            axios.get('/rooms/fetch?id=' + vm.room_id)
                .then(function (resp) {
                    vm.room = resp.data.room;
                })

        },

        saveForm() {
            // alert('save');
            let vm = this;

            let d = {
                check_in: this.check_in,
                check_out: this.check_out,
                comments: this.comments,
                room_id: this.room_id,
                no_adults: this.no_adults,
                price: this.pay
            };

            if (this.isValid()) {
                axios.post('/booking', d)
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

            if (!this.isNumeric(this.no_adults)) {
                alert('Please enter a number for no. of adults.');
                return false;
            }

            return true;


        },

        parseDate(str) {
            var mdy = str.split('/');
            return new Date(mdy[0], mdy[1] - 1, mdy[2]);
        },

        datediff(first, second) {
            // Take the difference between the dates and divide by milliseconds per day.
            // Round to nearest whole number to deal with DST.
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }

    },
    computed: {
        // a computed getter

        pay() {
            // `this` points to the vm instance
            let diff = this.datediff(this.parseDate(this.check_in), this.parseDate(this.check_out));
            return this.room.price * diff;
        }
    }

});
