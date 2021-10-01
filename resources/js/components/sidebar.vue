<template>

    <div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <router-link class="brand-link" to="/home">
                <img src="dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> Taqanh</span>
            </router-link>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img :src="  $user.avatar " class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> {{ $user.name}} </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item active">
                            <router-link class="nav-link" to="/">
                                <i class="nav-icon far fa-image"></i>
                                Gallery
                            </router-link>

                        </li>
                        <li class="nav-item active">
                            <router-link to="/category" class="nav-link"><i class="nav-icon fas fa-file"></i> Category
                            </router-link>

                        </li>
                        <li class="nav-item active">
                            <router-link to="/blog" class="nav-link"><i class="nav-icon fab fa-blogger"></i> Blogs
                            </router-link>

                        </li>
                        <li class="nav-item active">
                            <router-link   class="nav-link" to="/admin">
                                <i class="nav-icon fas fa-users"></i> Admin
                            </router-link>
                        </li>
                        <li class="nav-item active">

                            <router-link   class="nav-link" to="/home">
                                <i class="nav-icon fas fa-cog"></i> Settings
                            </router-link>

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link btn-danger" href=""
                            >
                                <i class="fas fa-power-off"></i>
                                <p>
                                    logout
                                </p>
                            </a>
<!--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>-->

                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
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



    },

    methods: {

        logout() {

            axios.post("logout").then(response => {
                console.log(response);
            })
                .catch(error => {
                    console.log(error);
                });


        },

    }


}

</script>


