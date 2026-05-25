@extends('front.layouts.main')

@section('title', $currentActivity->first()->name)

@section('content')

<div class="wrapper wrapper-content">

    <div class="row animated fadeInRight" style="margin: 0px;">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Koshk Comics</h5>
                </div>
                <div>

                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive"
                            src="{{ asset('content/producer/'.$currentProducer->first()->alias.'/activities/'.$currentActivity->first()->alias.'/profile.jpg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong> {{ $currentActivity->first()->name }} </strong></h4>
                        <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentProducer->first()->email }}'
                                target="_top"> {{ $currentActivity->first()->email }} </a></p>
                        <!--                         <p><i class="fa fa-facebook"></i> <a href='{{ $currentProducer->first()->fb_page }}' target="_top"> {{ $currentActivity->first()->eventlink }} </a></p>
                        <p><i class="fa fa-globe"></i> <a href='{{ $currentProducer->first()->website }}' target="_top"> {{ $currentActivity->first()->website }} </a></p> -->
                        <h5>
                            Story
                        </h5>
                        <p>
                            {{ $currentActivity->first()->story }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h1> {{ $currentActivity->first()->name }} </h1>
                            <h2>CALL FOR ENTRIES</h2>
                            <h2>Comics Exhibition</h2>
                            <h3 style="color: #fcd116;">Malmö, <strong style="color: #005b99;">Sweden</strong></h3>

                            <h1 style="color: #00da00;"> Submission Complete </h1>
                            <h2>Good Luck {{ $user['first_name'] }}! </h2>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


@stop
