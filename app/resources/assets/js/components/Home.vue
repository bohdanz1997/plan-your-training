<template>
    <div class="row home">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>Plan your training</h1>
                    <div v-if="user">
                        <router-link
                            tag="button" to="workout_start"
                            class="btn btn-success sign-in">
                            Акаунт
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </router-link>
                    </div>
                    <div v-else>
                        <router-link
                            tag="button" to="login"
                            class="btn btn-success sign-in">
                            Увійти
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        computed: {
            ...mapGetters('user', ['user'])
        },
        methods: {
            ...mapActions('user', ['updateUserData'])
        },
        created() {
            this.updateUserData()
        }
    }
</script>

<style lang="sass">
    @import '../../sass/includes/vars'

    .home
        text-align: center
        h1
            margin-bottom: 20px
            color: $green
            font-size: 32px
        .sign-in
            i
                margin-left: 5px
</style>

