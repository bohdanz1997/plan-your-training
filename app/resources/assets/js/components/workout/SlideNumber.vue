<template>
    <div class="number">
        <input type="text" id="numberInput" readonly />
    </div>
</template>

<script>
    import AnyPickerProvider from '../../utils/anypicker-provider'

    import { mapState, mapMutations } from 'vuex'

    export default {
        computed: {
            ...mapState('workout', {
                weight: state => state.weight,
                reps: state => state.reps,
                step: state => state.step
            })
        },
        mounted() {
            this.setStep(2.5)
            this.initPicker()
        },
        methods: {
            ...mapMutations('workout', [
                'setWeight',
                'setReps',
                'setStep'
            ]),
            updatePicker(data) {
                let diffWeight = (this.weight - data.weight) / this.step;
                let diffReps = this.reps - data.reps;

                if (diffWeight !== 0) {
                    diffWeight < 0
                        ? this.triggerPicker(0, '.ap-component-minus', diffWeight)
                        : this.triggerPicker(0, '.ap-component-plus', diffWeight)
                }
                if (diffReps !== 0) {
                    diffReps < 0
                        ? this.triggerPicker(1, '.ap-component-minus', diffReps)
                        : this.triggerPicker(1, '.ap-component-plus', diffReps)
                }
            },
            triggerPicker(id, className, val) {
                $('#ap-component-' + id + ' ' + className)
                    .trigger('click', Math.abs(val) * 50)
            },
            initPicker() {
                const provider = new AnyPickerProvider({
                    components: [
                        {
                            component: 0,
                            name: "weight",
                            label: "Вага",
                            width: "50%",
                            textAlign: "center"
                        },
                        {
                            component: 1,
                            name: "reps",
                            label: "Повтори",
                            width: "50%",
                            textAlign: "center"
                        }
                    ],
                    dataRanges: [
                        { start: 0, step: this.step, count: 81},
                        { start: 0, step: 1, count: 31}
                    ]
                })

                $("#numberInput").AnyPicker({
                    mode: "select",
                    layout: "inline",
                    parent: ".number",
                    actionMode: "both",
                    rowsNavigation: "scroller+buttons",
                    showComponentLabel: true,
                    components: provider.getComponents(),
                    dataSource: provider.getDataSource(),
                    inputChangeEvent: "onChange",
                    onChange: function(iRow, iComp) {
                        if (iRow === 0) {
                            this.setWeight(iComp * this.step)
                        }
                        else if (iRow === 1) {
                            this.setReps(iComp)
                        }
                    }.bind(this)
                })
            }
        }
    }
</script>

<style lang="sass">
    @import '../../../sass/includes/vars'

    $font-color: #636b6f
    $border-color: #ccc
    $border-width: 1px

    .number
        input[type=text]
            display: none
        .ap-overlay
            position: static
            width: auto
            display: block
            .ap-cont
                position: static !important
                margin: 0
                width: 100% !important
            .ap-content-middle
                padding:
                    top: 5px
                    bottom: 0
            .ap-component
                &-label
                    color: $grey-2
                    font-weight: bold
                &-selector
                    border-top: 2px solid $green
                    border-bottom: 2px solid $green
                &-minus
                    bottom: 11px
                &-plus
                    top: 40px
                    z-index: 1
                &-plus,
                &-minus
                    width: 160px
                    position: absolute
                    background-color: transparent
                    &:before
                        content: ""
</style>
