import axios from 'axios'

export default {
    getAll() {
        return axios.get(`api/exercise/all`)
    },
    store(data) {
        return axios.post(`api/exercise`, data)
    }
}