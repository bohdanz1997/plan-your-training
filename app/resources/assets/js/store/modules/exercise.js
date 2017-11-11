import api from '../../api/exercise'
import * as types from '../mutation-types'

export default {
    namespaced: true,
    state() {
        return {
            items: []
        }
    },
    actions: {
        get: ({ commit }) => {
            return new Promise((resolve, reject) => {
                api.getAll().then(response => {
                    commit(types.RECEIVE_EXERCISES, {
                        items: response.data
                    })
                    resolve()
                })
            })
        },
        add: ({ commit }, item) => {
            return new Promise((resolve, reject) => {
                api.store(item).then(response => {
                    flash(response.data.message)

                    commit(types.STORE_SET_SUCCESS, {
                        item: response.data.set
                    })
                    resolve()
                })
            })
        }
    },
    mutations: {
        [types.RECEIVE_EXERCISES](state, { items }) {
            state.items = items
        },
        [types.STORE_EXERCISES_SUCCESS](state, { item }) {
            state.items.push(item)
        }
    }
}