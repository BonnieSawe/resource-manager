require('./bootstrap');
import Vue from 'vue';
import router from './router'
import store from './store';
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

// Vue component registration
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
/*Vue.component('example-component', require('./components/ExampleComponent.vue').default);*/


import App from './App'
new Vue({
    store,
    router,
    el: '#app',
    render: h => h(App)
})
