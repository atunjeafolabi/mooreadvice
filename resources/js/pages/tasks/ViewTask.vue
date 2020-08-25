<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="{name: 'all-tasks'}">Home</router-link></li>
                            <li class="breadcrumb-item active">View task</li>
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
                                <h3 class="card-title">Task Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h3>Title: {{task.title}}</h3>
                                <h3>Description: {{task.description}}</h3>
                                <h3>Created Date: {{task.created_at}}</h3>

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
    export default {
        data(){
            return {
                task: {
                    title: "",
                    description: ""
                },
            }
        },
        created() {
            const taskId = this.$route.params.id;

            axios
                .get('/api/tasks/' + taskId)
                .then(response => (this.task = response.data));
        },
    }
</script>
