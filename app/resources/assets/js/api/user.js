import axios from 'axios'

export default {
    getAuthUser() {
        return axios.get('api/user/auth')
    }
}