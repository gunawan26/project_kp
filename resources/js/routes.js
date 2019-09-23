import Vue from 'vue'
import Router from 'vue-router'


import Login from '@/js/components/Login';
import Home from '@/js/components/Home';
import History from '@/js/components/History';
import CreateOffer from '@/js/components/CreateOffer';
import App1 from '@/js/views/App1';
import Logindev from '@/js/components/dev/Login';
Vue.use(Router)


export default new Router({
    mode: 'history',
    // base: process.env.BASE_URL,
    routes: [{
            path: '/login',
            name: 'login',
            component: Login
        }, {
            path: '/home',
            name: 'home',
            component: Home
        }, {
            path: '/history',
            name: 'history',
            component: History
        }, {
            path: '/create-offer',
            name: 'create-offer',
            component: CreateOffer
        }, {
            path: '/app1',
            name: 'app1',
            component: App1
        }, {
            path: '/dev/login',
            component: Logindev
        },
        // {
        //     path: '/about',
        //     name: 'about',
        //     // route level code-splitting
        //     // this generates a separate chunk (about.[hash].js) for this route
        //     // which is lazy-loaded when the route is visited.
        //     component: () => import( /* webpackChunkName: "about" */ './views/About.vue')
        // }
    ]
})
