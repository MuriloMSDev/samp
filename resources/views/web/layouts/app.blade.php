<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('web.layouts._head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('web.layouts._navbar')

        <!-- Main Sidebar Container -->
        @include('web.layouts._sidebar-left')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('web.layouts._content-header')

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
        @include('web.layouts._sidebar-right')

        <!-- Main Footer -->
        @include('web.layouts._footer')

        <!-- Flash Messages -->
        @include('flash::message')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script src="{{ mix('js/web/app.js') }}"></script>
</body>

</html>
