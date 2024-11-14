<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Wellcome (user)->name to Admin Dashboard ')</title>
    <!-- Favicon icon -->
    @include('admin.layouts.partials.css')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('admin.layouts.components.preloader')
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.layouts.components.nav-header')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.layouts.components.header')

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.layouts.components.side-bar')

        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
                            Content body start
                        ***********************************-->
        @yield('content')
        <!--**********************************
                            Content body end
                        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    @include('admin.layouts.partials.js')

    <!--**********************************
        Scripts
    ***********************************-->
</body>

</html>
