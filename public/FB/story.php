<?php
    if(isset($_GET['id'])) {
        $story = urlencode($_GET['id']);
    } else {
        header("Location: index.php");
    }

    if(isset($_GET['book'])) {
        $book = urlencode($_GET['book']);
    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <meta name="viewport" content="width=device-width"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <link rel="icon" href="assets/img/favicon.ico"/>
        <title>Koshk Comics on Facebook</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
        <link href="assets/css/Style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <title>Koshk Comics on Facebook</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="padding-top: 0px;">

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide" style="width: 100%;height: 100%;">
    
        <!-- Indicators 
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

                <?php 
                    $fi = new FilesystemIterator('../../../public_html/koshk_dev/assets/cards/'.$book.'/'.$story.'/normal-xhdpi/story/', FilesystemIterator::SKIP_DOTS);
                    $panels= iterator_count($fi);
                ?>
                
            <div class="item active">
                <div class="fill" style="background-image:url('http://www.koshkcomics.com/koshk_dev/assets/cards/<?php echo $book;?>/<?php echo $story;?>/normal-xhdpi/story/1.jpg');background-size: 100% 100%;"></div>
                <div class="carousel-caption">
                    <h2>1 of <?php echo $panels; ?></h2>
                </div>
            </div>


                    
              <?php for($i=2;$i<=$panels;$i++): ?>
                
                <div class="item">
                    <div class="fill" style="background-image:url('http://www.koshkcomics.com/koshk_dev/assets/cards/<?php echo $book;?>/<?php echo $story;?>/normal-xhdpi/story/<?php echo $i;?>.jpg');background-size: 100% 100%;"></div>
                    <div class="carousel-caption">
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
            <span class="icon-next" style="font-size: 60px;"></span>
        </a>
    </header>

    <!-- Page Content -->
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

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
    

</body>

</html>
