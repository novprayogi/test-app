<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@yield('title','AdminLTE')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
{{--                <li class="nav-item menu-open">--}}
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('groups.index')
                <li class="nav-item">
                    <a href="{{route('groups.index')}}" class="nav-link {{ (request()->is('groups*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Group
                        </p>
                    </a>
                </li>
                @endcan
                @can('members.index')
                <li class="nav-item">
                    <a href="{{route('members.index')}}" class="nav-link {{ (request()->is('members*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Member
                        </p>
                    </a>
                </li>
                @endcan
                @canany(['users.index','roles.index'])
                <li class="nav-item {{ (request()->is('users*')) ? 'menu-open' : '' || (request()->is('roles*')) ? 'menu-open' : '' || (request()->is('permissions*')) ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (request()->is('users*')) ? 'active' : '' || (request()->is('roles*')) ? 'active' : '' || (request()->is('permissions*')) ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Management System
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('users.index')
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                                <i class="far fa-address-book nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link {{ (request()->is('roles*')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        @endcan
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('permissions.index')}}" class="nav-link {{ (request()->is('permissions*')) ? 'active' : '' }}">--}}
{{--                                <i class="fa fa-filter nav-icon"></i>--}}
{{--                                <p>Permission</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    @endcanany
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
