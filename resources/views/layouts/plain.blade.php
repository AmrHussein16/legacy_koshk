<!doctype html>
<html lang="en">
<head>

    <title>{{ env('APP_NAME', 'Koshk Comics') }} @yield('page-title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />

    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

    <link rel="stylesheet" href="assets/startassets/css/bootstrap.min.css"/>
    <link href="assets/startassets/css/Style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/startassets/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="assets/startassets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/startassets/css/inspinia/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="assets/startassets/css/inspinia/animate.css" rel="stylesheet">
    <link href="assets/startassets/css/inspinia/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/startassets/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/startassets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    {{-- For production, it is recommended to combine following styles into one. --}}
    {!! HTML::style('assets/startassets/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/startassets/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('assets/startassets/css2/metisMenu.css') !!}
    {!! HTML::style('assets/startassets/css2/sweetalert.css') !!}
    {!! HTML::style('assets/startassets/css2/bootstrap-social.css') !!}
    {!! HTML::style('assets/startassets/css2/app.css') !!}

</head>
<body style="padding-top: 0px;">

@yield('content')

</body>
</html>
