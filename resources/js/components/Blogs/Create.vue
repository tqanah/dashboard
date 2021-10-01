<template>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Summernote
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form method="post" action="">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">select category</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Time to read in (min)</label>
                                        <input type="number" class="form-control" name="time">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Main image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>



                            <button class="btn btn-primary"> submit</button>
                        </form>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>

</template>

<script>

export default {
    data() {

    }
}
</script>
