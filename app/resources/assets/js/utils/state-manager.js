export default class {
    constructor(data) {
        this.states = data
        this.currentState = ''
    }

    set(state) {
        this.currentState = state

        return this
    }

    get current() {
        return this.states[this.currentState]
    }

    currentEq(value) {
        return this.current === value
    }

    get(state = null) {
        if (state) {
            return this.states[state]
        }

        return this.current
    }
}
