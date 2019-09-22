<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('shared.layouts._head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('shared.layouts._navbar')

        <!-- Main Sidebar Container -->
        @include('shared.layouts._sidebar-left')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('shared.layouts._content-header')

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('shared.layouts._sidebar-right')

        <!-- Modals -->
        @include('shared.layouts._modals')

        <!-- Main Footer -->
        @include('shared.layouts._footer')

        <!-- Flash Messages -->
        @include('flash::message')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="{{ mix('js/shared/app.js') }}"></script>
</body>

</html>
