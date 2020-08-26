<template>
    <div>

        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">Task</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>
                            <div class="card-body">
                                <form action="" method="">
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="text" v-model="user.email" id="email_address" class="form-control" name="email-address" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" v-model="user.password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button @click.prevent="login()" class="btn btn-primary">
                                            Login
                                        </button>
                                        <a href="#" class="btn btn-link">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                user: {
                    email: "",
                    password: ""
                },
                token: ""
            }
        },
        methods: {
            async login(){
                await axios
                    .post('api/login', {email: this.user.email, password: this.user.password})
                    .then(response => (
                        this.storeToken(response.data.token)
                    ));
            },
            storeToken(token){
                // Store token in browser
                localStorage.setItem('token', token);
                // Redirect to list of all tasks page
                this.$router.push({name: 'all-tasks'});
            }
        },
    }
</script>
<style>
    body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }

    .navbar-laravel
    {
        box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }

    .navbar-brand , .nav-link, .my-form, .login-form
    {
        font-family: Raleway, sans-serif;
    }

    .my-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .my-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }

    .login-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
</style>
