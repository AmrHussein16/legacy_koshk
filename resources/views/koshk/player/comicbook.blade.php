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


<?php $i=0;?>
    <div class="container" style="margin-top: 50px;">
    <!-- Features Section -->
        <div class="row">

            <div class="col-md-6" style="padding-top: 8%;">
            
                <h1 style="text-align: center;"><?php echo $data[0]['catname'];?></h1>
                
                
                <ul style="margin-top: 50px;text-align: center;">
                    <?php echo $data[0]['catdesc'];?>
                </ul>

                

            </div>
            <div class="col-md-6">
                <!-- <a href="comicbook.php?id=<?php echo $book;?>"> -->  
                    <img class="img-responsive" src="./comics/cards/<?php echo $book; ?>/iphone4/img.jpg" alt="" style="padding: 15px;border-style: solid;border-width: 1px;border-color: #eee;">
                <!--  </a> -->
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><a href="https://apps.facebook.com/hitsevenapp">Home</a>
                     / <?php echo $data[0]['catname'];?>
                </h2>
            </div>
            
            <!-- COME BACK HERE -->
            <<!-- div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Animation without caption</h5>
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
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="carousel slide" id="carousel1">
                        <div class="carousel-inner">
                            <div class="item">
                                <img alt="image" class="img-responsive" src="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                            </div>
                            <div class="item active">
                                <img alt="image" class="img-responsive" src="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                            </div>
                            <div class="item">
                                <img alt="image" class="img-responsive" src="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                            </div>

                        </div>
                        <a data-slide="prev" href="#carousel1" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel1" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
 

        <div class="item gallery next left">
            <div class="row">
                <div class="col-sm-6">
                    <img alt="image" class="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                </div>
                <div class="col-sm-6">
                    <img alt="image" class="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                </div>
                <div class="col-sm-6">
                    <img alt="image" class="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                </div>
                <div class="col-sm-6">
                    <img alt="image" class="img-responsive" src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg">
                </div>
            </div>
        </div>
-->
        <hr>

        <div class="col-lg-12">
       
                <ul class="grid list-inline list-unstyled cs-style-1">
                    <?php for($i=0;$i<=$count;$i++): ?>
                    
                    <li>
                        
                        <figure>
                            
                            <img src="./comics/cards/<?php echo $book;?>/<?php echo $data[$i]['id'];?>/large/featured.jpg" alt="artwork">
                            <figcaption style="background: rgba(255,255,255,0.8);width: 120px;position: absolute;margin-left: 76%;">
                                
                            </figcaption>

                            <figcaption style="background: rgba(255,255,255,0.6);">
                                <a class="story_link" href="story?book=<?php echo $book;?>&id=<?php echo $data[$i]['id'];?>">

                                <div class="col-lg-9">
                                <strong> <h3 style="margin-right: 20px;"><?php echo $data[$i]['name'];?></h3> </strong>
                                <p class="lead"> </p>
                                <p class="lead role" style="padding-left: 20px;padding-right: 20px;margin-top: 40px;"><?php echo $data[$i]['description'];?></p>
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

        <!-- Portfolio Section
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Other cool Comic Books</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div>
         -->

        <hr>

        <!-- Call to Action Section  - can be used to link custom comic book social media
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>
        <hr>

        -->
        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Koshk Comics 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="FB/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="FB/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 0 //changes the speed
    })
    </script>


@stop
