<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Вхід в акаунт</div>
                <div class="panel-body">
                    <form method="post" @submit.prevent="login" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email"
                                       name="email" required=""
                                       maxlength="50" v-model="auth.email"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="Пароль"
                                       name="password" required=""
                                       maxlength="20" v-model="auth.password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success form-control">Увійти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import { mapActions } from 'vuex'

    export default {
        data() {
            return {
                auth: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            ...mapActions('user', ['updateUserData']),
            login() {
//                showPreloader()

                axios.post('api/login', this.auth)
                    .then(response => {
                        if (response.data.success) {
                            this.updateUserData().then(() => {
                                this.$router.push({ name: 'workout_start' })
                            })
                        }
                    })
            }
        }
    }
</script>

<style lang="sass">
    .panel
        &-heading
            font-size: 24px
            text-align: center
            font-weight: bold
        input,
        button
            height: 42px
            font-size: 16px
</style>