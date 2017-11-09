export default class {
    constructor(form) {
        this.$form = form

        this.$form.on('keyup keypress', this.formKeyEventHandler.bind(this))
    }

    formKeyEventHandler(e) {
        let keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    }
}