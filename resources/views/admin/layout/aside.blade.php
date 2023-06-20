<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src=" {{ url('./asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('./asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item ">
                    @if (Auth::user()->dashboard == 1)
                        <a href="{{ url('admin/dashboard') }} "
                            class="nav-link  @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{-- <i class="right fas fa-angle-left"></i> --}}

                            </p>
                        </a>
                    @endif

                </li>


                <li
                    class="nav-item  {{ request()->is('admin/all/user', 'admin/create/user', 'admin/add/user', 'admin/add/role', 'admin/edit/user/*' ,'category/add') ? 'menu-is-opening menu-open active ' : '' }}">
                    @if (Auth::user()->is_admin == 1)
                    <a href="" id="setting_collagse_user_role" class="nav-link "> <i
                            class="nav-icon fas fa-user "></i>
                        <p>
                            User Role
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @endif

                    <ul class="nav nav-treeview   ">
                        <li class="nav-item  ">
                            <a href="{{ url('admin/create/user') }}"
                                class="nav-link  px-5 {{ request()->is('admin/create/user', 'category/edit/*', 'admin/add/user') ? 'active' : '' }} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Craete User</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('admin/all/user') }}"
                                class="nav-link px-5 {{ request()->is('admin/all/user', 'admin/add/role', 'admin/edit/user/*', 'category/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if (Auth::user()->category == 1)
                        <a href="{{ url('category') }}"
                            class="nav-link {{ request()->is('category', 'category/edit/*', 'category/add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    @endif

                </li>
                    <li class="nav-item">
                @if (Auth::user()->tag == 1)

                        <a href="{{ url('tags') }}"
                            class="nav-link {{ request()->is('tags', 'tags/edit/*', 'tags/add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tag "></i>
                            <p>
                                Tag
                            </p>
                        </a>
                @endif

                    </li>
                    <li class="nav-item">
                @if (Auth::user()->slider == 1)

                        <a href="{{ url('sliders') }}"
                            class="nav-link {{ request()->is('sliders', 'sliders/edit/*', 'sliders/add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>
                                Slider
                            </p>
                        </a>
                @endif

                    </li>
                        <li class="nav-item">
                    @if (Auth::user()->post == 1)

                            <a href="{{ url('posts') }}"
                                class="nav-link {{ request()->is('posts', 'posts/edit/*', 'posts/add') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-podcast "></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                    @endif

                        </li>
                        <li class="nav-item">
                    @if (Auth::user()->footer == 1)

                            <a href="{{ url('footer') }}"
                                class="nav-link {{ request()->is('footer', 'footer/edit/*', 'footer/add') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-square     "></i>
                                <p>
                                    Footer
                                </p>
                            </a>
                    @endif

                        </li>
                        <li class="nav-item">
                    @if (Auth::user()->preview == 1)

                            <a href="{{ url('/') }}"
                                class="nav-link {{ request()->is('preview', 'preview/edit/*', 'preview/add') ? 'active' : '' }}">
                                <i class="nav-icon fas  fa-eye            "></i>
                                <p>
                                    Previews
                                </p>
                            </a>
                    @endif

                        </li>
                        <li class="nav-item">
                    @if (Auth::user()->gallery == 1)

                            <a href="{{ url('gallery') }}"
                                class="nav-link {{ request()->is('gallery', 'gallery/edit/*', 'gallery/add') ? 'active' : '' }}">
                                <i class="nav-icon fas  fa-photo-video               "></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                    @endif

                        </li>
                        <li class="nav-item">
                    @if (Auth::user()->setting == 1)

                            <a href="{{ url('tags') }}"
                                class="nav-link {{ request()->is(/* 'tags' , 'tags/edit/*' , 'tags/add' */) ? 'active' : '' }}">
                                <i class="nav-icon fas  fa-cog    "></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                    @endif

                        </li>

                    <li class="nav-item">
                        <a href="{{ url('logout') }}" class="nav-link">
                            <i class="nav-icon fas  fa-sign-in-alt"></i>
                            <p>
                                logout
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
