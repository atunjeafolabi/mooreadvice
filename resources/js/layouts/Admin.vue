<template>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <router-link :to="{name: 'all-tasks'}" class="nav-link">Home</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a @click="logout()" class="btn">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <router-link :to="{name: 'all-tasks'}" class="brand-link">
                <i class="fas fa-business-time"></i>
                <span class="brand-text font-weight-light">MOOREADVICE</span>
            </router-link>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://www.computerhope.com/jargon/t/task.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">{{name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <router-link :to="{name: 'add-task'}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                    Add task
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'all-tasks'}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                    View All Tasks
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <router-view></router-view>
    </div>
    <!-- /.content-wrapper -->
</template>
<script>
    export default {
        data(){
            return {
                name: ""
            }
        },
        mounted() {
            axios
                .get('/api/user', {
                        headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                 })
                .then(response => {
                    this.name = response.data.name;
                });
        },
        methods: {
            logout(){
                axios
                    .get('/api/logout', {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                    .then(response => {
                        localStorage.removeItem('token');
                        this.$router.push({name: 'login'});
                    });
            }
        }
    }
</script>
