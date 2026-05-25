@extends('layouts.headeronly')

@section('page-title', 'CBA vol 44: Folklore!')

@section('content')

<div class="wrapper wrapper-content">

    <div class="row animated fadeInRight" style="margin: 0px;">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="{{ url('producer/tusenserier') }}"><h5>Tusen Serier</h5></a>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="{{ url('content/producer/'.$currentProducer->first()->alias.'/activities/'.$currentActivity->first()->alias.'/profile.jpg') }}">
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
                            Koshk Comics is partnering with Tusen Serier to host a part of their Folklore! call for submissions in Malmo, Sweden.
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
                        <a href="{{ url('producer/tusenserier/folklore') }}">
                            <img class="img-responsive img-portfolio img-hover" src="https://www.koshkcomics.com/public/content/producer/tusenserier/activities/folklore/cover.jpg" alt="" style="margin-bottom: 0px;border-radius: 25px;">
                        </a>
                    </div>


                        <h1>CBA vol 44: Folklore!</h1>
                        <h2>CALL FOR ENTRIES</h2>
                        <h2>Folklore!</h2>
                        <h3 style="color: #fcd116;">Malmö, <strong style="color: #005b99;">Sweden</strong></h3>
                        <p>  it’s the stories our parents told us as children as well as a glimpse into another world, of fairies, trolls, and magic. But folklore is more than just stories about bad children who get eaten by witches; it’s our shared fears, hopes and dreams and they often share similar themes across the world. </br> Folk tales have been told by an infinite number of people with equally infinite motives; some to warn, others to encourage and some who just try to make sense of the world around them. </br> In volume 44 of CBA we want to dig deep into the roots of folklore from different cultures and explore what it has to say about ourselves as human beings regardless of nationality. </p>
                        <p>More information will be found at <a href='https://www.facebook.com/events/2093268167390950/' target="blank"> Event FB Page </a> </p>
                        <h3><strong>Submission Deadline: 15-January-2019</strong></h3>

                        <p></p>
                        
                        <p> <strong> Main editor:  </strong>  Mattis Telin</p>

                        
                        
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
                                    <div class="col-sm-10"><input id="storyfile" name="storyfile" type="text" class="form-control"  style="margin-top: 0px;margin-bottom: 0px;"></textarea><span class="help-block m-b-none"> Please enter a link to your files (uploaded to Google Drive or any Sharing website) -- Please make sure to make the shared documents public or shared with "saadany@koshkcomics.com" if you're using Google Drive. </br>Your Comic story should be in pages not separate panels. </br>
Number of pages: We prefer comics that are about 5-30 pages, but any number is welcome. </br>
Format: 20x26cm </br>
Color: Color/ Black and white </br>
Language: English </br>
Format: .TIF </br>
Resolution: 1200 dpi line art or 300 dpi CMYK. </br>
Bleed: 5mm. Think you know how to handle bleed? Read this to make sure you know what we mean: http://cbkcomics.com/bleed-explained/</br>
Within this space, there are no limits.</br>

Request: Please don’t use Comic Sans. We don’t like it and will ask you to change to another font. </br>
And once more, check our guidelines for bleed.</br>

Also, please send us high-resolution files from the start.</br>
Also include a short presentation text about yourself, with one URL (if you have a website).</br>
Please ask us if you are unsure about formats, resolution, bleed, etc. We prefer stupid questions to bad files. And there are no stupid questions!</br>

TEXTS</br>
A good size for a text is ca 7500 characters (including spaces), but it can also be longer or shorter.</br> </br>

Unfortunately we cannot offer you any payment for participating. If we publish your submission you will receive 10 free copies of the issue. That’s all we can offer at this date. Hopefully you will find being in CBA an enjoyable experience. Naturally, copyright for your material will stay in your hands.</br>

--TEXT AND COMICS GUIDELINES--</br>
For the next volume of CBA we invite you to dig into the concept of Folklore in whichever form you want to depict it. We're looking for both comics and texts.</br></br>


Deadline is around the corner. See you there!</br>

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
      storytext: "required",
      storyfile: "required"
    },
    // Specify validation error messages
    messages: {
      storytitletext: "Please enter a title for your Comic Story.",
      storytext: "Please enter a description for your Comic Story.",
      storyfile: "Please a web link to your Comic Story files."
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
