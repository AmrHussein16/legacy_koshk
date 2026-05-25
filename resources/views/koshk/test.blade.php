@extends('layouts.headeronly')

@section('page-title', 'WWIII')

@section('content')

<div class="wrapper wrapper-content">

    <div class="row animated fadeInRight" style="margin: 0px;">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Koshk Comics</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/profile.jpg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong> {{ $currentActivity->first()->name }} </strong></h4>
                        <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentActivity->first()->email }}' target="_top"> {{ $currentActivity->first()->email }} </a></p>

                        <h5>
                            Story
                        </h5>
                        <p>
                            {{ $currentActivity->first()->story }}
                        </p>

                    </div>
            </div>
        </div>
            </div>

        <div class="col-md-8">

            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <div class="col-lg-12">
                    <div class="jumbotron">
                        <h2>COMICS FROM THE MIDDLE EAST AND BEYOND</h2>
                        <h3>Comics Exhibition, Talks and Workshops</h3>
                        <h3>In </h3><h3 style="color: #fcd116;">Malmö, <strong style="color: #005b99;">Sweden</strong></h3>

                        <p>During October, Historielabbet invites Koshk Comics from Egypt to Malmö to show comics from the region. Malmö is known as the “comic capital of Sweden” and now the artists from Koshk have the opportunity to show their works here. During October, talks and workshops will be held at Malmö Konsthall and the comics will be shown around Malmö.</p>
                        <p>In partnership with Historielabbet Handelsbolag, Kulturstråket Malmö, and the folkuniversitet Malmö/Lund.</p>

                    </div>
                </div>

                </div>
            </div>

            </div>

        </div>

                    <div class="row animated fadeInRight" style="margin: 0px;">
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
                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/exhibition.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
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
                                            <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/8oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="ibox-content" style="margin-top: 25px;">
                                <div class="row" style="margin-top: 25px;"> 
                                    <div class="col-lg-7">
                                        <div class="no-padding">
                                            <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/15oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
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
                                            <img alt="image" class="img-responsive" src="{{ url('content/community/'.$currentCommunity->first()->alias.'/activities/'.$currentActivity->first()->alias.'/18oct.jpg') }}" style="margin-bottom: 0px;border-radius: 25px;">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
</div>


<script>

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name={{ $currentActivity->first()->alias }}]").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      storytitletext: "required",
      storytext: "required"
    },
    // Specify validation error messages
    messages: {
      storytitletext: "Please enter a title for your Comic Story.",
      storytext: "Please enter a description for your Comic Story."
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {


    if(document.getElementById("IconImage").value.length < 1) {
        alert("Please add the story Icon Image file by locating files on your Computer!");
        return false;
    }
    else if(document.getElementById("FeatureImage").value.length < 1){
        alert("Please add the story Feature Image file by locating files on your Computer!");
        return false;
    }
    else if(document.getElementById("Story").value.length < 1){
        alert("Please add the story files by locating files on your Computer!");
        return false;
    }
    else if(!document.getElementById("terms").checked){
        alert("Please accept the submission terms!");
        return false;
    }
    else if(!document.getElementById("copyrights").checked) {
        alert("Please accept the Copyrights Statement!");
        return false;
    }
    else  {
        form.submit();
        return true;
    }

    }
  });
});

</script>

<script type="text/javascript" language="javascript">
    function checkform()
    {

    }
</script> 


@stop
