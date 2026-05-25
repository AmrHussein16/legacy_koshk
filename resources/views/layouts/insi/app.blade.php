<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('insi_files/css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('insi_files/css/app.css') !!}" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.insi.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.insi.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.insi.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('insi_files/js/app.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>
</html>
