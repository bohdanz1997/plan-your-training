class TemplateForm {
    constructor() {
        this.$selectGroup = $('.js-select-group')
        this.$selectExercises = $('.js-select-exercises')
        this.$outExercises = $('.js-select-out-ex')
        this.$container = $('#exercises-container')
        this.$submit = $('.js-submit')

        this.$selectGroup.change(this.selectGroupChangeHandler.bind(this))
        this.$selectExercises.change(this.selectExercisesChangeHandler.bind(this))
        this.$outExercises.change(this.outExercisesChangeHandler.bind(this))
        this.$submit.click(this.submitClickHandler.bind(this))
    }

    selectExercisesChangeHandler(e) {
        let exists = this.$outExercises.find('option[value="' + e.target.value + '"]').length !== 0

        //todo check if e.target.value correct
        if (!exists && e.target.value !== '') {
            let $selectedOption = this.$selectExercises.find('option[value="' + e.target.value + '"]')

            this.$outExercises.prepend(
                $('<option></option>')
                    .attr('value', $selectedOption.val())
                    .text($selectedOption.text())
            )
        }
    }

    outExercisesChangeHandler(e) {
        this.$outExercises.find('option[value="' + e.target.value + '"]').remove()
    }

    selectGroupChangeHandler(e) {
        $.ajax({
            url: '/exercise/get-by-group/' + e.target.value,
            type: "GET",
            success: this.updateContent.bind(this)
        })
    }

    submitClickHandler() {
        this.$container.html('')

        $.each(this.$outExercises.find('option'), function (key, value) {
            this.$container.append(
                '<input type="hidden" ' +
                'name="exercises[' + key + ']" ' +
                'value="' + $(value).val() + '">'
            )
        })
    }

    updateContent(response) {
        this.$selectExercises.empty()

        $.each(response.exercises, function (key, value) {
            this.$selectExercises.append(
                $('<option></option>')
                    .attr('value', value.id)
                    .text(value.title)
            )
        }.bind(this))
    }
}

$(document).ready(() => {
    new TemplateForm()
})
