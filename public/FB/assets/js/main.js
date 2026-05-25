$(function () {
    $('section[data-type="background"]').each(function () {
        var $window = $(window);
        var $bgobj = $(this);
        $(window).scroll(function () {
            var ypos = -($window.scrollTop() / $bgobj.data('speed'));
            var coords = '50% ' + ypos + 'px';
            $bgobj.css({ backgroundPosition: coords });
        });
    });
});


$(document).ready(function(){
  $('.story').slick({
      infinite: false,
      prevArrow: '<i class="glyphicon glyphicon-chevron-right"></i>',
      nextArrow: '<i class="glyphicon glyphicon-chevron-left"></i>'
  });
});

$(document).ready(function(){
  $('.fullstory').slick({
      infinite: false,
      prevArrow: '<i class="glyphicon glyphicon-chevron-right"></i>',
      nextArrow: '<i class="glyphicon glyphicon-chevron-left"></i>'
     
  });
});

	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});

    $(document).keypress(function(e) { 
    if (e.keyCode == 27) { 
        $("#myModal").fadeOut(500);
        //or
        window.close();
    } 
});