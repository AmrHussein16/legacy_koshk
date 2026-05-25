@extends('layouts.headeronly')

@section('page-title', 'AltCom Festival')

@section('content')

<div class="wrapper wrapper-content">

    <div class="row animated fadeInRight" style="margin: 0px;"> 
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tusen Serier</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ url('assets/content/producer/'.$currentProducer->first()->alias.'/activities/'.$currentActivity->first()->alias.'/profile.jpg') }}">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong> {{ $currentActivity->first()->name }} </strong></h4>
                        <p><i class="fa fa-envelope"></i> <a href='mailto:{{ $currentActivity->first()->email }}' target="_top"> {{ $currentActivity->first()->email }} </a></p>
                        <!--
                        <p><i class="fa fa-facebook"></i> <a href='{{ $currentProducer->first()->fb_page }}' target="_top"> {{ $currentActivity->first()->eventlink }} </a></p>
                        <p><i class="fa fa-globe"></i> <a href='{{ $currentProducer->first()->website }}' target="_top"> {{ $currentActivity->first()->website }} </a></p> -->
                        <h5>
                            Story
                        </h5>
                        <p>
                            Koshk Comics is partnering with Tusen Serier to host a part of their "HOW TO SURVIVE A DICTATORSHIP!" exhibition next August during the Altcom Festival in Malmo, Sweden.
                        </p>
                        <p>
                            {{ $currentActivity->first()->story }}
                        </p>
                        <!-- 
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>169</strong> Posts</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                <h5><strong>28</strong> Following</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                <h5><strong>240</strong> Followers</h5>
                            </div>
                        </div> 
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div> -->
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
                <!-- 
                <div class="ibox-title">
                    <h5>Call for Entries</h5>
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
                    </div>
                </div> -->
                <div class="ibox-content">



                    <div class="col-lg-12">



                    <div class="jumbotron">

                    <div class="col-lg-12" style="padding-bottom: 30px;margin: -1px;">
                        <a href="{{ url('producer/tusenserier/altcom') }}">
                            <img class="img-responsive img-portfolio img-hover" src="https://www.koshkcomics.com/public/assets/content/producer/tusenserier/activities/altcom/cover.jpg" alt="" style="margin-bottom: 0px;border-radius: 25px;">
                        </a>
                    </div>

                        <h1>AltCom 2018: HOW TO SURVIVE A DICTATORSHIP!</h1>
                        <h2>CALL FOR ENTRIES</h2>
                        <h2>Comics Exhibition at Altcom Festival</h2>
                        <h3 style="color: #fcd116;">Malmö, <strong style="color: #005b99;">Sweden</strong></h3>
                        <p>AltCom 2018 will take place August 23-26, (venues and program will be released during the coming months), with exhibitions, international guests, a comics fair, etc. e </p>
                        <p>This year we combine the comics festival with the TRAUMA noise festival. More information will be found at http://www.altcomfestival.se</p>
                        <h3><strong>Submission Deadline: 15-July-2018</strong></h3>

                        <!-- 
                        <p></p>

                        <p><a role="button" class="btn btn-primary btn-lg">Learn more</a> </p> 
                        
                        <p> <strong> Our Partners </strong> </p>

                        <p> <strong> Historielabbet Handelsbolag </strong> </p>
                        <p> Our Partners and co-organizers. </p>

                        <p> <strong> Malmö Konsthall </strong> </p>
                        <p> Malmö Konsthall was opened in 1975 and is one of Europe’s largest exhibition halls for contemporary art.  </p>

                        <p> <strong> Kulturstråket Malmö </strong> </p>
                        <p> Sponsoring and organizing several of Malmö cultural institutions, the mission of the Kulturstråket is to tie together existing ones and create new meeting places for Malmö residents and visitors.  </p>

                        <p> <strong>  The Folkuniversitet Malmö/Lund </strong> </p>
                        <p> Folkuniversitetet offers a wide range of adult education courses throughout Sweden and in several European countries. Our idea is to give people the tools to have a richer life through knowledge and creation. </p>-->
                    </div>
                </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Send New Submission <small>(You can send as much as you want "separately").</small></h5>
                            
                        </div>
                        <div class="ibox-content">
                            
                            {{ Form::open(array('url'=>'/producer/'.$currentProducer->first()->alias.'/'.$currentActivity->first()->alias,'files'=>true, 'class'=>'form-horizontal', 'name'=>$currentActivity->first()->alias)) }}
                                <div class="form-group"><label class="col-lg-2 control-label">Full Name</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="{{ $user['first_name'].' '.$user['last_name']}}" class="form-control"></div>
                                </div>

                                <div class="form-group"><label class="col-lg-2 control-label">Email</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="{{ $user['email'] }}" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Story Title</label>
                                    <div class="col-sm-10"><input id="storytitletext" name="storytitletext" type="text" class="form-control"> <span class="help-block m-b-none">The title for your submitted comic story.</span>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Story </label>
                                    <div class="col-sm-10"><textarea id="storytext" name="storytext" type="text" class="form-control"  style="margin-top: 0px;margin-bottom: 0px;height: 150px;"></textarea><span class="help-block m-b-none">A short paragraph (teaser) about your comic story.</span></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                  
<!--                                 <div class="form-group"><label class="col-sm-2 control-label">Icon Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group"><span class="input-group-btn"> <input id="IconImage" name="IconImage" type="file" accept=".jpg" class="btn btn-primary" >Select File
                                        </input> </span></div><span class="help-block m-b-none">This file will be used as Icon for the story on Koshk Comics Mobile Apps and Website. <br>
                                            – JPG <br>
                                            – Size: 200 x 200 px </br>
                                            – Resolution: 300 dpi</span>
                                    </div>
                                </div> -->

                                    <input name="submit" type="hidden" value="yes">
                                    <input name="currentProducer" type="hidden" value="{{ $currentProducer->first()->alias }}">
                                    <input name="currentActivity" type="hidden" value="{{ $currentActivity->first()->alias }}">


<!--                                 <div class="form-group"><label class="col-sm-2 control-label">Feature Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group"><span class="input-group-btn"> <input id="FeatureImage" name="FeatureImage" type="file" accept=".jpg" class="btn btn-primary">Select File
                                        </input> </span></div><span class="help-block m-b-none">This file will be used as Icon for the story on Koshk Comics Mobile Apps and Website. <br>
                                            – JPG <br>
                                            – Size: 1200 x 700 px </br>
                                            – Resolution: 300 dpi</span>
                                    </div>
                                </div> -->

                                <div class="form-group"><label class="col-sm-2 control-label">Story Submission</label>
                                    <div class="col-sm-10">
                                        <div class="input-group"><span class="input-group-btn"> <input id="Story" name="Story" type="file" accept=".zip" class="btn btn-primary">Select File
                                        </input> </span></div><span class="help-block m-b-none"> Your Comic story should be in pages not separate panels. <br>
                                            – Pages: 1-5, black/white <br>
                                            – Language: English </br>
                                            – Format: 140x182mm (a little bit smaller than A5) +5mm bleed on all sides. </br>
                                            - Files: High-resolution, preferably .TIFF.  </br>
                                            NOTES: 

                                            - The stories will be translated to English and Swedish, if you want to include your own translation add your translation to the Zip file in text format (a text/word file inside the zipped folder). </br>

                                            - If you are unsure what we mean by "high-resolution" or "bleed", please ask. Lots of artists don't know, and it's better to ask than to send us files that we can't use. </br>
                                            - As usual, no one gets paid for participating. But on the other hand, no one pays to get it either. Everything is voluntary.  </br>
                                            - And yes, we do accept comics that have already been published elsewhere, as long as we like them and they fit into the theme. </br>
                                            - PLEASE SHARE this invitation to anyone who might be interested! </br>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Submission Terms</label>
                                    <div class="col-sm-10">
                                        <p>By Submitting your work, you approve that Tusen Serier will: </br>
                                        - print your work and exhibit them in the mentioned exhibition.</br>
                                        - post web-resolution of the work for marketing on Tusen Serier and partners website and Facebook page.</br>
                                        </p>
                                        <div><label><input id="terms" type="checkbox" value=""> I accept the Terms and Conditions for the call.</label></div>
                                        <div><label> <input type="checkbox" id="copyrights" value=""> I certify that I have the full copyrights to of my submitted work.</label></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <!-- <button class="btn btn-white" type="submit">Cancel</button> -->
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
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


    if(document.getElementById("Story").value.length < 1){
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
