<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link  :to="{name: 'all-tasks'}">Home</router-link></li>
                            <li class="breadcrumb-item active">Add Task</li>
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
                                <h3 class="card-title">Add New</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="task-title">Title</label>
                                        <input type="text" class="form-control" id="task-title" v-model="formdata.title" placeholder="Enter task title" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" v-model="formdata.description" placeholder="Enter description" required></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" v-on:click.prevent="submitTask()" class="btn btn-primary">Submit</button>
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
                formdata: {
                    title: "",
                    description: ""
                }
            }
        },
        mounted() {

        },
        methods: {
            submitTask(){
                if(this.formdata.title !== "" && this.formdata.description !==""){
                    axios
                        .post('/api/tasks', {title: this.formdata.title, description: this.formdata.description})
                        .then(response => (this.tasks = response.data));

                    // redirect to list of all tasks
                    this.$router.push({name: 'all-tasks'});
                }
            }
        }
    }
</script>
