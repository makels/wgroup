<!-- Brand Logo -->
<a href="{{ route('admin') }}" class="brand-link">
    <span class="brand-text font-weight-light">{{ config('app.full_name') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route("user", ["user_id" => auth()->user()->id]) }}" class="d-block">
                <i class="far fa-user-circle nav-icon"></i>
                {{ auth()->user()->name }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route("admin") }}" class="nav-link @if(Helper::currentRoute() == 'admin') active @endif">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                       {{ __("Dashboard") }}
                    </p>
                </a>
            </li>
            @if( auth()->user()->hasRole(auth()->user()::ADMIN))
            <li class="nav-item @if(in_array(Helper::currentRoute(), ['users', 'user', 'create_user'])) menu-is-opening menu-open @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __("Users") }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("users") }}" class="nav-link  @if(Helper::currentRoute() == 'users') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __("Users List") }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("create_user") }}" class="nav-link  @if(Helper::currentRoute() == 'create_user') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __("Create User") }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="nav-item @if(in_array(Helper::currentRoute(), ['posts', 'post', 'create_post'])) menu-is-opening menu-open @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-paper-plane"></i>
                    <p>
                        {{ __("Posts") }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("posts") }}" class="nav-link  @if(Helper::currentRoute() == 'posts') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            @if(auth()->user()->role == auth()->user()::WRITER)
                                <p>{{ __("My Posts") }}</p>
                            @else
                                <p>{{ __("Posts List") }}</p>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("create_post") }}" class="nav-link  @if(Helper::currentRoute() == 'create_post') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __("Create Post") }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route("logout") }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                    <p>{{ __("Logout") }}</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
<!-- /.sidebar-menu -->
</div>
