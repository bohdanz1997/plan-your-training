export default class {
    constructor() {
        this.$form = $('.js-start-training-form')

        this.$form.change(this.formChangeHandler.bind(this))
    }

    formChangeHandler() {
        this.$form.submit();
    }
}
