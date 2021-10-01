<template>
    <div>
        <div class="container-fluid">
            <br>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Blogs </h3>
                    <h3 class="card-title float-right">
                        <a href="/dashboard/blog/create">Add New Blog</a>
                    </h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td> id</td>
                            <td>
                                <a href="#" @click.prevent="sortBy('title')">
                                    <span style="color:white"> Title </span>
                                </a>
                                <span v-if="this.sort_column==='title'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span v-if="this.sort_column==='title'&&this.sort_dircetion==='desc' ">&darr;</span>

                            </td>
<!--                            <td>
                                <a href="#" @click.prevent="sortBy('body')">
                                    <span style="color:white"> Body </span>
                                </a>
                                <span v-if="this.sort_column==='body'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span v-if="this.sort_column==='body'&&this.sort_dircetion==='desc' ">&darr;</span>
                            </td>-->
                            <td>
                                <a href="#" @click.prevent="sortBy('created_at')">
                                    <span style="color:white">Published at </span>
                                </a>
                                <span v-if="this.sort_column==='created_at'&&this.sort_dircetion==='asc' ">&uarr;</span>
                                <span
                                    v-if="this.sort_column==='created_at'&&this.sort_dircetion==='desc' ">&darr;</span>
                            </td>
                            <td>
                                <a href="#">
                                    <span style="color:white"> Show </span>
                                </a>

                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(blog, index) in blogs.data ">

                            <td> {{ index+1 }}</td>
                            <td>
                                <template v-if="blog.title.length>50">
                                    {{ blog.title.substring(0, 50) }}..
                                </template>
                                <template v-else>
                                    {{ blog.title }}
                                </template>
                            </td>
<!--                            <td>
                                <template v-if="blog.body.length>50">
                                    {{ blog.body.substring(0, 50) }}....
                                </template>
                                <template v-else>
                                    {{ blog.body.substring(0, 50) }}
                                </template>

                            </td>-->
                            <td>
                                {{ blog.published_at }}
                            </td>
                            <td>
                                <a :href="'/dashboard/blog/show/'+blog.id" target="_blank"> show</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <pagination :data="blogs" @pagination-change-page="getResults"></pagination>

                </div>


            </div>

        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            blogs: {},
            sort_column: '',
            sort_dircetion: 'asc',
        }
    },

    mounted() {
        this.getResults();


    },

    methods: {

        getResults(page = 1) {

            axios.get('/api/dashboard/blog?page=' + page
                + '&sort_column=' + this.sort_column
                + '&sort_dircetion=' + this.sort_dircetion)
                .then(response => {
                    this.blogs = response.data;
                });


        },
        sortBy(column) {
            if (this.sort_column === column)
                this.sort_dircetion = this.sort_dircetion === 'asc' ? 'desc' : 'asc';

            this.sort_column = column;
            this.getResults();
        }
    }


}

</script>
