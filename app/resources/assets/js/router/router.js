import Vue from 'vue'
import VueRouter from 'vue-router'

import Track from '../components/workout/Track.vue'
import WorkoutStart from '../components/workout/WorkoutStart.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/workout_start', component: WorkoutStart },
    { path: '/workout', component: Track }
]

export default new VueRouter({
    routes
})