<template>
    <div class="data-list">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr v-for="item in items" @click="handleItemClick(item)">
                    <td>{{ item.title }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        methods: {
            handleItemClick(item) {
                this.$emit('itemClick', item)
            }
        }
    }
</script>

<style lang="sass">
    .data-list
        .table
            background: #fff
</style>