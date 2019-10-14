<aside class="control-sidebar sidebar-dark-primary control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-0">
        <nav>
            <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ active('user.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>{{ __('attributes.my_account') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.projects.index') }}" class="nav-link {{ active('user.projects.*') }}">
                        <i class="nav-icon fas fa-book"></i>
                        <span>{{ __('attributes.my_projects') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.logout') }}" method="POST" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
