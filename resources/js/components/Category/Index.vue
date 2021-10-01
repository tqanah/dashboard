<template>
    <div>
        <div class="container-fluid">
            <br>

<!--            <file-pond
                name="test"
                ref="pond"
                label-idle="Drop files here..."
                v-bind:allow-multiple="true"
                accepted-file-types="image/jpeg, image/png"
                server="/api"
                v-bind:files="myFiles"
                v-on:init="handleFilePondInit"
            />-->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Blogs </h3>
                    <h3 class="card-title float-right">
                        <router-link to="/category/create">Add New category</router-link>
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="font-size: 18px; font-weight: bold">
                            <td> id</td>
                            <td>
                                <a href="#" @click.prevent="sortBy('title')">
                                    <span style="color:white"> Name </span>
                                </a>
                                <span v-if="this.sort_column==='title'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span v-if="this.sort_column==='title'&&this.sort_dircetion==='desc' ">&darr;</span>

                            </td>
                            <td>
                                <a href="#" @click.prevent="sortBy('body')">
                                    <span style="color:white"> Description </span>
                                </a>
                                <span v-if="this.sort_column==='body'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span v-if="this.sort_column==='body'&&this.sort_dircetion==='desc' ">&darr;</span>
                            </td>
                            <td>
                                <a href="#" @click.prevent="sortBy('created_at')">
                                    <span style="color:white">Published at </span>
                                </a>
                                <span v-if="this.sort_column==='created_at'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span
                                    v-if="this.sort_column==='created_at'&&this.sort_dircetion==='desc' ">&darr;</span>
                            </td>
                            <td> Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category, index) in categories.data ">
                            <td> {{ index+1 }}</td>
                            <td>
                                <template v-if="category.name.length>50">
                                    {{ category.name.substring(0, 50) }}..
                                </template>
                                <template v-else>
                                    {{ category.name }}
                                </template>
                            </td>
                            <td>
                                <template v-if="category.description.length>50">
                                    {{ category.description.substring(0, 50) }}....
                                </template>
                                <template v-else>
                                    {{ category.description.substring(0, 50) }}
                                </template>

                            </td>
                            <td>
                                {{ category.published_at }}
                            </td>
                            <td>
                                <router-link class="btn btn-info" :to="{name:'category.edit',params:{id:category.id}}"> Edit </router-link>
                                <button @click="delete_category(category.id)" class="btn btn-danger"> Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <pagination :data="categories" @pagination-change-page="getResults"></pagination>

                </div>
            </div>

        </div>
    </div>
</template>

<script>


/*
import vueFilePond from "vue-filepond";

// Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
// Import FilePond styles
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
*/
/*
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
);*/

export default {

   /* components: {
        FilePond,
    },*/
    data() {
        return {
            categories: {},
            sort_column: '',
            sort_dircetion: 'asc',
            myFiles: [],
        }
    },

    mounted() {
        this.getResults();



    },

    methods: {

       /* handleFilePondInit: function () {
            console.log("FilePond has initialized");

            // FilePond instance methods are available on `this.$refs.pond`
        },*/
        getResults(page = 1) {

               /* ?page=' + page
                + '&sort_column=' + this.sort_column
                + '&sort_dircetion=' + this.sort_dircetion)*/
            axios.get('/api/dashboard/category?page='+ page)
                .then(response => {
                    this.categories = response.data;
                    console.log(this.categories)
                });



        },
        sortBy(column) {
            if (this.sort_column === column)
                this.sort_dircetion = this.sort_dircetion === 'asc' ? 'desc' : 'asc';

            this.sort_column = column;
            this.getResults();
        },
        delete_category(category_id)
        {

            this.$swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                showCancelButton:true,
                dangerMode: true,
            }).then((willDelete) => {
                    if (willDelete.value) {
                        axios.delete('/api/dashboard/category/'+category_id).then(
                            response => {
                                this.$swal({icon:'success',title:'category deleted successfully'});
                                this.getResults();
                            }
                        ).catch(error => {
                            this.$swal({icon:'error',title:'error happen' });
                        })

                    } else {
                        this.$swal("Your imaginary file is safe!");
                    }
                });

        }
    }


}

</script>
