<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="{{ route('home.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
        </li>

        @if (\App\Helpers\RoleHelper::isAuthorized('showSections'))
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('sections.*') ? '' : 'collapsed' }}" href="{{ route('sections.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Secciones</span>
                </a>
            </li>
        @endif

        @if (\App\Helpers\RoleHelper::isAuthorized('showBlogs'))
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('blogs.*') ? '' : 'collapsed' }}" href="{{ route('blogs.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Blogs</span>
                </a>
            </li>
        @endif

        @if (\App\Helpers\RoleHelper::isAuthorized('showUsers'))
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('users.*') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        @endif

        @if (\App\Helpers\RoleHelper::isAuthorized('showRoles'))
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('roles.*') ? '' : 'collapsed' }}" href="{{ route('roles.index') }}">
                    <i class="bi bi-lock"></i>
                    <span>Roles</span>
                </a>
            </li>
        @endif

    </ul>

</aside>
