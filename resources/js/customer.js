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
        price: ''

    },
    mounted() {
        console.log('ROOM');
    },
    methods: {
        saveForm() {
            // alert('save');
            console.log('save clicked');
            console.log(this.name, this.capacity, this.description, this.type, this.price);
            let d = {
                name: this.name,
                capacity: this.capacity,
                description: this.description,
                type: this.type,
                price: this.price
            };

            axios.post('/rooms/save', d)
                .then(function (resp) {
                    console.log(resp.data);
                })
        },

        resetForm() {

            console.log('reset clicked');

            this.name = '';
            this.capacity = '';
            this.description = '';
            this.type = 'apartment';
            this.price = '';

        },

        computed: {
            pay: function () {
                return 111;
            }
        }
    }

});


