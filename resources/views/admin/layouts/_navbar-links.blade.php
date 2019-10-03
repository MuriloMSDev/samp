<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    @include('admin.layouts._navbar-messages')

    <!-- Notifications Dropdown Menu -->
    @include('admin.layouts._navbar-notifications')

    @if (user('admin'))
    <li class="nav-item">
        <a class="nav-link d-flex" data-widget="control-sidebar" data-slide="true" href="#">
            <img src="{{ asset('images/user.png') }}" class="img-circle align-self-center img-sm" alt="User Image">
        </a>
    </li>
    @endif
</ul>
