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
                @if (user('admin'))
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('attributes.admin_area') }}</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active('home') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ __('attributes.home') }}</p>
                    </a>
                </li>
                @if (!user())
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link" data-toggle="modal" data-target="#login-modal">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>{{ __('Login') }} / {{ __('Register') }}</p>
                    </a>
                </li>
                @endif

                @hasSection('sidebar')
                @yield('sidebar')
                @else
                @include('shared.layouts._sidebar-languages')
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
