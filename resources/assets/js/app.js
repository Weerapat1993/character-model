
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('gallery-list', require('./components/Gallery/GalleryList.vue'));
Vue.component('gallery-input', require('./components/Gallery/GalleryInput.vue'));
Vue.component('gallery-form', require('./components/Gallery/GalleryForm.vue'));
Vue.component('gallery-item', require('./components/Gallery/GalleryItem.vue'));

Vue.component('nav-bar', require('./components/Layouts/NavBar.vue'));

const app = new Vue({
    el: '#app'
});
