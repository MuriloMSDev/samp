<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'SAMP') }} Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'SAMP') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active('home') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ __('attributes.home') }}</p>
                    </a>
                </li>

                @if (user('admin'))
                <li class="nav-header">{{ __('attributes.admin') }}</li>
                <div class="nav-divider"></div>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('attributes.admin_area') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('attributes.users') }}</p>
                    </a>
                </li>
                @endif

                @if (!user())
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link" data-toggle="modal" data-target="#login-modal">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>{{ __('Login') }} / {{ __('Register') }}</p>
                    </a>
                </li>
                @endif

                @include('shared.layouts._sidebar-languages')
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
