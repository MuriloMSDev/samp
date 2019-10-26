<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    @include('shared.layouts._navbar-search')

    <ul class="navbar-nav ml-auto">
        @if (user('admin'))
        <li class="nav-item">
            <a class="nav-link d-flex" data-widget="control-sidebar" data-slide="true" href="#">
                <img src="{{ asset('images/user.png') }}" class="img-circle align-self-center img-sm" alt="User Image">
            </a>
        </li>
        @endif
    </ul>
</nav>
