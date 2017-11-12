import api from '../../api/user'
import * as types from '../mutation-types'

export default {
    namespaced: true,
    state() {
        return {
            userData: {}
        }
    },
    getters: {
        user(state) {
            if (state.userData === null ||
                state.userData === undefined ||
                Object.keys(state.userData).length === 0) {
                return null
            }

            return state.userData
        }
    },
    actions: {
        updateUserData: ({ commit }) => {
            return new Promise((resolve, reject) => {
                api.getAuthUser().then(response => {
                    commit(types.RECEIVE_AUTH_USER, {
                        user: response.data.user
                    })
                    resolve()
                })
            })
        }
    },
    mutations: {
        [types.RECEIVE_AUTH_USER](state, { user }) {
            state.userData = user
        }
    }
}