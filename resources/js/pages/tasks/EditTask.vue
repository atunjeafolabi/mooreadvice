<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'all-tasks'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Edit Task</li>
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
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Make your changes</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="task-title">Title</label>
                                        <input type="text" class="form-control" id="task-title" v-model="task.title" placeholder="Enter task title" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" v-model="task.description" placeholder="Enter description" required></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" v-on:click.prevent="saveTask()" class="btn btn-primary">Save</button>
                                </div>
                            </form>
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
    export default  {
        data(){
            return {
                task: {
                    title: "",
                    description: ""
                },
                responseMessage: ""
            }
        },
        created() {
            const taskId = this.$route.params.id;

            axios
                .get('/api/tasks/' + taskId, {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                })
                .then(response => (this.task = response.data));
        },
        methods: {
            saveTask(){
                axios
                    .put('/api/tasks/' + this.task.id, {title: this.task.title, description: this.task.description}, {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                    .then(response => (this.responseMessage = response.data));

                // redirect to list of all tasks
                this.$router.push({name: 'all-tasks'});
                console.log(this.responseMessage);
            }
        }
    }
</script>
