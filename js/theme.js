jQuery(document).ready(		
    function ($) {
        var parent_item_id;
        function activeStringClass(queryString) {
            console.log(queryString);
            if(queryString != null){
                //scrollToID('#' + queryString, 1000);
                var offSet = 250;
                var targetOffset = $('#' + queryString).offset().top - offSet;
                $('html,body').animate({scrollTop:targetOffset}, 1000);
            }
        }
        console.log(sessionStorage.getItem('queryString'));
        if(sessionStorage.getItem('queryString') !=  "undefined" && sessionStorage.getItem('queryString') !=  null) {
            parent_item_id = sessionStorage.getItem('queryString');
            setTimeout(
                activeStringClass(sessionStorage.getItem('queryString')),sessionStorage.removeItem('queryString'),1000
            );
        }
        else {
            sessionStorage.removeItem('queryString');
        }


		//Function to get Position of an element
		function getPosition(element){
			var p= $(element).position();
			return p;
		}
		//End Position Fn
        $(function(){
            var $class, $className;
            $('.dropdown').hover(function() {
                    $(this).addClass('open');
                    $(this).css('position','static');
                    $(this).siblings().removeClass('open');
                    $(this).siblings().css('position','relative');
                },
                function() {
                    $(this).removeClass('open');
                    $(this).css('position','relative');
                    var url = window.location.href;
                    var _array = url.split('/');
                    var selected_parent = _array[_array.length-2];
                    $('#'+selected_parent).addClass('open');
                    $('#'+selected_parent).css('position','static');
                });
        });

        // navigation click actions
        $('.dropdown-menu > ul > li > a#withoutSlugUrl').on('click', function(event ){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            var url = $(this).attr("href");
            sessionStorage.setItem('queryString', sectionID);
            window.location=url;
        });
        $('.dropdown-menu > ul > li > a#slugUrl').on('click', function(event ){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 1000);
        });
		$('.menu-gifts-pricing  ul li a').on('click', function(event ){
            event.preventDefault();
            var sectionID = $(this).attr("data-target");
			var offSet = 130;
            var targetOffset = $('.gift-section.' + sectionID).offset().top - offSet;
            $('html,body').animate({scrollTop:targetOffset}, 1000);
			$(this).addClass('active');
        });
        // scroll function
        function scrollToID(id, speed){
            var offSet;
            if($(window).width() > 768){
                offSet = 200;
            } else {
                offSet = 30;
            }
            var targetOffset = $(id).offset().top - offSet;
            $('html,body').animate({scrollTop:targetOffset}, speed);
        }
		
		//
		var nav = $('.navbar-default');
		var nav2=$('.menu-gifts-pricing');
	
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                nav.addClass("f-nav-fixed");
				
            } else {
                nav.removeClass("f-nav-fixed");
				
            }
			 if ($(this).scrollTop() > 550) {               
				nav2.addClass("f-nav-fixed");
            } else {
               
				nav2.removeClass("f-nav-fixed");
            }
			
			//VIsiblity
			$('.menu-gifts-pricing li a').removeClass('active');
			 $('.menu-gifts-pricing li a').each(function(){
				 var currentClass=$(this).attr('data-target');
				if($('.gift-section').hasClass(currentClass))
				{
					//console.log('true : ' + currentClass);
					 if($('.gift-section.'+currentClass).visible() )
              		{
               		 $('.menu-gifts-pricing li a.'+currentClass).addClass('active');
                    // console.log(currentvisible);
          				}
					
				}
				else {
					console.log('false:' + $('.gift-section').attr('class'));
				}
				 });
        });

        // item hover width
        function productHoverWidth() {
            var $item_wrapper_div = $('.main-item-hover-wrapper').closest('div').closest('div.product-hover').width();
            $('.main-item-hover-wrapper').css('width',$item_wrapper_div * 2);
        }

        //productHoverWidth();
        $(window).resize(
            function () {
                //productHoverWidth();
				var menuPosition=getPosition('#menu-item-13');
					if($( window ).width()>='768'){	
				$('.ubermenu-submenu-id-13').css('padding-left', menuPosition.left);
					}
					else {
						var width=$(window).width();
						$('#ubermenu-main-2-primary-menu').css('width',width);
						$('#ubermenu-main-2-primary-menu').css('min-width',width);
						$('#ubermenu-main-2-primary-menu').css('position','fixed');
						$('#ubermenu-main-2-primary-menu').css('left','0px');
					}
            }
        );
		
		//Preference Button Click
		$('.product-preferences label').click(function(){
			$('.variations').show();
		});
		//Masonry
			var $grid =$('#masonry-grid-products').masonry({
			//columnWidth: 200,
			itemSelector: '.grid-item',
			columnWidth: '.grid-item',
  percentPosition: true
			});

			$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
			});
			//Set Menu Item Position on load
			setTimeout(function(){
			var menuPosition=getPosition('#menu-item-13');	
			//console.log($( window ).width());
			if($( window ).width()>='768'){
            //console.log('greate');				
			$('.ubermenu-submenu-id-13').css('padding-left', menuPosition.left);
			}
			else {
				var width=$(window).width();
				$('#ubermenu-main-2-primary-menu').css('width',width);
				$('#ubermenu-main-2-primary-menu').css('min-width',width);
				$('#ubermenu-main-2-primary-menu').css('position','fixed');
				$('#ubermenu-main-2-primary-menu').css('left','0px');
				var leftpos=(width*71.87)/100;
				
				
				
			}
			}, 500);
			
			//Resize
			//$(window).trigger('resize');
		
		
		 
		//Login Modal Open
		 $("#menu-item-13 a").attr("data-toggle", "modal");
         $("#menu-item-13 a").attr("data-target", "#ModalLogin");
		$('#wp-submit').after('<div class="reset pull-right"> <a  href="#" data-toggle="modal" data-target="#ModalReset" data-dismiss="modal" >Reset Password ?</a> | <a  href="#" data-toggle="modal" data-target="#ModalRegister" data-dismiss="modal" >Register Now</a> </div>');



    }
);


