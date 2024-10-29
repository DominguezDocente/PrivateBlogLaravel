<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link  {{ Request::is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(\App\Helpers\RoleHelper::isAuthorized('Secciones.showSections'))

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('sections.*') ? '' : 'collapsed' }}" href="{{ route('sections.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Secciones</span>
                </a>
            </li>

        @endif

        @if(\App\Helpers\RoleHelper::isAuthorized('Blogs.showBlogs'))

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('blogs.*') ? '' : 'collapsed' }}" href="{{ route('blogs.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Blogs</span>
                </a>
            </li>

        @endif

    </ul>

</aside>
