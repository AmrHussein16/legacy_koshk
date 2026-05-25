<!doctype html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ setting('app_name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ setting('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/vendor.css')) }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">


    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ setting('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />


    <link href="{{ url('FB/assets/css/Style.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ url('FB/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ url('assets/startassets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ url('FB/css/inspinia/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ url('FB/css/inspinia/animate.css') }}" rel="stylesheet">

    <link href="{{ url('FB/css/inspinia/style.css') }}" rel="stylesheet">

    {{-- <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        {{-- <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script> --}}



    <!-- Custom CSS -->
    <link href="{{ url('FB/css/modern-business.css') }}" rel="stylesheet">


    {{-- For production, it is recommended to combine following styles into one. --}}
    {!! HTML::style('assets/startassets/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('assets/startassets/css2/metisMenu.css') !!}
    {!! HTML::style('assets/startassets/css2/sweetalert.css') !!}
    {!! HTML::style('assets/startassets/css2/bootstrap-social.css') !!}



    @yield('styles')
    @hook('app:styles')
</head>
<body>
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar.main')

            <div class="content-page">
                <main role="main" class="px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="{{ url(mix('assets/js/vendor.js')) }}"></script>
    <script src="{{ url('assets/js/as/app.js') }}"></script>

    @hook('app:scripts')


    {{-- For production, it is recommended to combine following scripts into one. --}}
    {!! HTML::script('assets/js/jquery-3.3.1.min.js') !!}
    {!! HTML::script('assets/js/bootstrap.min.js') !!}
    {!! HTML::script('assets/js/metisMenu.min.js') !!}
    {!! HTML::script('assets/js/sweetalert.min.js') !!}
    {!! HTML::script('assets/js/delete.handler.js') !!}
    {!! HTML::script('assets/plugins/js-cookie/js.cookie.js') !!}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
    {!! HTML::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! HTML::script('assets/js/as/app.js') !!}
    @yield('scripts')
</body>
</html>
