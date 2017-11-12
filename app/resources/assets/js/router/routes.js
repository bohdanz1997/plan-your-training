import Track from '../components/workout/Track.vue'
import WorkoutStart from '../components/workout/WorkoutStart.vue'
import Login from '../components/auth/Login.vue'
import Home from '../components/Home.vue'

export default [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/workout_start',
        name: 'workout_start',
        component: WorkoutStart
    },
    {
        path: '/workout',
        name: 'workout',
        component: Track
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    }
]