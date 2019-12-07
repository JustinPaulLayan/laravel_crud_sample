require('./bootstrap');

window.Vue = require('vue');

import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post-table', require('./components/posts/table.vue').default);

const app = new Vue({
    el: '#app',
});
