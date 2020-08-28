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
                            <router-link :to="{name: 'login'}" class="nav-link">Login</router-link>
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
                            <div class="card-header">Register</div>
                            <div class="card-body">
                                <p class="alert alert-success" v-if="successMessage">
                                    {{successMessage}}
                                    <router-link :to="{name: 'login'}">You can Login</router-link>
                                </p>
                                <ul v-if="errors" class="alert alert-danger">
                                    <li v-for="error in errors">{{error}}</li>
                                </ul>
                                <form action="" method="" v-if="!successMessage">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" v-model="user.name" id="name" class="form-control" name="name" required autofocus>
                                        </div>
                                    </div>
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
                                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input type="password" v-model="user.password_confirmation" id="password_confirmation" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button @click.prevent="register()" class="btn btn-primary">
                                            Register
                                        </button>
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
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                },
                successMessage: "",
                errors: ""
            }
        },
        methods: {
            register(){
                axios
                    .post('/api/register', this.user)
                    .then(response => {
                        this.errors = "";   // Clear the errors
                        this.successMessage = response.data.message;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
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
