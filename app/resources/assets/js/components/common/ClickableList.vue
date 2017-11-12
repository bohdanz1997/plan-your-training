<template>
    <div class="data-list">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr v-for="item in items" @click="handleItemClick(item)">
                    <td>
                        <i class="fa fa-angle-right" :style="{ color: item.color}"></i>
                        {{ item.title }}
                    </td>
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
    @import "../../../sass/includes/vars"

    .data-list
        .table
            background: #fff
            font-size: 16px
            tr
                &:hover
                    cursor: pointer
                td
                    line-height: 1.6
                    i
                        margin-right: 5px
                        margin-left: 5px
                        font-weight: bold
                        font-size: 18px
</style>