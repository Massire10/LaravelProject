/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import auth from "./middleware/auth";

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import axios from 'axios';
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

Vue.prototype.$axios = axios;
Vue.prototype.api_url = 'http://127.0.0.1:8000/api';


//Vue.component('home-component', require('./components/HomeComponent.vue').default);
import Home from './components/HomeComponent.vue';
import Contact from './components/ContactComponent.vue';
import Login from './components/Login.vue';
import Recipes from './components/recipes/RecipeListComponent.vue';
import AdminRecipes from './components/recipes/admin/RecipesListAdminComponent.vue';
import Ajout from './components/recipes/RecipeAddComponent.vue';
import login from "./middleware/login";

const routes = [
    {
        path: '/',
        redirect: '/home'
    },
    {
        path: '/ajout',
        name: 'ajout',
        component: Ajout,
        meta: {
            middleware: auth
        },
    },
    {
        path: '/home',
        name: 'home',
        component: Home,
        meta: {
            middleware: auth
        },
    },
    {

        path: '/recettes',
        name: 'recette',
        component: Recipes,
        meta: {
            middleware: auth
        },
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
        meta: {
            middleware: auth
        },
    },
    {
        path: '/admin/recettes',
        name: 'recetteadmin',
        component: AdminRecipes,
        meta: {
            middleware: auth
        },
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            middleware: login
        },
    }
];

const router = new VueRouter({
    routes
});

// Creates a `nextMiddleware()` function which not only
// runs the default `next()` callback but also triggers
// the subsequent Middleware function.
function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index]
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters)
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index1)
        subsequentMiddleware({ ...context, next: nextMiddleware })
    }
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware]

        const context = {
            from,
            next,
            router,
            to
        }
        const nextMiddleware = nextFactory(context, middleware, 1)

        return middleware[0]({ ...context, next: nextMiddleware })
    }

    return next()
})

const app = new Vue({
    el: '#app',
    router: router
});

