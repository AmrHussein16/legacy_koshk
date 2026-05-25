@extends('front.layouts.main')

@section('title', 'Communities')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Communities</h1>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        @for($i = 0; $i < $communities->count(); $i++)
            <!--- Comic Book -->
            <div class="col-lg-6">
                <div class="card mb-4">
                    <a href="{{ url('community/'.$communities[$i]->alias) }}"><img class="card-img-top"
                            src="{{ asset('assets/content/community/'.$communities[$i]->alias.'/profile.jpg') }}"
                            alt="..." /></a>
                    <div class="card-body">
                        <h2 class="card-title h4">{{ $communities[$i]->name }}</h2>
                        <p class="card-text">{{ substr($communities[$i]->story,0,200) }}</p>
                        <a class="btn btn-primary" href="{{ url('community/'.$communities[$i]->alias) }}">Read
                            more →</a>
                    </div>
                </div>
            </div>
            @endfor
    </div>
</div>
@endsection
