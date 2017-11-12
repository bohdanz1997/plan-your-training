<template>
    <a @click="handleClick">Вихід</a>
</template>

<script>
    import axios from 'axios'
    import { mapActions } from 'vuex'

    export default {
        props: ['logoutPath', 'routeAfter'],
        methods: {
            ...mapActions('user', ['updateUserData']),
            handleClick() {
                this.$emit('click')

                axios.post(this.logoutPath)
                    .then(response => {
                        if (response.data.success) {
                            this.updateUserData()

                            this.$router.push({ name: this.routeAfter })
                        }
                    }, error => console.log(error))
            }
        }
    }
</script>