@extends('front.layouts.main')

@section('title', 'Activity')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center"
            style="background: url({{ asset('content/community/'.$currentCommunity->first()->alias.'/'.$currentActivity->first()->alias.'.jpg') }}) 100% 100%">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">{{ $currentActivity->first()->name }}</h1>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!--- Activity Details -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title h4">Story</h2>
                    <p class="card-text">{{ $currentActivity->first()->story }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title h4">Event Details</h2>
                    <p class="card-text">{{ $currentActivity->first()->story }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
