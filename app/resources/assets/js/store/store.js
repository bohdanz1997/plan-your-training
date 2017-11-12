import Vue from 'vue'
import Vuex from 'vuex'

import set from './modules/set'
import workout from './modules/workout'
import exercise from './modules/exercise'
import group from './modules/group'
import user from './modules/user'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        set,
        workout,
        exercise,
        group,
        user
    }
})