export default class {
    constructor(data) {
        this.states = data
        this.currentState = ''
    }

    set(state) {
        this.currentState = state

        return this
    }

    get(state = null) {
        if (state) {
            return this.states[state]
        }

        return this.states[this.currentState]
    }
}
