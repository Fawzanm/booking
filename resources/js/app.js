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
        name: '',
        capacity: '',
        description: '',
        type: 'apartment',
        price: '',
        status: ''

    },

    methods: {
        saveForm() {
            // alert('save');
            let vm = this;
            let d = {
                name: this.name,
                capacity: this.capacity,
                description: this.description,
                type: this.type,
                price: this.price
            };

            if (this.isValid()) {
                axios.post('/rooms/save', d)
                    .then(function (resp) {
                        vm.status = resp.data.message;
                    })
            }
        },

        resetForm() {

            this.name = '';
            this.capacity = '';
            this.description = '';
            this.type = 'apartment';
            this.price = '';
            this.status = '';

        },

        isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        },

        isValid() {


            if (this.name.length <= 0) {
                alert('Please enter a name for the room.');
                return false;
            }

            if (this.description.length <= 0) {
                alert('Please enter a description for the room.');
                return false;
            }

            if (!this.isNumeric(this.capacity)) {
                alert('Please enter a number for capacity.');
                return false;
            }

            if (!this.isNumeric(this.price)) {
                alert('Please enter a number for price.');
                return false;

            }


            return true;

        }

    }

});


