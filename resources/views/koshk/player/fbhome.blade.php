
@extends('layouts.plain')

@section('page-title', 'Home')

@section('content')

<!-- Header Carousel -->
<div class="row" style="background-color: #333;height:50px;">
    <div class="col-md-1" style="align:right;">
        <img src="http://graph.facebook.com/<?php echo $fid; ?>/picture?type=small" class="img-circle circle-border m-b-md" alt="profile" style="border-color: #000;width: 75px;height: 75px;margin-top: 10px;margin-left: 10px;">
    </div>
    <div class="col-md" style="align:left;">
                <h2 style="color: white;">
                Welcome <strong><?php echo $fname; ?> <?php echo $lname; ?></strong>
            </h2>
    </div>
</div>

    <div class="row" style="background-color: #000;height:50px;">
        
    </div>
    <!-- Page Content -->
    <div class="container" style="width: 100%;padding: 0px;">

        <!-- Portfolio Section
        <div class="row" style="margin: 0px;">
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=118">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/118/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=109">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/109/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=115">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/115/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=125">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/125/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=126">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/126/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="comicbook?id=108">
                    <img class="img-responsive img-portfolio img-hover" src="./comics/cards/108/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
        </div>
        /.row -->


        <!-- Marketing Icons Section -->


        @foreach ($bookslist as $row)

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <h1 class="page-header">
                        <?php echo $row['name'];?>
                    </h1>
                    
                </div>
            </div>
            
            <div class="col-lg-12">
                <ul class="grid list-inline list-unstyled cs-style-1">
                    <?php for($i=0;$i<=$count2;$i++): ?>
                        @if ($data[$i]['category_id'] == $row['category_id'])
                            <li>
                            <figure>
                                <img src="./comics/cards/<?php echo $row['category_id'];?>/<?php echo $data[$i]['id'];?>/large/featured.jpg" alt="artwork">
                                <figcaption style="background: rgba(255,255,255,0.8);width: 120px;position: absolute;margin-left: 76%;">
                                    
                                </figcaption>

                                    <figcaption style="background: rgba(255,255,255,0.6);">
                                        <a class="story_link" href="story?book=<?php echo $row['category_id'];?>&id=<?php echo $data[$i]['id'];?>">
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

                        @endif
                    
                    <?php endfor; ?>
                 
                </ul>
            </div>

        </div>

        @endforeach

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

    <!-- jQuery -->
    <script src="FB/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="FB/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

@stop
