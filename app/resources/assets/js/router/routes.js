import Track from '../components/workout/Track.vue'
import WorkoutStart from '../components/workout/WorkoutStart.vue'
import Login from '../components/auth/Login.vue'

export default [
    { path: '/workout_start', component: WorkoutStart },
    { path: '/workout', component: Track },
    { path: '/login', component: Login }
]