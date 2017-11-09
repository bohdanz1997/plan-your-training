import axios from 'axios'

export default {
    getAll() {
        return axios.get(`api/set/all`)
    },
    store(data) {
        return axios.post(`api/set`, data)
    },
    update(data) {
        return axios.put(`api/set/${data.id}`, data)
    },
    destroy(id) {
        return axios.delete(`api/set/${id}`)
    }
}