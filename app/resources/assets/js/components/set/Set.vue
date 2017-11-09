<template>
    <tr @click="onClick" :class="{ edited: edited }">
        <td><i class="glyphicon glyphicon-comment" @click="onCommentClick"></i></td>
        <td>{{ data.position }}</td>
        <td>{{ data.weight}}<span>кг</span></td>
        <td>{{ data.reps }}<span>повт</span></td>
    </tr>
</template>

<script>
    export default {
        props: ['data', 'edited'],
        methods: {
            onClick(e) {
                this.$emit('click', this.data)
            },
            onCommentClick(e) {
                //todo open modal
            }
        }
    }
</script>

<style lang="sass">

</style>