@extends('layouts.headeronly')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Dashboard')
    </li>
@stop

@section('content')
@include('partials.messages')


    <div class="container">

    <!-- Features Section -->
        
        <div class="row" style="margin: 0px;">
        
            <div class="col-md-6 animated lightSpeedIn">
                <a href="story?book=<?php echo $book;?>&id=<?php echo $story;?>">
                    <img class="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $story;?>/iphone4/img.jpg" alt="" style="padding: 15px;border-style: solid;border-width: 1px;border-color: #eee;">
                </a>
            </div>

            <div class="col-md-6" style="padding-top: 8%;">

                <h2 style="margin-top: -50px;text-align: center;padding-bottom: 80px;">Episode of the Day</h2>

                <h2 style="text-align: center;"><?php echo $today[0]['name'];?></h2>
                <strong> <h4 style="text-align: center;"><?php echo $today[0]['catname'];?></h4> </strong>

                <ul style="margin-top: 30px;text-align: center;">
                    <?php echo $today[0]['description'];?>
                </ul>

                <ul style="margin-top: 50px;">
                    <a href="story?book=<?php echo $book;?>&id=<?php echo $story;?>">
                    Read the Episode >
                    </a>
                </ul>

            </div>

        </div>
        <!-- /.row -->

        <div class="col-lg-12">
                <h2 class="page-header"">New Comic Books we love</h2>
        </div>
        
    </div>

    <!-- Page Content -->
    <div class="container" style="width: 100%;padding: 0px;">

        <!-- Portfolio Section -->
        <div class="row" style="margin: 0px;">
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=1">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/1/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>

            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=11">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/11/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>

            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=76">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/76/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>

            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=96">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/96/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>

            
        </div>
        <!-- /.row -->



        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="container">

                    <h1 class="page-header">
                        Comic Book of The Month:   <?php echo $today[0]['catname'];?>
                    </h1>
                    
                </div>
            </div>
            
            <div class="col-lg-12">
            
        
        
                <ul class="grid list-inline list-unstyled cs-style-1">
                    <?php for($i=0;$i<=4;$i++): ?>
                    
                    <li>
                        
                        <figure>
                            
                            <img src="./comics/cards/11/<?php echo $data[$i]['id'];?>/large/featured.jpg" alt="artwork">
                            <figcaption style="background: rgba(255,255,255,0.8);width: 120px;position: absolute;margin-left: 76%;">
                                
                            </figcaption>

                                <figcaption style="background: rgba(255,255,255,0.6);">
                                    <a class="story_link" href="story?book=11&id=<?php echo $data[$i]['id'];?>">
                                        <div class="col-lg-9">

                                        <strong> <h3 style="margin-right: 20px;"><?php echo $data[$i]['name'];?></h3> </strong>
                                        <p class="lead"> </p>
                                        <p class="lead role" style="padding-left: 20px;padding-right: 20px;margin-top: 40px;"><?php echo $data[$i]['description'];?></p>
                                        </div>
                                        <div class="col-lg-3">
                                        <i class="fa fa-share-alt" style="top: 0px;"></i>
                                        </div>
                                    </a> 
                                </figcaption>
                             
                        </figure>
                       
                    </li>
                    
                    <?php endfor; ?>
                 
                    </ul>
        
        </div>

        </div>
        <!-- /.row -->


        <!-- Footer -->
        <footer>
        <div class="container">
        <hr>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Koshk Comics 2017</p>
                </div>
            </div>
        </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- Script to Activate the Carousel 
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> -->

@stop
