<template>
    <transition name="list" mode="out-in">
        <router-view></router-view>
    </transition>
</template>

<script>
    export default {

    }
</script>

<style lang="sass">
    .list-leave-active,
    .list-enter-active
        transition: .5s

    .list-enter,
    .list-leave-to
        opacity: 0

    .list-leave-to
        transform: translateX(20%)

    .list-enter
        transform: translateX(-20%)
</style>