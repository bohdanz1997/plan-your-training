export default {
    namespaced: true,
    state() {
        return {
            weight: 0,
            step: 1,
            reps: 0
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
        }
    }
}