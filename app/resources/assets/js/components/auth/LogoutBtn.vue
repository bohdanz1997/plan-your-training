<template>
    <a @click="handleClick">Вихід</a>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['logoutPath', 'routeAfter'],
        methods: {
            handleClick() {
                this.$emit('click')

                axios.post(this.logoutPath)
                    .then(response => {
                        if (response.data.success) {
                            this.$router.push(this.routeAfter)
                        }
                    }, error => console.log(error))
            }
        }
    }
</script>