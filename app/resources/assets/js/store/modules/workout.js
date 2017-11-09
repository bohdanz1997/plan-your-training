import api from '../../api/workout'
import * as types from '../mutation-types'

export default {
    namespaced: true,
    state() {
        return {
            weight: 0,
            step: 1,
            reps: 0
        }
    },
    actions: {
        add: ({ commit }, workout) => {
            return new Promise((resolve, reject) => {
                api.store(workout).then(response => {
                    flash(response.data.message)

                    commit(types.STORE_WORKOUT_SUCCESS, {
                        set: response.data.workout
                    })
                    resolve()
                })
            })
        }
    },
    mutations: {
        setWeight(state, value) {
            state.weight = value
        },
        setReps(state, value) {
            state.reps = value
        },
        setStep(state, value) {
            state.step = value
        },
        [types.STORE_WORKOUT_SUCCESS](state, { workout }) {

        }
    }
}