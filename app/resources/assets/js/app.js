require('./bootstrap')

import Vue from 'vue'
import Sidebar from './components/widgets/Sidebar.vue'
import Track from './components/workout/Track.vue'
import List from './components/exercise/List.vue'
import Flash from './components/widgets/Flash.vue'

import store from './store/store'

new Vue({
    el: '#app',
    store,
    components: {
        Sidebar,
        TrackEx: Track,
        List,
        Flash
    }
})
