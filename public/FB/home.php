<?php
    if(isset($_GET['id'])) {
        $story = urlencode($_GET['id']);
        $fname = urlencode($_GET['fname']);
        $lname = urlencode($_GET['lname']);
        $fid = urlencode($_GET['fid']);
    } else {
        header("Location: index.php");
    }

    if(isset($_GET['book'])) {
        $book = urlencode($_GET['book']);
    } else {
        header("Location: index.php");
    }

            if (!$link = mysql_connect('localhost', 'hitsevey', 'TGfr4%6yh')) {
                echo 'Could not connect to mysql';
                exit;
            }


            if (!mysql_select_db('hitsevey_dev_comic', $link)) {
                echo 'Could not select database';
                exit;
            }

            
            $sSQL= 'SET CHARACTER SET utf8'; 
            mysql_query($sSQL,$link);

            // $sql    = 'SELECT * FROM `card`, 'category' where category_id ='. $book .' and id ='. $story;
            $sql = 'SELECT card.id AS id, card.name AS name, card.description AS description, category.name AS catname, category.id AS catid , card.panels_status AS panels_status FROM `card`, `category` where category.id = card.category_id AND category.id ='. $book .' and card.id ='. $story;

            $result = mysql_query($sql, $link);

            if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }
            

            $count=-1;
            while ($row = mysql_fetch_assoc($result)) {

                if($row['panels_status'] == '3')
                {
                    $count = $count+1;
                    $data[$count]['id'] = $row['id'];
                    
                    // echo 'count =' .$count;
                    //echo '   ';
                    //echo $data[$count]['id'];
                    
                    $data[$count]['name'] = $row['name'];
                    $data[$count]['description'] = $row['description'];
                    $data[$count]['catname'] = $row['catname'];
                }
            }

            
            mysql_free_result($result);

            //   ======================= QUERY THE FEATURED COMICS

            if (!$link = mysql_connect('localhost', 'hitsevey', 'TGfr4%6yh')) {
                echo 'Could not connect to mysql';
                exit;
            }


            if (!mysql_select_db('hitsevey_dev_comic', $link)) {
                echo 'Could not select database';
                exit;
            }

            
            $sSQL= 'SET CHARACTER SET utf8'; 
            mysql_query($sSQL,$link);

            // $sql    = 'SELECT * FROM `card`, 'category' where category_id ='. $book .' and id ='. $story;
            $sql = 'SELECT card.id AS cardid, card.name AS cardname, card.description AS carddesc, category.id AS catid, category.name AS catname, category.description AS catdesc, featured_comics.highlight AS highlight FROM `featured_comics`, `card`, `category` WHERE featured_comics.episode_id = card.id && card.category_id = category.id && category.id = featured_comics.comic_id';

            $result = mysql_query($sql, $link);

            if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }
            

            $count=-1;
            while ($row = mysql_fetch_assoc($result)) {

                $count = $count+1;
                $fav[$count]['cardid'] = $row['cardid'];
                $fav[$count]['cardname'] = $row['cardname'];
                $fav[$count]['carddesc'] = $row['carddesc'];

                $fav[$count]['catid'] = $row['catid'];
                $fav[$count]['catname'] = $row['catname'];
                $fav[$count]['catdesc'] = $row['catdesc'];

                $fav[$count]['highlight'] = $row['highlight'];
                
            }

            
            mysql_free_result($result);

            /*
            $fav[0]['catid'] = 11;
            $fav[0]['cardid'] = 6;
            $fav[0]['panelid'] = 17;
            $fav[0]['catname'] = ' Alf Leila La La Land';
            $fav[0]['cardname'] = ' Episode 11 ';

            $fav[1]['catid'] = 118;
            $fav[1]['cardid'] = 1;
            $fav[1]['panelid'] = 3;
            $fav[1]['catname'] = ' Nazly wy Lubna ';
            $fav[1]['cardname'] = ' Episode 1 ';

            $fav[2]['catid'] = 109;
            $fav[2]['cardid'] = 2;
            $fav[2]['panelid'] = 2;
            $fav[2]['catname'] = ' Lamis ';
            $fav[2]['cardname'] = ' Episode 2 ';

            $fav[3]['catid'] = 135;
            $fav[3]['cardid'] = 1;
            $fav[3]['panelid'] = 8;
            $fav[3]['catname'] = ' Adventures ';
            $fav[3]['cardname'] = ' Episode 1: Gad ';*/

            $fav_count = count($fav);
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

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/inspinia/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/inspinia/animate.css" rel="stylesheet">
    <link href="css/inspinia/style.css" rel="stylesheet">


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
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

        
            <div class="item active">
                <div class="fill col-lg-4" style="border-style:solid;border-width:1px;border-color:#fff;width:70%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[0]['catid'];?>/<?php echo $fav[0]['cardid'];?>/normal-hdpi/story/<?php echo $fav[0]['highlight'];?>.jpg');">
                <!-- <h2 style="color: #fff;background-color: rgba(245, 245, 245, 0.4);"> <?php echo $fav[0]['cardname'];?>  </h2> -->
                </div>

                <div class="fill col-lg-8" style="border-style:solid;border-width:1px;border-color:#fff;width:30%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[0]['catid'];?>/<?php echo $fav[0]['cardid'];?>/iphone4/img.jpg');">
                <h2 style="text-align: center;color: #fff;margin-top: 75%;"> <?php echo $fav[0]['catname'];?>  </h2>
                </div>

            </div>

            <!--
            <div class="item active">

                <div class="fill col-lg-4" style="border-style:solid;border-width:1px;border-color:#fff;width:70%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[0]['catid'];?>/<?php echo $fav[0]['cardid'];?>/normal-hdpi/story/<?php echo $fav[0]['panelid'];?>.jpg');">
            
                </div>


                <div class="fill col-lg-8" style="border-style:solid;border-width:1px;border-color:#fff;width:30%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[0]['catid'];?>/<?php echo $fav[0]['cardid'];?>/iphone4/img.jpg');">

                

                    <div  class="col-lg-12" style="width: 100%;background-color: rgba(0,0,0,.7);text-align: center;margin-top:45%"> 
                        
                        <p></p>
                        <h3 style="text-align: center;color: #fff;padding-top: 5px;"> <?php echo $fav[0]['cardname'];?>  </h3>
                        <p style="text-align: center;color: #fff;"> <?php echo $fav[0]['catname'];?> </p>
                        <p></p>

                    </div>
                </div>

            </div> -->

            <?php for($i=1;$i<$fav_count;$i++): ?>

            
            <div class="item">
                <div class="fill col-lg-4" style="border-style:solid;border-width:1px;border-color:#fff;width:70%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[$i]['catid'];?>/<?php echo $fav[$i]['cardid'];?>/normal-hdpi/story/<?php echo $fav[$i]['highlight'];?>.jpg');">
                <!-- <h2 style="color: #fff;background-color: rgba(200, 200, 200, 0.4);height: 130px"> <?php echo $fav[$i]['cardname'];?>  </h2> --> 
            </div>

            <div class="fill col-lg-8" style="border-style:solid;border-width:1px;border-color:#fff;width:30%;background-image:url('http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $fav[$i]['catid'];?>/<?php echo $fav[$i]['cardid'];?>/iphone4/img.jpg');">
                    <h2 style="text-align: center;color: #fff;margin-top: 75%;"> <?php echo $fav[$i]['catname'];?>  </h2>
                </div>
            </div>

            <?php endfor; ?>

            <!-- 
            <div class="item">
                <div class="fill" style="background-image:url('https://placeholdit.imgix.net/~text?txtsize=158&txt=Slide+Two&w=1900&h=540');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
            --> 
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>



    </header>

    <div class="container">
    <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                    <img src="http://graph.facebook.com/<?php echo $fid; ?>/picture?type=large" class="img-circle circle-border m-b-md" alt="profile" style="border-color: #ff2f69;">
                    <!--
                        <img src="http://graph.facebook.com/<?php echo $fid; ?>/picture?type=large" class="img-circle circle-border m-b-md" alt="profile">--> 
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    Welcome <strong><?php echo $fname; ?> <?php echo $lname; ?></strong>
                                </h2>
                                <h4>Comics Reader</h4>

                            <div class="vertical-timeline-icon yellow-bg" style="top: inherit;left: inherit;background-color: #ff2f69;border-color: #ff0;">
                                <i class="fa fa-comment"></i>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!--
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>142</strong> Projects
                            </td>
                            <td>
                                <strong>22</strong> Followers
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>61</strong> Comments
                            </td>
                            <td>
                                <strong>54</strong> Articles
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>154</strong> Tags
                            </td>
                            <td>
                                <strong>32</strong> Friends
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    --> 
                </div>
                <div class="col-md-3">
                    <!-- 
                    <small>Sales in last 24h</small>
                    <h2 class="no-margins">206 480</h2>
                    <div id="sparkline1"></div>
                    -->
                </div>


            </div>
            <hr>
    </div>

    <div class="container">

    <!-- Features Section -->
        <div class="row">
            <!-- 
            <div class="col-lg-12">
                <h2 class="page-header" style="border-bottom: 0px;">Episode of the Day</h2>
            </div> -->
            <div class="col-md-6" style="padding-top: 8%;">

                <h2 style="margin-top: -50px;text-align: center;padding-bottom: 80px;">Episode of the Day</h2>

                <h2 style="text-align: center;"><?php echo $data[0]['name'];?></h2>
                <strong> <h4 style="text-align: center;"><?php echo $data[0]['catname'];?></h4> </strong>

                <ul style="margin-top: 30px;text-align: center;">
                    <?php echo $data[0]['description'];?>
                </ul>

                <ul style="margin-top: 50px;">
                    <a href="story.php?book=<?php echo $book;?>&id=<?php echo $story;?>">
                    Read the Episode >
                    </a>
                </ul>

            </div>
            <div class="col-md-6 animated lightSpeedIn">
                <a href="story.php?book=<?php echo $book;?>&id=<?php echo $story;?>">
                    <img class="img-responsive" src="http://koshkcomics.com/koshk_dev/assets/cards/<?php echo $book;?>/<?php echo $story;?>/iphone4/img.jpg" alt="" style="padding: 15px;border-style: solid;border-width: 1px;border-color: #eee;">
                </a>
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
        <div class="row">
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=118">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/118/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=109">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/109/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=115">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/115/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=125">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/125/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=126">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/126/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="https://koshkcomics.com/FB/comicbook.php?id=108">
                    <img class="img-responsive img-portfolio img-hover" src="http://koshkcomics.com/koshk_dev/assets/cards/108/xlarge/featured.jpg" alt="" style="margin-bottom: 0px;">
                </a>
            </div>
        </div>
        <!-- /.row -->


        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="container">

                    <h1 class="page-header">
                        Comic Book of The Month:   <?php echo $data[0]['catname'];?>
                    </h1>
                    
                </div>
            </div>
            
<div class="col-lg-12">
       
       <?php

            if (!$link = mysql_connect('localhost', 'hitsevey', 'TGfr4%6yh')) {
                echo 'Could not connect to mysql';
                exit;
            }


            if (!mysql_select_db('hitsevey_dev_comic', $link)) {
                echo 'Could not select database';
                exit;
            }

            
            $sSQL= 'SET CHARACTER SET utf8'; 
            mysql_query($sSQL,$link);

            $sql    = 'SELECT * FROM `card` where category_id = 11 ORDER BY card.id  DESC';
            $result = mysql_query($sql, $link);

            if (!$result) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }
            

            $count=-1;
            while ($row = mysql_fetch_assoc($result)) {

                if($row['panels_status'] == '3')
                {
                    $count = $count+1;
                    $data[$count]['id'] = $row['id'];
                    
                    // echo 'count =' .$count;
                    //echo '   ';
                    //echo $data[$count]['id'];
                    
                    $data[$count]['name'] = $row['name'];
                    $data[$count]['description'] = $row['description'];
                }
            }

            
            mysql_free_result($result);

        ?>
        
        
        
                <ul class="grid list-inline list-unstyled cs-style-1">
                    <?php for($i=0;$i<=$count;$i++): ?>
                    
                    <!--
                    ?php echo 'i =' .$i;
                    echo '   ';
                    echo $data[$i]['id']; 
                    echo '   ';
                    echo $data[$i]['name'];
                    echo '   ';
                    echo $data[$i]['description'];
                    
                    -->
                    
                    <li>
                        
                        <figure>
                            
                            <img src="http://www.koshkcomics.com/koshk_dev/assets/cards/11/<?php echo $data[$i]['id'];?>/large/featured.jpg" alt="artwork">
                            <figcaption style="background: rgba(255,255,255,0.8);width: 120px;position: absolute;margin-left: 76%;">
                                
                            </figcaption>

                                <figcaption style="background: rgba(255,255,255,0.6);">
                                    <a class="story_link" href="story.php?id=<?php echo $data[$i]['id'];?>">
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

        
<!--
        <div class="container">

        <hr>

        
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">All Comic Books</a>
                </div>
            </div>
        </div>

        <hr>
        </div> -->

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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
