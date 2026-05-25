@extends('layouts.app')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop

@section('content')
@include('partials.messages')


<div class="wrapper wrapper-content">

        <!-- Arabic Comics Community -->
        <div class="row">
            <div class="col-lg-12">  
<!--                 <div class="no-padding" style="background: {{  'url(' .'content/community/banner.jpg)' }} no-repeat;width: 100%;-webkit-background-size: 100%;"> -->
                    
                    <div class="p-m">
                    
                        <h1 class="m-xs">Communities</h1>

                        <!-- <h3 class="font-bold no-margins">
                            Annual income
                        </h3>
                        <small>Income form project Alpha.</small> -->
                    </div>
                </div>
            </div>
        </div>

    
    <?php for($i=0;$i<$communities->count();$i++): ?>

        @if (($i%3)==0)
        <div class="row animated fadeInRight" style="margin: 0px;">
        @endif

        
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h4><strong> {{ $communities[$i]->name }} </strong></h4>
                    </div>
                    <a href=" {{ url('community/'.$communities[$i]->alias) }} " style="color: #000;">
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" src="{{ url('assets/content/community/'.$communities[$i]->alias.'/profile.jpg') }}" style="margin-top: 10px;">
                        </div>
                    </a>
                        <div class="ibox-content profile-content">
                            <h5>
                                Story
                            </h5>
                            <p>
                                {{ substr($communities[$i]->story,0,300)  }}
                            </p>
                        </div>
                </div>
            </div>

        @if ((($i+1)%3)==0)
        </div>
        @endif

    <?php endfor; ?>

        

    </div>
</div>

@stop
