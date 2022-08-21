require('./bootstrap');
window.Vue = require('vue').default;
import Datepicker from 'vuejs-datepicker';
const app = new Vue({
    el: '#app',
    components: {
        Datepicker
    }
});
