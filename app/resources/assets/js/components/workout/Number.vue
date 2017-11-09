<template>
    <div class="number">
        <div class="minus number-spin" @click="decrease">
        </div>
        <div class="value">
            <input type="number" v-model.number="internalValue" min="0" title="">
        </div>
        <div class="plus number-spin" @click="increase">
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            step: {
                type: Number
            },
            value: {
                type: Number
            }
        },
        data() {
            return {
                internalValue: 0,
                internalStep: 0,
                sliderData: {
                    dots: true,
                    vertical: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    verticalSwiping: true,
                }
            }
        },
        created() {
            this.internalValue = this.value
            this.internalStep = this.step
        },
        watch: {
            internalValue() {
                this.$emit('update:value', this.internalValue)
            },
            value() {
                this.internalValue = this.value
            }
        },
        methods: {
            increase() {
                this.internalValue += this.internalStep
            },
            decrease() {
                if (this.internalValue > 0) {
                    this.internalValue -= this.internalStep
                }
            }
        }
    }
</script>

<style lang="sass">
    $font-color: #636b6f
    $border-color: #ccc
    $border-width: 1px
    $width: 60px
    $height: 60px
    $spin-width: 34px
    $spin-height: 5px

    @mixin content
        content: ""
        display: block
        position: absolute

    .number
        position: relative
        display: inline-block
        margin-bottom: 20px

        .value
            border: $border-width solid $border-color
            input
                font-size: 40px
                text-align: center
                border: none
                height: $height
                width: $width * 4
                padding: 0 $width
                color: $font-color
                font-weight: 700
                &:focus,
                &:hover
                    outline: none

        .number-spin
            position: absolute
            top: 0
            width: $width
            height: 100%
            display: flex
            align-items: center
            justify-content: center
            text-align: center
            &:hover,
            &:focus
                background-color: darken(#fff, 5%)
                cursor: pointer

        .plus
            right: 0
            border: $border-width solid $border-color
            &:before
                @include content
                width: $spin-width
                height: $spin-height
                background-color: $font-color
            &:after
                @include content
                width: $spin-height
                height: $spin-width
                background-color: $font-color
                margin-top: 0

        .minus
            left: 0
            border: $border-width solid $border-color
            &:before
                @include content
                width: $spin-width
                height: $spin-height
                background-color: $font-color

</style>
