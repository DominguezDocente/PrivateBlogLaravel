<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? '' : 'collapsed' }}" href="{{ route('home.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('sections.*') ? '' : 'collapsed' }}" href="{{ route('sections.index') }}">
                <i class="bi bi-grid"></i>
                <span>Secciones</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('blogs.*') ? '' : 'collapsed' }}" href="{{ route('blogs.index') }}">
                <i class="bi bi-grid"></i>
                <span>Blogs</span>
            </a>
        </li>

    </ul>

</aside>
