<template>
    <div class="data-list">
        <table class="table">
            <tbody>
                <tr v-for="item in items" @click="handleItemClick(item)">
                    <td>{{ item }}</td>
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