@extends('front.layouts.main')

@section('title', 'Home')


@section('content')

<!-- Page header with logo and tagline-->
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center"
            style="background: url({{ asset('comics/cards/'. $book.'/'. $story.'/iphone4/img.jpg') }}) 100% 100%">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Episode of the Day</h1>
                <h2 style="text-align: center;">
                    <?php echo $today[0]['name'];?>
                </h2>
                <strong>
                    <h4 style="text-align: center;">
                        {{ $today[0]['catname'] }}
                    </h4>
                </strong>

                <p class="fs-4">{{ $today[0]['description'] }}</p>
                <a class="btn btn-primary btn-lg" href="story?book=<?php echo $book;?>&id=<?php echo $story;?>">Read the
                    Episode ></a>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <h2 class="page-header">New Comic Books we love</h2>
            <div class="row">
                <!--- Comic Book -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ url('comicbook?id=1') }}"><img class="card-img-top"
                                src="{{ asset('comics/cards/1/xlarge/featured.jpg') }}" alt="..." /></a>
                        <div class="card-body">

                            <a class="btn btn-primary" href="{{ url('comicbook?id=1') }}">Read more →</a>
                        </div>
                    </div>
                </div>
                <!--- Comic Book -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ url('comicbook?id=11') }}"><img class="card-img-top"
                                src="{{ asset('comics/cards/11/xlarge/featured.jpg') }}" alt="..." /></a>
                        <div class="card-body">

                            <a class="btn btn-primary" href="{{ url('comicbook?id=11') }}">Read more →</a>
                        </div>
                    </div>
                </div>
                <!--- Comic Book -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ url('comicbook?id=76') }}"><img class="card-img-top"
                                src="{{ asset('comics/cards/76/xlarge/featured.jpg') }}" alt="..." /></a>
                        <div class="card-body">

                            <a class="btn btn-primary" href="{{ url('comicbook?id=76') }}">Read more →</a>
                        </div>
                    </div>
                </div>
                <!--- Comic Book -->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ url('comicbook?id=96') }}"><img class="card-img-top"
                                src="{{ asset('comics/cards/96/xlarge/featured.jpg') }}" alt="..." /></a>
                        <div class="card-body">

                            <a class="btn btn-primary" href="{{ url('comicbook?id=96') }}">Read more →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <h2 class="page-header">New Comic Books we love</h2>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @for ($i = 0; $i < 5; $i++) <!-- Blog post-->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <a href="{{ url('story?book=11&id=' . $data[$i]['id']) }}"><img class="card-img-top"
                                    src="{{ asset('comics/cards/11/'. $data[$i]['id'] .'/large/featured.jpg') }}"
                                    alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title h4">{{ $data[$i]['name'] }}</h2>
                                <p class="card-text">{{ $data[$i]['description'] }}</p>
                                <a class="btn btn-primary" href="{{ url('story?book=11&id=' . $data[$i]['id']) }}">Read
                                    more →</a>
                            </div>
                        </div>
                    </div>
                    @endfor
            </div>
        </div>
        {{-- @include('front.layouts.side-widgets') --}}
    </div>
</div>

@endsection
