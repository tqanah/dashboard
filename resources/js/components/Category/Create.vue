<template>

    <div class="container-fluid">

        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Create Category
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form  @submit.prevent="submitForm">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" v-model="fields.name">
                                        <div class="alert alert-danger"  v-if="errors&&errors.name">
                                            {{errors.name[0]}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Main icon</label>
                                        <input type="file" class="form-control" @change="uploadImage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" v-model="fields.description"
                                                  rows="10">

                                        </textarea>
                                        <div class="alert alert-danger"  v-if="errors&&errors.description">
                                            {{errors.description[0]}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-primary" :disabled="preventClick"> submit</button>
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
        return {
            fields: {
                name: '',
                description: '',
                image: '',
                thumbnail:null,
            },
            errors:{},
            preventClick:false,

        }
    },
    methods: {


        uploadImage(event){
            this.fields.thumbnal = event.target.files[0];
        },
        submitForm() {
            this.preventClick=true;

            let filed =new FormData();
            for (let key in this.filed){
                this.fields.append(key,this.filed[key]);
            }

            axios.post('/api/dashboard/category',this.fields).then(
                response => {
                    this.$router.push('/category');
                    this.preventClick=false
                }
            ).catch(error=>{
                if(error.response.status===422){
                    this.errors=error.response.data.errors;
                }
                this.preventClick=false

            })
        }
    }


}
</script>
