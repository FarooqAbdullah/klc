jQuery(document).ready(
    function ($) {

        $(function(){
            var $class, $className;
            $('.dropdown').hover(function() {
                    $(this).addClass('open');
                    $(this).css('position','static');
                },
                function() {
                    $(this).removeClass('open');
                    $(this).css('position','relative');
                });
        });

        // navigation click actions
        $('.dropdown-menu > ul > li > a').on('click', function(event ){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 1000);
        });
        // scroll function
        function scrollToID(id, speed){

            var offSet = 150;
            var targetOffset = $(id).offset().top - offSet;
            $('html,body').animate({scrollTop:targetOffset}, speed);

        }
		
		//
		var nav = $('.navbar-default');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 440) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});
    }
);


