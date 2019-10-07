import Vue from 'vue'
import Router from 'vue-router'

import storeVuex from '@/js/store'
import Login from '@/js/components/Login';
import Home from '@/js/components/Home';
import History from '@/js/components/History';
import App1 from '@/js/views/App1';
import DokumenFile from '@/js/components/DokumenFile';
import PageNotFound from '@/js/components/PageNotFound';
import Navi from '@/js/components/Navi';

import Logindev from '@/js/components/dev/Login';
import CreateFile from '@/js/components/dev/CreateFile';
import HeaderFile from '@/js/components/dev/HeaderFile';



import store from './store';
import Vuebot from '@/js/components/dev/Vuebot';
Vue.use(Router)
Vue.use(storeVuex)


const router = new Router({
    mode: 'history',
    // base: process.env.BASE_URL,
    routes: [{
            path: '/login',
            name: 'login',
            component: Login
        }, {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                requiresAuth: true
            }
        }, {
            path: '/history',
            name: 'history',
            component: History
        }, {
            path: '/offer-document/:id_dokumen',
            name: 'offer-document',
            component: DokumenFile,
            meta: {
                requiresAuth: true
            }
        }, {
            path: '/app1',
            name: 'app1',
            component: App1
        }, {
            path: '/dev/login',
            component: Logindev
        }, {
            path: '/dev/createfile',
            component: CreateFile

        },
        {
            path: '/dev/vuebot',
            component: Vuebot
        },
        {
            path: '/navi',
            component: Navi
        },
        {
            path: '/dev/create-header',
            component: HeaderFile
        }
        // {
        //     path: "*",
        //     component: PageNotFound
        // },
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



router.beforeEach((to, from, next) => {





    if (to.path == '/login' && store.getters.isLoggedIn) {
        next('/');
    }
    if (to.matched.some(record => record.meta.requiresAuth)) {


        if (store.getters.isLoggedIn) {


            next();
            return
        }
        next('/login');
    } else {
        next();
    }
})

export default router
