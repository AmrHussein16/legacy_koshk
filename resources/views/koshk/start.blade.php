@extends('layouts.plain')

@section('page-title', '- Home')

@section('content')

<div id="wrapper" style="background-color: white;">
        <div id="page-wrapper" class="gray-bg" style="margin-left: 0px;margin-top: 0px;">

        <div class="row" style="margin: 15px;">

            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <div class="row" style="margin-bottom: 10%;">

                </div>

                <div class="row">
                    <div>
                        <img src="{{ asset('assets/img/koshk-logo.png') }}" class="col-md-offset-4" alt="profile">
                    </div>
                    <div class="p-m">
                        <h2 class="m-xs" style="text-align: center;"></h2>

                        <h4 class="font-bold no-margins" style="text-align: center;">

                        </h4>
                        <h3 style="text-align: center;">Koshk Comics is a social website for comic artists to meet, collaborate and publish their comic books on our mobile apps on Apple and Android smart phones.</h3>
                    </div>
                </div>
                <div class="row">
                    @guest


                    <div class="col-md-6">

                    <div class="text-right" style="margin-top: 55px;">
                    <a href="{{ route('auth.login') }}">
                    <button type="submit" class="btn btn-primary m-t-n-xs" style="background-color: green;width: 150px;height: 50px;font-size: x-large;"><strong>Sign In</strong></button>
                    </a>
                    </div>

                    </div>
                <div class="col-md-6">

                    <div class="text-left" style="margin-top: 55px;">
                        <a href="{{ route('auth.register') }}">
                        <button type="submit" class="btn btn-primary m-t-n-xs" style="background-color: #ef3e79;width: 150px;border-color: #ef3e79;height: 50px;font-size: x-large;"><strong>Join</strong></button>
                        </a>
                    </div>

                </div>
                @else

                <div class="col-md-6">
                    <div class="text-right" style="margin-top: 55px;">
                        <a href="{{ route('home') }}">
                        <button type="submit" class="btn btn-primary m-t-n-xs" style="background-color: green;width: 150px;height: 50px;font-size: x-large;"><strong>Start</strong></button>
                        </a>
                    </div>
                </div>
                @role('Admin')
                <div class="col-md-6">
                    <div class="text-left" style="margin-top: 55px;">
                        <a href="{{ route('dashboard') }}">
                        <button type="submit" class="btn btn-primary m-t-n-xs" style="background-color: #ef3e79;width: 150px;border-color: #ef3e79;height: 50px;font-size: x-large;"><strong>Dashbaord</strong></button>
                        </a>
                    </div>
                </div>
                @endrole

                @endguest
                </div>
            </div>

            <div class="col-md-6 col-sm-6" style="padding: 0px;margin: -1px;border-color: #fff;border-width: 2px;border-style: solid;">
                <a href="{{ route('home') }}">
                    <img class="img-responsive img-portfolio img-hover" src="assets/content/home/koshkstart.jpg" alt="" style="margin-bottom: 0px;border-radius: 25px;">
                </a>
            </div>
        </div>

        <!--  WW3 brief start -->
        <div class="row" style="margin: 15px;">

                    <div class="row animated fadeInRight" style="margin: 0px;">

                        <div class="col-lg-12">
                            <bold> <h1 class="" style="margin-top: 15px;">Latest Events and Activities</h1> </bold>
                        </div>


                        <div class="col-lg-12">
                            <!-- <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>WWIII Exhibition at Malmo Stadsbibliotek, and Garaget</h5>
                                    <div class="pull-right">

                                    </div>
                                </div>
                            </div> -->

                             <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-lg-5">
                                        <ul class="stat-list">
                                            <li>
                                                <h1 class="" style="margin-top: 15px;">AltCom 2018 anthology - call for submissions!</h1>
                                                </br>
                                                <h2 class="" style="margin-top: 15px;">HOW TO SURVIVE A DICTATORSHIP!</h2>
                                                </br>
    <!--                                             <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div> -->
                                                <p>AltCom 2018 will take place August 23-26, (venues and program will be released during the coming months), with exhibitions, international guests, a comics fair, etc.
                                                    </br>
                                                    Join the anthology for AltCom 2018: HOW TO SURVIVE A DICTATORSHIP! Send us comics about your thoughts, experiences, strategy tips and tricks on the subject. As always in AltCom, we will hand the book out for free during and after the festival.

                                                </p>

                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('assets/content/producer/tusenserier/activities/altcom/cover.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="assets/content/community/koshk/activities/ww3/exhibition.jpg" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <ul class="stat-list">
                                            <li>
                                                <h1 class="" style="margin-top: 15px;">The WWIII Exhibition at Malmo Stadsbibliotek, and Garaget</h1>
                                                </br>
                                                </br>
    <!--                                             <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div> -->
                                                <p>World War III is an exhibition of new works, created to be shown in Malmö. The comics are selected by the comic platform Koshk Comics. Koshk allows Arabic comic artists to publish their works through a digital app instead of publishing houses. This is due to the strict rules for publishing in Egypt and the rest of the region.</p>

                                                <p>The exhibition contains works of satire and reflection where artists problematize contemporary society and global politics with comics as a medium. Comics allows for the hardest topics to become easy and the darkest ones to be humorous. Therefore, here are a number of artists whose comics discuss both daily life experiences as well as major political events. </p>

                                                <p>Koshk is invited by the organization Historielabbet – Gör om! Gör rätt! in order to expand the comic scene in Malmö with more artistic expressions and stories. With their initiative Koshk tries to provide a platform to the political voices that exist, but are not always heard. Through this invitation Koshk’s artists are able to exhibit their stories to new readers and to find new users for the app in Malmö, known as “comic capital of Sweden.”
                                                </p>

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-lg-5">
                                        <ul class="stat-list">
                                            <li>
                                                <h1 class="" style="margin-top: 15px;">Series, Society and Censorship!</h1>
                                                </br>
                                                </br>
    <!--                                             <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div> -->
                                                <p>How do different mediums and technical invations enable the publication of opinions? What can art and literature do for freedom of speech? How does censorship affect artistic practice? Explore different aspects of art in the political game in a talk with Magnus Nilsson (prof. in literary studies) and the comic network Koshk Comics from Egypt. Through their digital platform Koshk allows comic artist in the region to publish their works despite strict censorship. The talk is given in English and is organized by Kunskapsklubben, Folkuniversitetet.
                                                </p>

                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('assets/content/community/koshk/activities/ww3/8oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('assets/content/community/koshk/activities/ww3/15oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <ul class="stat-list">
                                            <li>
                                                <h1 class="" style="margin-top: 15px;">Workshop at Malmö Konsthall for children and young people. With Koshk Comics and Tusen Serier</h1>
                                                </br>
                                                </br>
    <!--                                             <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div> -->
                                                <p>Koshk Comics team is having a workshop together with the comic organisation in Malmö – Tusen Serier. It’s an open, drop-in workshop, so every age could come! Open workshop for children and young people with Koshk Comics from Egypt and Tusen Serier from Malmö.
                                                </p>

                                                <p>What language do you speak? Come and create comics in Swedish, English and Arabic. Together with Koshk Comics and Tusen Serier you get the opportunity to try to create your own character, your own comic-strip and make your own fanzine.
                                                </p>

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;">
                                    <div class="col-lg-5">
                                        <ul class="stat-list">
                                            <li>
                                                <h1 class="" style="margin-top: 15px;">Workshop at Malmö Konsthall for comic artists With Koshk Comics and Tusen Serier</h1>
                                                </br>
                                                </br>
    <!--                                             <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div> -->
                                                <p>Are you interested in comics? Perhaps already published or maybe you just started working on your own fanzine? Welcome to a workshop together with Koshk Comics from Egypt and Tusen Serier from Malmö about self-publishing and comic-making.</p>

                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('assets/content/community/koshk/activities/ww3/18oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
        </div>
        <!-- WW3 Brief End -->

        </div>

        <!-- Footer -->
        <footer>
        <div class="container" style="margin-top: -20px;">
        <hr>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Koshk Comics 2017</p>
                </div>
            </div>
        </div>
        </footer>

        </div>

@stop
