
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const PlayersList = Vue.component('players-list', require('./components/Player/List.vue'));
const PlayerAdd = Vue.component('player-add', require('./components/Player/Add.vue'));
const PlayerEdit = Vue.component('player-edit', require('./components/Player/Edit.vue'));
const PlayerDelete = Vue.component('player-delete', require('./components/Player/Delete.vue'));

const routes = [
    { path: '/', component: PlayersList },
    { path: '/add', component: PlayerAdd },
    { path: '/:id/edit', component: PlayerEdit, props: true },
    { path: '/:id/delete', component: PlayerDelete, props: true },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

const app = new Vue({
    router,
    el: '#app',
});
