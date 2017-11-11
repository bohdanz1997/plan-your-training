<template>
    <div class="workout-start">
        <button
            v-show="selection.currentEq('exercise')"
            class="btn btn-default btn-back"
            @click="back">
            Назад до груп
        </button>
        <clickable-list
            v-show="selection.currentEq('group')"
            :items="groups"
            @itemClick="handleListGroupClick"
        ></clickable-list>
        <clickable-list
                v-show="selection.currentEq('exercise')"
                :items="exercises"
                @itemClick="handleListExerciseClick"
        ></clickable-list>
    </div>
</template>

<script>
    import ClickableList from '../common/ClickableList.vue'
    import StateManager from '../../utils/state-manager'

    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    import moment from 'moment'

    export default {
        data() {
            return {
                selection: new StateManager({
                    group: 'group',
                    exercise: 'exercise'
                })
            }
        },
        components: {
            ClickableList
        },
        computed: {
            ...mapState('group', {
                groups: state => state.items
            }),
            ...mapGetters('group', {
                exercises: 'exercisesByGroup'
            })
        },
        created() {
            this.getExercises()
            this.getGroups()

            this.selection.set('group')
        },
        methods: {
            ...mapMutations('group', { changeSelectedGroup: 'changeSelected' }),
            ...mapActions('exercise', { getExercises: 'get' }),
            ...mapActions('group', { getGroups: 'get' }),
            ...mapActions('workout', { addWorkout: 'add' }),
            handleListGroupClick(item) {
                this.changeSelectedGroup({item: item})
                this.selection.set('exercise')
            },
            handleListExerciseClick(item) {
                this.createWorkout()
            },
            back() {
                if (this.selection.currentEq('exercise')) {
                    this.selection.set('group')
                }
            },
            createWorkout() {
                this.addWorkout({
                    datetime: moment().format('YYYY-MM-DD'),
                    weekday: 5,
                    sets: []
                }).then(response => this.$router.push('workout'))
            }
        }
    }
</script>

<style lang="sass">
    .workout-start
        .btn-back
            margin-bottom: 15px
</style>