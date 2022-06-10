import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent'
import BlogComponent from './pages/BlogComponent'
import WhoWeAreComponent from './pages/WhoWeAreComponent'
import NotFoundComponent from './pages/NotFoundComponent'
import ContactsComponent from './pages/ContactsComponent'
import SinglePostComponent from './pages/SinglePostComponent'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/', //ci indica quale percorso è associata la nostra rotta vue
            name: 'home',
            component: HomeComponent //è un componente, e lo andiamo a mettere dentro la cartella js/pages -> HomeComponent.vue
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComponent
        },
        {
            path: '/who-we-are',
            name: 'who-we-are',
            component: WhoWeAreComponent
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComponent
        },
        {
            path: '/blog/:id',
            name: 'single-post',
            component: SinglePostComponent
        },
        {
            path: '/*',
            name: 'notFound',
            component: NotFoundComponent
        },
    ]
})

export default router; //lo esportiamo per poterlo utilizzare
