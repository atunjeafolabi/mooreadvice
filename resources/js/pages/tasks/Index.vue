<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tasks</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tasks</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">View All Tasks</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th style="width: 250px; text-align:center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="task in tasks">
                                        <td>{{task.id}}</td>
                                        <td>{{task.title}}</td>
                                        <td class="project-actions text-right">
                                            <router-link
                                                :to="{name: 'view-task', params:{id: task.id}}"
                                                class="btn btn-primary btn-sm"
                                            >
                                                <i class="fas fa-folder"></i>
                                                View
                                            </router-link>
                                            <router-link
                                                :to="{name: 'edit-task', params: {id: task.id}}"
                                                class="btn btn-info btn-sm"
                                            >
                                                <span @click="passTaskData(task.id)">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </span>
                                            </router-link>
                                            <a @click="deleteTask(task.id)" class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>


<script>
    import {EventBus} from '../../app'
    export default {
        data() {
            return {
                tasks: "",
            }
        },
        mounted () {
            axios
                .get('api/tasks')
                .then(response => (this.tasks = response.data));
        },
        methods: {
            passTaskData(id){
                EventBus.$emit('TASK_DATA', this.tasks[id]);
            },
            deleteTask(id){
                if(confirm("Are you sure you want to delete task?")){
                    axios
                        .delete('api/tasks/' + id)
                        .then(response => (this.tasks = response.data));

                    this.$router.go();
                }
            }
        }
    }
</script>
