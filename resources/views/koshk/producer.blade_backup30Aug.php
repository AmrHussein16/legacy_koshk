@extends('layouts.headeronly')

@section('page-title', 'Home')

@section('content')

<div class="wrapper wrapper-content">

    <div class="row">

    <!--
        <div class="col-md-12">
            <div class="no-padding img-responsive img-portfolio img-hover" style="background: {{ url('content/producer/koshk/profile.jpg') }} no-repeat;width: 100%;-webkit-background-size: 100%;"> 
        </div> -->

        
    </div>
    <div class="row animated fadeInRight" style="margin: 0px;">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Producer Details</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ url('content/producer/'.$currentProducer->first()->alias.'/profile.jpg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong> {{ $currentProducer->first()->name }} </strong></h4>
                        <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentProducer->first()->email }}' target="_top"> {{ $currentProducer->first()->email }} </a></p>
                        <p><i class="fa fa-facebook"></i> <a href='{{ $currentProducer->first()->fb_page }}' target="_top"> {{ $currentProducer->first()->fb_page }} </a></p>
                        <p><i class="fa fa-globe"></i> <a href='{{ $currentProducer->first()->website }}' target="_top"> {{ $currentProducer->first()->website }} </a></p>
                        <h5>
                            Story
                        </h5>
                        <p>
                            {{ $currentProducer->first()->story }}
                        </p>
                        <!-- 
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>169</strong> Posts</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>28</strong> Following</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                <h5><strong>240</strong> Followers</h5>
                            </div>
                        </div> 
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
            </div>
        </div>
            </div>
        <div class="col-md-8">
        <!--
        <div class="ibox float-e-margins" style="margin-left: 10px;margin-bottom: 10px;">
            <img alt="image" class="img-responsive" src="{{ url('content/producer/koshk/cover.jpg') }}">
        </div> -->

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Workshops</h5>
                    <!--
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>
                <div class="ibox-content">

                    

                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Events</h5>
                    <!--
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>
                <div class="ibox-content">

                    

                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Challenges</h5>
                    <!--
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->
                </div>
                <div class="ibox-content">

                    

                </div>
            </div>

        </div>
    </div>
</div>

@stop
