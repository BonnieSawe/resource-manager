import Vue from 'vue'
import Router from 'vue-router'

//home
import Home from './views/Home';
import Snippets from './views/snippets/Index';
import NewSnippet from './views/snippets/New';
import AllSnippets from './views/snippets/All';
import ViewSnippet from './views/snippets/ViewSnippet';

//files
import Files from './views/files/Index';
import NewFile from './views/files/New';
import AllFiles from './views/files/All';
import ViewFile from './views/files/ViewFile';

//files
import Links from './views/links/Index';
import NewLink from './views/links/New';
import AllLinks from './views/links/All';
import ViewLink from './views/links/ViewLink';

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/snippets',
            component: Snippets,
            children: [
                {
                    path: '',
                    name: 'snippets',
                    component : AllSnippets,
                },
                {
                    path: 'create',
                    name: 'new-snippet',
                    component : NewSnippet,
                },
                {
                    path: 'view/:id',
                    props:true,
                    name: 'view-snippet',
                    component : ViewSnippet,
                },
            ],
        },

        {
            path: '/files',
            component: Files,
            children: [
                {
                    path: '',
                    name: 'files',
                    component : AllFiles,
                },
                {
                    path: 'create',
                    name: 'new-file',
                    component : NewFile,
                },
                {
                    path: 'view/:id',
                    props:true,
                    name: 'view-file',
                    component : ViewFile,
                },
            ],
        },

        {
            path: '/links',
            component: Links,
            children: [
                {
                    path: '',
                    name: 'links',
                    component : AllLinks,
                },
                {
                    path: 'create',
                    name: 'new-link',
                    component : NewLink,
                },
                {
                    path: 'view/:id',
                    props:true,
                    name: 'view-link',
                    component : ViewLink,
                },
            ],
        }
    ]
})
