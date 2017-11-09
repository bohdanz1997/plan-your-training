<template>
    <div class="track">
        <div class="num-wrap">
            <div class="num-container">
                <slide-number ref="slideNumber"></slide-number>
            </div>
        </div>
        <div class="options form-group col-sm-12">
            <button class="btn tr-btn" :disabled="button1.sm2.get().disabled" :class="button1.sm.get().className" @click="handleAddBtnClick">{{ button1.sm.get().text }}</button>
            <button class="btn tr-btn" :disabled="button1.sm2.get().disabled" :class="button2.sm.get().className" @click="handleClearBtnClick">{{ button2.sm.get().text }}</button>
        </div>
        <set-list @setClick="handleSetClick" ref="setList" :edited-set="editedSet"></set-list>
    </div>
</template>

<script>
    import Number from './Number.vue'
    import SlideNumber from './SlideNumber.vue'
    import SetList from '../set/SetList.vue'
    import TrButton from './Button.vue'
    import StateManager from '../../utils/state-manager'

    import { mapState, mapMutations, mapActions } from 'vuex'

    export default {
        data() {
            return {
                editedSet: {},
                button1: {
                    sm: new StateManager({
                        normal: {
                            text: 'Додати',
                            className: 'btn-success'
                        },
                        edited: {
                            text: 'Зберегти',
                            className: 'btn-success'
                        }
                    }),
                    sm2: new StateManager({
                        enabled: {
                            disabled: false
                        },
                        disabled: {
                            disabled: true
                        }
                    })
                },
                button2: {
                    sm: new StateManager({
                        normal: {
                            text: 'Очистити',
                            className: 'btn-primary'
                        },
                        edited: {
                            text: 'Видалити',
                            className: 'btn-danger'
                        }
                    }),
                    sm2: new StateManager({
                        enabled: {
                            disabled: false
                        },
                        disabled: {
                            disabled: true
                        }
                    })
                },
                setList: []
            }
        },
        computed: {
            ...mapState('set', {
               sets: state => state.items
            }),
            ...mapState('workout', {
                weight: state => state.weight,
                reps: state => state.reps
            })
        },
        components: {
            Number,
            SetList,
            TrButton,
            SlideNumber
        },
        created() {
            this.button1.sm.set('normal')
            this.button2.sm.set('normal')
            this.button1.sm2.set('enabled')
            this.button2.sm2.set('enabled')

            this.get().then(() => this.$refs.setList.resize())
        },
        watch: {
            editedSet() {
                let state = Object.keys(this.editedSet).length === 0
                    ? 'normal' : 'edited'
                this.button1.sm.set(state)
                this.button2.sm.set(state)
            }
        },
        methods: {
            ...mapActions('set', [
                'add',
                'edit',
                'remove',
                'get'
            ]),
            ...mapMutations('workout', [
                'setWeight',
                'setReps'
            ]),
            updateSetPositions() {
                this.setList.map((value, key) => {
                    value.position = key + 1
                });
            },
            handleSetClick(set) {
                this.$refs.slideNumber.updatePicker({
                    weight: set.weight,
                    reps: set.reps
                })

                this.setWeight(set.weight)
                this.setReps(set.reps)

                this.editedSet = set
            },
            handleAddBtnClick() {
                if (Object.keys(this.editedSet).length === 0) {
                    let setForAdd = {
                        comment: '',
                        position: this.sets.length + 1,
                        weight: this.weight,
                        reps: this.reps,
                        exercise_id: 0
                    }

                    this.disableButtons()

                    this.add(setForAdd)
                        .then(() => {
                            this.$refs.setList.scrollToBottom()
                            this.$refs.setList.resize()
                            this.enableButtons()
                        })
                } else {
                    let edited = this.editedSet
                    edited.weight = this.weight
                    edited.reps = this.reps

                    this.disableButtons()

                    this.edit(edited)
                        .then(() => this.enableButtons())

                    this.editedSet = {}
                }
            },
            handleClearBtnClick() {
                if (Object.keys(this.editedSet).length === 0) {
                    this.$refs.slideNumber.updatePicker({
                        weight: 0,
                        reps: 0
                    })

                    this.setWeight(0)
                    this.setReps(0)
                } else {
                    this.disableButtons()

                    this.remove(this.editedSet.id)
                        .then(() => this.enableButtons())

                    this.editedSet = {}

                    this.updateSetPositions()
                }
            },
            enableButtons() {
                this.button1.sm2.set('enabled')
                this.button2.sm2.set('enabled')
            },
            disableButtons() {
                this.button1.sm2.set('disabled')
                this.button2.sm2.set('disabled')
            }
        }
    }
</script>

<style lang="sass">
    .track
        .num-wrap
            display: flex
            justify-content: center
            margin-bottom: 20px

        .options
            display: flex
            justify-content: center
</style>