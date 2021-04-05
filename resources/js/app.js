/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);


//Vue.component('home-component', require('./components/HomeComponent.vue').default);
import Home from './components/HomeComponent.vue';
import Contact from './components/ContactComponent.vue';
import Recipes from './components/recipes/RecipeListComponent.vue';

const routes = [
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {

        path: '/recettes',
        name: 'recette',
        component: Recipes
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router: router
});

