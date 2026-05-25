@extends('layouts.plain')

@section('page-title', 'Story')

@section('content')

<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide" style="width: 100%;height: 100%;background-color: #000;">


        <!-- Wrapper for slides -->
        <div class="carousel-inner">

                <?php  
$folder ="normal-xhdpi";
                    $ext= "jpg";
                    if($book == '1') {
                        $ext = "png";
$folder="normal";
}

                    $fi = new FilesystemIterator('./comics/cards/'.$book.'/'.$story.'/'.$folder.'/story/', FilesystemIterator::SKIP_DOTS);
                    $panels= iterator_count($fi);
                ?>


            <div class="item active">

<div class="fill" style="background-image:url('./comics/cards/<?php echo $book;?>/<?php echo $story;?>/<?php echo $folder;?>/story/1.<?php echo $ext;?>');background-size: contain;background-repeat: no-repeat;"></div>

                <div class="carousel-caption" style="text-align: right;right: 70px;">
                    <h2>1 of <?php echo $panels; ?></h2>
                </div>
            </div>


                    
              <?php for($i=2;$i<=$panels;$i++): ?>
                
                <div class="item">

                    <?php
                    $ext= "jpg";
                    if($book == '1')
                        $ext = "png";
                    ?>
                    <div class="fill" style="background-image:url('./comics/cards/<?php echo $book;?>/<?php echo $story;?>/<?php echo $folder;?>/story/<?php echo $i;?>.<?php echo $ext;?>');background-size: contain;background-repeat: no-repeat;"></div>
                    <div class="carousel-caption" style="text-align: right;right: 70px;">
                        <h2><?php echo $i; ?> of <?php echo $panels; ?></h2>
                    </div>
                </div>

              <?php endfor; ?>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev" style="font-size: 60px;"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next" style="font-size: 60px;color: #777;"></span>
        </a>
    </header>

    <!-- Page Content -->
    
    <div class="container" style="margin-top: 50px;background-color: #fff;">
    </div>

    <!-- jQuery -->
    <script src="FB/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="FB/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $("#myCarousel").carousel({interval: 0, wrap: false})
    </script>

    <script>
    $(document).ready(function () {               // on document ready
    
    checkitem();
    
    });

    $('#myCarousel').on('slid.bs.carousel', checkitem);

    function checkitem()                        // check function
    {
        var $this = $('#myCarousel');
        if ($('.carousel-inner .item:first').hasClass('active')) {
            // Hide left arrow
            $this.children('.left.carousel-control').hide();
            // But show right arrow
            $this.children('.right.carousel-control').show();
        } else if ($('.carousel-inner .item:last').hasClass('active')) {
            // Hide right arrow
            $this.children('.right.carousel-control').hide();
            // But show left arrow
            $this.children('.left.carousel-control').show();
        } else {
            $this.children('.carousel-control').show();
        }
    }
    </script>
    

@stop
