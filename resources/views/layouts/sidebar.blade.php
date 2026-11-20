<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (\App\Helpers\RoleHelper::isAuthorized('sections.show'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('sections.index') }}">
                    <i class="bi bi-block"></i>
                    <span>Secciones</span>
                </a>
            </li>
        @endif


        @if (\App\Helpers\RoleHelper::isAuthorized('users.show'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Usuarios</span>
                </a>
            </li>
        @endif


        @if (\App\Helpers\RoleHelper::isAuthorized('roles.show'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('roles.index') }}">
                    <i class="bi bi-lock"></i>
                    <span>Roles</span>
                </a>
            </li>
        @endif

    </ul>

</aside>
