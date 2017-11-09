import api from '../../api/set'
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
                    commit(types.RECEIVE_SETS, {
                        sets: response.data
                    })
                    resolve()
                })
            })
        },
        add: ({ commit }, set) => {
            return new Promise((resolve, reject) => {
                api.store(set).then(response => {
                    flash(response.data.message)

                    commit(types.STORE_SET_SUCCESS, {
                        set: response.data.set
                    })
                    resolve()
                })
            })
        },
        edit: ({ commit }, set) => {
            return new Promise((resolve, reject) => {
                api.update(set).then(response => {
                    flash(response.data.message)

                    commit(types.UPDATE_SET_SUCCESS, {
                        set: response.data.set
                    })
                    resolve()
                })
            })
        },
        remove: ({ commit }, id) => {
            return new Promise((resolve, reject) => {
                api.destroy(id).then(response => {
                    flash(response.data.message)

                    commit(types.DESTROY_SET_SUCCESS, {
                        id: id
                    })
                    resolve()
                })
            })
        }
    },
    mutations: {
        [types.RECEIVE_SETS](state, { sets }) {
            state.items = sets
        },
        [types.STORE_SET_SUCCESS](state, { set }) {
            state.items.push(set)
        },
        [types.UPDATE_SET_SUCCESS](state, { set }) {
            Vue.set(state.items, state.items.indexOf(set), set)
        },
        [types.DESTROY_SET_SUCCESS](state, { id }) {
            let el = state.items.find(i => i.id === id)
            state.items.splice(state.items.indexOf(el), 1)
        }
    }
}