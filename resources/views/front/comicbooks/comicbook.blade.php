@extends('front.layouts.main')

@section('title', 'Communities')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center"
            style="background: url({{ asset('comics/cards/'. $book.'/iphone4/img.jpg') }}) 100% 100%">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">{{ $data[0]['catname'] }}</h1>
                <p class="fs-4">{{ $data[0]['catdesc'] }}</p>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <a href="https://apps.facebook.com/hitsevenapp">Home</a>
                / {{ $data[0]['catname'] }}
            </h2>
        </div>
        <!-- Blog entries-->
        @for($i = 0; $i <= $count; $i++) <!--- Comic Book -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <a href="{{ url('story?book='.$book.'&id='.$data[$i]['id']) }}"><img class="card-img-top"
                            src="{{ asset('comics/cards/'.$book . '/' . $data[$i]['id'] .'/large/featured.jpg') }}"
                            alt="..." /></a>
                    <div class="card-body">
                        <h2 class="card-title h4">{{ $data[$i]['name'] }}</h2>
                        <p class="card-text">{{ $data[$i]['description'] }}</p>
                        <a class="btn btn-primary" href="{{ url('story?book='.$book.'&id='.$data[$i]['id']) }}">Read
                            more →</a>
                    </div>
                </div>
            </div>
            @endfor
    </div>
</div>
@endsection
