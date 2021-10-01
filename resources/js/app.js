require('./bootstrap');
import Vue from 'vue';
import router from './Router/router'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


import App from './App'
new Vue({
    router,
    el: '#app',
    render: h => h(App)
})
