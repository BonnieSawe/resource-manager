import Vue from 'vue'
import Router from 'vue-router'

import Home from '../views/Home';
import Snippets from '../views/Snippets';
import Links from '../views/Links';
import Files from '../views/Files';

Vue.use(Router)

export default new Router({
    routes: [
        {
        path: '/',
        name: 'home',
        component: Home,
        props:{home:true}
    }, 
    {
        path: '/snippets',
        name: 'snippets',
        component: Snippets
    }, 
    {
        path: '/files',
        name: 'files',
        component: Files
    },
    {
        path: '/links',
        name: 'links',
        component: Links
    },
]
})