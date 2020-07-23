/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';

import vue from 'vue';
window.Vue = vue;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import embedMap from './components/EmbedMap';
import saveShops from './components/SaveShops';
import shopsList from './components/ShopsList';

Vue.component(embedMap.name, embedMap);
Vue.component(saveShops.name, saveShops);
Vue.component(shopsList.name, shopsList);

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            myPosition: new google.maps.LatLng(44.5345474, 18.6813046),
            arrayOfPlaces: []
        };
    },
    computed: {
        isSavingEnabled: function () {
            return this.arrayOfPlaces.length > 0;
        }
    },
    methods: {
        listOfPlacesUpdated: function (newArray) {
            this.arrayOfPlaces = newArray;
        }
    }
});
