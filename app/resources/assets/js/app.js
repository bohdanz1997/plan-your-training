require('./bootstrap')

import Vue from 'vue'

import store from './store/store'
import router from './router/router'

import Sidebar from './components/widgets/Sidebar.vue'
import Flash from './components/widgets/Flash.vue'

new Vue({
    el: '#app',
    store,
    router,
    components: {
        Sidebar,
        Flash
    }
})
