import api from '../../api/group'
import * as types from '../mutation-types'

export default {
    namespaced: true,
    state() {
        return {
            items: [],
            selected: {}
        }
    },
    getters: {
        exercisesByGroup(state) {
            const found = state.items
                .find(elem => elem.id === state.selected.id)

            if (found) {
                return found.exercises
            }

            return []
        }
    },
    actions: {
        get: ({ commit }) => {
            return new Promise((resolve, reject) => {
                api.getAll().then(response => {
                    commit(types.RECEIVE_GROUPS, {
                        items: response.data
                    })
                    resolve()
                })
            })
        }
    },
    mutations: {
        [types.RECEIVE_GROUPS](state, { items }) {
            state.items = items
        },
        changeSelected(state, { item }) {
            state.selected = item
        }
    }
}