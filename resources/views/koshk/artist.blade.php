@extends('layouts.headeronly')

@section('page-title', 'Home')

@section('content')

<div class="wrapper wrapper-content">

        <!-- Arabic Comics Community -->
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 15px;">  
                <div class="no-padding" style="background: {{  'url(' .'../assets/content/community/'. $currentArtist->first()->alias. '/banner.jpg)' }} no-repeat;width: 100%;-webkit-background-size: 100%;">
                    
                    <div class="p-m">
                    <!-- 
                        <h1 class="m-xs">$ 1,540</h1>

                        <h3 class="font-bold no-margins">
                            Annual income
                        </h3>
                        <small>Income form project Alpha.</small> -->
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart1"></div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">

    <!--
        <div class="col-md-12">
            <div class="no-padding img-responsive img-portfolio img-hover" style="background: {{ url('content/community/koshk/profile.jpg') }} no-repeat;width: 100%;-webkit-background-size: 100%;"> 
        </div> -->

        
    </div>
    <div class="row animated fadeInRight" style="margin: 0px;">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Community Details</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentArtist->first()->alias.'/profile.jpg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong> {{ $currentArtist->first()->name }} </strong></h4>
                        <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentArtist->first()->email }}' target="_top"> {{ $currentArtist->first()->email }} </a></p>
                        <p><i class="fa fa-facebook"></i> <a href='{{ $currentArtist->first()->fb_page }}' target="_top"> {{ $currentArtist->first()->fb_page }} </a></p>
                        <p><i class="fa fa-globe"></i> <a href='{{ $currentArtist->first()->website }}' target="_top"> {{ $currentArtist->first()->website }} </a></p>
                        <h5>
                            Story
                        </h5>
                        <p>
                            {{ $currentArtist->first()->story }}
                        </p>
                        
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
                        <div class="user-button">
                            <div class="row">
                                {{ Form::open( array(
                                    'url' => 'community/'.$currentArtist->first()->alias,
                                    'method' => 'post',
                                    'id' => 'follow'
                                ) ) }}

                                @if($following)
                                <div class="col-md-6">
                                    <button id="followButton" type="submit" value="Follow" class="btn btn-primary btn-block"><i class="fa fa-check-circle-o"></i> Following</button>
                                </div>
                                @endif

                                @if(!$following)
                                <div class="col-md-6">
                                    <button id="followButton" type="submit" value="Follow" class="btn btn-default btn-block"><i class="fa fa-plus-circle"></i> Follow</button>
                                </div>
                                @endif

                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
            </div>
        </div>
            </div>
        <div class="col-md-8">
        <!--
        <div class="ibox float-e-margins" style="margin-left: 10px;margin-bottom: 10px;">
            <img alt="image" class="img-responsive" src="{{ url('content/community/koshk/cover.jpg') }}">
        </div> -->

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Workshops</h5>
                </div>
                <div class="ibox-content">

                    <div class="row" style="margin: 0px;">

                        <?php $noworkshops=true; ?>

                        <?php foreach($activities as $activity): ?>
                        
                        @if ($activity->type == 'workshop')
                            <?php $noworkshops=false ?>
                            <div class="col-md-6 col-sm-6" style="padding: 5px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                                <div class="ibox-title" style="border: 0px;">
                                    <h5>{{ $activity->name }}</h5>
                                </div>

                                <!-- <a href="comicbook?id=115">-->
                                <a href=" {{ url('community/'.$currentArtist->first()->alias.'/'.$activity->alias) }} ">

                                    <img class="img-responsive img-portfolio img-hover" src= {{  url('assets/content/community/'. $currentArtist->first()->alias. '/'.$activity->alias.'.jpg') }} alt="" style="margin-bottom: 0px;">
                                </a>
                            </div>
                        @endif 

                        <?php endforeach; ?>

                        @if ($noworkshops)
                            No Workshops Available ...
                        @endif
                        
                    </div>

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

                    <div class="row" style="margin: 0px;">

                        <?php $noevents=true; ?>
                        
                        <?php foreach($activities as $activity): ?>
                        
                        @if ($activity->type == 'event')
                            <?php $noevents=false ?>
                            <div class="col-md-6 col-sm-6" style="padding: 5px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                                <div class="ibox-title" style="border: 0px;">
                                    <h5>{{ $activity->name }}</h5>
                                </div>

                                <!-- <a href="comicbook?id=115">-->
                                <a href=" {{ url('community/'.$currentArtist->first()->alias.'/'.$activity->alias) }} ">
                                    
                                    <img class="img-responsive img-portfolio img-hover" src= {{  url('assets/content/community/'. $currentArtist->first()->alias. '/'.$activity->alias.'.jpg') }} alt="" style="margin-bottom: 0px;">
                                </a>
                            </div>
                        @endif 

                        <?php endforeach; ?>

                        @if ($noevents)
                            No Events Available ...
                        @endif
                        
                    </div>

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

                    <div class="row" style="margin: 0px;">

                        <?php $nochallenges=true; ?>
                        
                        <?php foreach($activities as $activity): ?>
                        
                        @if ($activity->type == 'challenge')
                            <?php $nochallenges=false ?>
                            <div class="col-md-6 col-sm-6" style="padding: 5px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                                <div class="ibox-title" style="border: 0px;">
                                    <h5>{{ $activity->name }}</h5>
                                </div>

                                <!-- <a href="comicbook?id=115">-->
                                <a href=" {{ url('community/'.$currentArtist->first()->alias.'/'.$activity->alias) }} ">

                                    <img class="img-responsive img-portfolio img-hover" src= {{  url('assets/content/community/'. $currentArtist->first()->alias. '/activities/'.$activity->alias.'/profile.jpg') }} alt="" style="margin-bottom: 0px;">
                                </a>
                            </div>
                        @endif 

                        <?php endforeach; ?>

                        @if ($nochallenges)
                            No Challenges Available ...
                        @endif
                        
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script> 

jQuery( document ).ready( function( $ ) {
 
    $( '#follow' ).on( 'submit', function() {
 
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
 
        $.post(
            // alert('hello');
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "community_id": {{ $currentArtist->first()->id }},
                "user_id": {{ $user['id'] }}
            },
            function( data ) {
                //do something with data/response returned by server
                //return false;

                //alert( JSON.stringify(data) );


                //alert(data.status);
                if(data.status) // Following
                {
                    document.getElementById("followButton").className = "btn btn-primary btn-block";
                    //document.getElementById('follow').style.visibility = 'hidden';
                    document.getElementById('followButton').innerHTML = "<i class='fa fa-check-circle-o'></i> Following";
                    
                }
                else
                {
                    document.getElementById("followButton").className = "btn btn-default btn-block";
                    document.getElementById('followButton').innerHTML = "<i class='fa fa-plus-circle'></i> Follow";
                    //document.getElementById('following').style.visibility = 'hidden';
                }
                //alert( data );
            },
            'json'
        );
 
        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );
 
} );

</script>

@stop
