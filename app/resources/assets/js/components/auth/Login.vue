<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Вхід у систему</div>
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
                                <button type="submit" class="btn btn-primary form-control">Увійти</button>
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
            login() {
                axios.post('api/login', this.auth)
                    .then(response => {
                        if (response.data.success) {
                            this.$router.push('workout_start')
                        }
                    }, error => console.log(error))
            }
        }
    }
</script>

<style lang="sass">
    .panel
        &-heading
            font-size: 24px
            text-align: center
        input,
        button
            height: 42px
            font-size: 16px
</style>