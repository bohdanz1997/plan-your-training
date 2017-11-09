import axios from 'axios'

export default {
    store(data) {
        return axios.post(`api/workout`, data)
    },
}