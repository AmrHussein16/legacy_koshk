@extends('front.layouts.main')

@section('title', 'Producer Details')

@section('content')
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center"
            style="background: url({{ asset('assets/content/producer/'. $currentProducer->first()->alias .'/profile.jpg') }}) 100% 100%">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">{{ $currentProducer->first()->name }}</h1>
            </div>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <div class="card mb-4">
                <a href="javascript:;"><img class="card-img-top"
                        src="{{ asset('assets/content/producer/'. $currentProducer->first()->alias .'/profile.jpg') }}"
                        alt="..." /></a>
                <div class="card-body">

                    <!-- Story -->
                    <div class="my-5">
                        <h2 class="card-title h4">Story</h2>
                        <p>
                            {{ $currentProducer->first()->story }}
                        </p>
                    </div>

                    <!-- Workshops -->
                    <div class="my-5">
                        <h5>Workshops</h5>
                        <div class="row" style="margin: 0px;">
                            @forelse($activities->where('type', 'workshop') as $activity)
                            <div>
                                <h5>{{ $activity->name }}</h5>
                                <a
                                    href=" {{ url('producer/'.$currentProducer->first()->alias.'/'.$activity->alias) }} ">
                                    <img class="img-responsive img-portfolio img-hover card-img-top" src={{
                                        asset('assets/content/producer/'. $currentProducer->first()->alias.
                                    '/'.$activity->alias.'.jpg') }} alt="{{ $activity->name }}">
                                </a>
                            </div>
                            @empty
                            No Workshops Available ...
                            @endforelse
                        </div>
                    </div>

                    <!-- Events -->
                    <div class="my-5">
                        <h5>Events</h5>
                        <div class="row" style="margin: 0px;">
                            @forelse($activities->where('type', 'event') as $activity)
                            <div>
                                <div class="ibox-title" style="border: 0px;">
                                    <h5>{{ $activity->name }}</h5>
                                </div>
                                <a
                                    href=" {{ url('producer/'.$currentProducer->first()->alias.'/'.$activity->alias) }} ">
                                    <img class="img-responsive img-portfolio img-hover card-img-top" src={{
                                        url('assets/assets/content/producer/'. $currentProducer->first()->alias.
                                    '/'.$activity->alias.'.jpg') }} alt="" style="margin-bottom:
                                    0px;">
                                </a>
                            </div>
                            @empty
                            No Events Available ...
                            @endforelse
                        </div>
                    </div>

                    <!-- Challenges -->
                    <div class="my-5">
                        <h5>Challenges</h5>
                        <div class="row" style="margin: 0px;">
                            @forelse($activities->where('type', 'challenge') as $activity)
                            <div>
                                <div class="ibox-title" style="border: 0px;">
                                    <h5>{{ $activity->name }}</h5>
                                </div>
                                <a href="{{ url('producer/'.$currentProducer->first()->alias.'/'.$activity->alias) }}">
                                    <img class="img-responsive img-portfolio img-hover card-img-top" src={{
                                        url('assets/assets/content/producer/'. $currentProducer->first()->alias.
                                    '/'.$activity->alias.'.jpg') }} alt="{{ $activity->name }}" style="margin-bottom:
                                    0px;">
                                </a>
                            </div>
                            @empty
                            No Challenges Available ...
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <!-- Social Info -->
            <div class="card mb-5">
                <h2 class="card-title card-header h4">Soical info</h2>
                <div class="card-body">
                    <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentProducer->first()->email }}'
                            target="_top"> {{
                            $currentProducer->first()->email }} </a></p>
                    <p><i class="fa fa-facebook"></i> <a href='{{ $currentProducer->first()->fb_page }}' target="_top">
                            {{
                            $currentProducer->first()->fb_page }} </a></p>
                    <p><i class="fa fa-globe"></i> <a href='{{ $currentProducer->first()->website }}' target="_top"> {{
                            $currentProducer->first()->website }} </a></p>
                </div>
            </div>

            <!-- Producer counts  -->
            <div class="row m-t-lg">
                <div class="col-md-4">
                    <span class="bar"><strong>169</strong></span>
                    <h5>Posts</h5>
                </div>

                <div class="col-md-4">
                    <span class="line"><strong>28</strong></span>
                    <h5>Following</h5>
                </div>

                <div class="col-md-4">
                    <span class="bar"><strong>240</strong></span>
                    <h5>Followers</h5>
                </div>

            </div>

            <!-- Follow Button -->
            <div class="card my-5 user-button">
                <div class="row">
                    {{ Form::open( array(
                    'url' => 'producer/'.$currentProducer->first()->alias,
                    'method' => 'post',
                    'id' => 'follow'
                    ) ) }}
                    <input type="hidden" name="producer_id" value="{{ $currentProducer->first()->id }}">
                    <div class="card-body col-md-6">
                        @if($following)
                        <button id="followButton" type="submit" value="Follow" class="btn btn-danger btn-block"><i
                                class="fa fa-check-circle-o"></i>
                            Following</button>
                        @else
                        <button id="followButton" type="submit" value="Follow" class="btn btn-primary btn-block"><i
                                class="fa fa-plus-circle"></i> Follow</button>
                        @endif
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

            <!-- Followers List -->
            {{-- <div class="card my-5">
                <div class="card-header">Followers: {{ $followers->count() }} </div>
                <div class="card-body">
                    <div class="list-group" style="overflow-y: scroll;height: 400px;">
                        @forelse($followers as $follower)
                        <a href="https://www.koshkcomics.com/public/user/{{ $follower->id }}/public"
                            class="list-group-item">
                            <img class="img-circle" src="{{ $follower->avatar }}">
                            &nbsp; <strong>{{ $follower->first_name }} {{ $follower->last_name }}</strong>
                        </a>
                        @empty
                        No Followers Yet ...
                        @endforelse
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
@endsection
