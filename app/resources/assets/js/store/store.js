import Vue from 'vue'
import Vuex from 'vuex'

import set from './modules/set'
import workout from './modules/workout'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        set,
        workout
    }
})