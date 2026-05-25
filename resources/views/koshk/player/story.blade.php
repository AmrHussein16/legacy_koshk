@extends('layouts.plain')

@section('page-title', 'Story')

@section('content')


<!-- Header Carousel -->
<div style="width: 100%;height: 90%;">

    <header id="myCarousel" class="carousel slide carousel-fade" style="width: 100%;height: 100%;background-color: #202124;">

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





                    
              <?php for($i=1;$i<=$panels;$i++): ?>
                
                    @if ($i == 1)
                    <div class="item active">
                    @else
                    <div class="item">
                    @endif

                    <?php
                    $ext= "jpg";
                    if($book == '1')
                        $ext = "png";
                    ?>
                    <div class="fill" style="background-image:url('./comics/cards/<?php echo $book;?>/<?php echo $story;?>/<?php echo $folder;?>/story/<?php echo $i;?>.<?php echo $ext;?>');background-size: contain;background-repeat: no-repeat;"></div>
                    <div class="carousel-caption" style="text-align: right;right: 70px;">
                        @foreach ($languages as $key=>$value)

                        <div id="subtitles_div_<?php echo $key.'_'.$i;?>" style="visibility: hidden;">
                            @if ($key == $story_lang)
                            <h4></h4>
                            @else
                                <h4><?php echo $translations[$key][$i]?></h4>
                            @endif
                        </div>

                        @endforeach
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
</div>

    <!-- Page Content -->
<div style="width: 100%;height: 10%;background-color: #35363a;">
    <div style="height: 20%;">   <!-- row -->
    </div>
    <div style="">   <!-- row -->
          <div class="col-sm-2" style="color:white;text-align:center;">
              
              <img src="assets/img/koshk-logo.png" style="width: 80%;">

          </div>
          <div class="col-sm-8"> 

            <h4 id="subtitle_main" style="color:white;text-align:center;visibility:visible;margin-top: 15px;"></h4>

          </div>
          <div class="col-sm-2" style="color:white;text-align:center;">
              
                <div class="dropup" style="margin-top: 10px;">
                  <button id="myBtn" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" value="<?php echo $story_lang;?>">
                    <?php echo $languages[$story_lang].' ('.$story_lang . ')';?>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                    @foreach ($languages as $key=>$value)

                        <li><a href="#" data-value="<?php echo $key;?>"><?php echo $value.' ('.$key . ')';?></a></li>

                    @endforeach

                  </ul>
                </div>

          </div>
    </div>

    <div style="height: 30%;">   <!-- row -->
    </div>          

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

    var current_panel=1;
    var panels=<?php echo json_encode($panels);?>;
    var current_lang=<?php echo json_encode($story_lang);?>;
    var languages=<?php echo json_encode($languages);?>;
    var translations=<?php echo json_encode($translations);?>;

    // var i;
    // for (i = 1; i <= panels; i++) {
    //   document.getElementById("subtitles_div_"+i).style.visibility = "hidden";
    // }

    //console.log(panels);
    //console.log(current_lang);
    //console.log(languages);

    // for(var j=0; j<languages.length; j++){
    //     prompt(languages[j]);
    // }
    
    
    // document.getElementById("subtitles_div_1").style.visibility = "hidden";
    // document.getElementById("subtitles_div_2").style.visibility = "hidden";

    checkitem();
    
    });

    $('#myCarousel').on('slid.bs.carousel', checkitem);

    function checkitem()                        // check function
    {
        //var selected_lang= $(".dropdown-menu li a").find('.active')parents(".dropup").find('.btn').html($(this).text()).val();
        var selected_lang= $(".dropdown-menu li a").data('value');
        var selected_lang= document.getElementById("myBtn").value;
        var currentItem = $('#myCarousel').find('.active').index();
        var panel=currentItem+1;
        //console.log(selected_lang);
        console.log('looooook hereee: '+"subtitles_div_"+selected_lang+'_'+panel);

        document.getElementById('subtitle_main').innerHTML = document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML;

        // var selected_lang= $(this).parents(".dropup").find('.btn').html($(this).text()).val();
        // console.log("subtitles_div_"+selected_lang+'_'+current_frame);

        // document.getElementById("subtitles_div_"+selected_lang+'_'+current_frame)

        // console.log('active = '+$('div.active').index());

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
        //document.getElementById('subtitle').innerHTML = document.getElementById('EN3').value;
        //prompt(document.getElementById('EN3').value);
        //console.log(document.getElementById('current_lang_div').value);

    }
    </script>
    
    <script>

    $(".dropdown-menu li a").click(function(){

      $(this).parents(".dropup").find('.btn').html($(this).text() + ' <span class="caret"></span>');
      $(this).parents(".dropup").find('.btn').val($(this).data('value'));

    var selected_lang= $(this).parents(".dropup").find('.btn').html($(this).text()).val();
    document.getElementById("myBtn").value = selected_lang;

    var panels=<?php echo json_encode($panels);?>;

    var languages = JSON.parse('<?= json_encode($languages); ?>');

    var languages_size=<?php echo sizeof($languages);?>;

    //console.log(languages);
    //console.log(languages_size);

    //var jsonData = JSON.parse(languages);
    //console.log(languages);
    Object.keys(languages).forEach(key => {
      let value = languages[key];
      console.log(key);
      console.log(value);

      var ii;
      for (ii = 1; ii <= panels; ii++) {
          //console.log("subtitles_div_"+key+'_'+ii+' is hidden now');
        document.getElementById("subtitles_div_"+key+'_'+ii).style.visibility = "hidden";
      }

      //use key and value here

          var currentItem = $('#myCarousel').find('.active').index();
          var panel=currentItem+1;
    console.log('do you see this: '+$('#myCarousel').find('.active').index());

    document.getElementById('subtitle_main').innerHTML = document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML;

    // var i;
    // for (i = 1; i <= panels; i++) {
    //     console.log("subtitles_div_"+selected_lang+'_'+i);
    //   document.getElementById("subtitles_div_"+selected_lang+'_'+i).style.visibility = "hidden";
    //   if(i==currentItem) {
    //     var panel=i+1;
    //     console.log('new text ='+document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML);

    //     document.getElementById('subtitle_main').innerHTML = document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML;
    //     }
    // }


    });
    
    // var ii;
    // for (ii = 1; ii <= panels; ii++) {
    //     console.log("subtitles_div_"+languages[j]+'_'+ii);
    //   document.getElementById("subtitles_div_"+languages[j]+'_'+ii).style.visibility = "hidden";
      
    // }

  // document.getElementById("demo").innerHTML += index + ":" + item + "<br>"

    // for (var i = 0; i < jsonData.counters.length; i++) {
    //     var counter = jsonData.counters[i];
    //     console.log(counter.counter_name);
    // }

    // for(var j=0; j<languages_size; j++){
    //     console.log(languages);

        // var ii;
        // for (ii = 1; ii <= panels; ii++) {
        //     console.log("subtitles_div_"+languages[j]+'_'+ii);
        //   document.getElementById("subtitles_div_"+languages[j]+'_'+ii).style.visibility = "hidden";
          
        // }

    var currentItem = $('#myCarousel').find('.active').index();
    console.log($('#myCarousel').find('.active').index());

    var i;
    for (i = 1; i <= panels; i++) {
        //console.log("subtitles_div_"+selected_lang+'_'+i);
      document.getElementById("subtitles_div_"+selected_lang+'_'+i).style.visibility = "hidden";
      if(i==currentItem) {
        var panel=i+1;
        console.log('new text ='+document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML);

        document.getElementById('subtitle_main').innerHTML = document.getElementById("subtitles_div_"+selected_lang+'_'+panel).innerHTML
        }
    }

    //document.getElementById('subtitle').innerHTML = document.getElementById('EN3').value;

    //console.log($(this).parents(".dropup").find('.btn').html($(this).text()).val());
    //console.log($(this).parents(".dropup").find('.btn').val($(this).data('value')).val());
  // current_lang=$(this).data('value');
  //console.log ($('.carousel-text').html($('.active > .carousel-caption').html());
  
});

</script>

@stop
