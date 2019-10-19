<aside class="control-sidebar sidebar-dark-primary control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-0">
        <nav>
            <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">{{ __('attributes.admin') }}</li>
                <div class="nav-divider"></div>
                <li class="nav-item">
                    <a href="{{ route('admin.account.edit') }}" class="nav-link {{ active('admin.account.edit') }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ __('attributes.my_account') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" method="POST" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
