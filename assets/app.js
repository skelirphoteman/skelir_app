/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// start the Stimulus application


import Chart from 'chart.js/auto';

const $ = require('jquery');
import { createApp, Vue } from 'vue';
import App from './App/App.vue';

createApp(App).mount('#vue-app');
