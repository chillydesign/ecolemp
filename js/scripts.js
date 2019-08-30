$(function(){
	$('.video_item h4').matchHeight();

	$('.grid-item a').featherlightGallery({
		previousIcon: '<',
		nextIcon: '>',
		galleryFadeIn: 300,
		openSpeed: 300
	});






	var timeouts = {};
	$('header nav ul > li').hover(function() {
		var el = $(this);
	    var rel = el.attr("id");
	    if (timeouts[rel]) clearTimeout(timeouts[rel]);
	    timeouts[rel] = setTimeout(function () {el.addClass('visible_ul');}, 40);
	    console.log(timeouts);
	},
	function() {
		var el = $(this);
	    var rel = el.attr("id");
	    if (timeouts[rel]) clearTimeout(timeouts[rel]);
	    timeouts[rel] = setTimeout(function () { el.removeClass('visible_ul') }, 200);
	    console.log(timeouts);
	});





	$nav_section = $('#navigation_section');
	$spacer = $('#spacer');

	//  stick furniture menu to top of page as you scroll
	if ( $nav_section.size() > 0){
	



		setTimeout(function(){ 
			var $nav_section_height_top = $nav_section.offset().top;
			var $nav_section_height = $nav_section.height();

			$(window).on('scroll', function(){


				var $scrollTop = document.documentElement.scrollTop || document.body.scrollTop;


				
				if (  $scrollTop > ( $nav_section_height_top )   ) {
					$nav_section.addClass('fixed');
					$spacer.css({'height': $nav_section_height + 50});

				} else {
					$nav_section.removeClass('fixed');
					$spacer.css({'height': 0});
				}

			});

		}, 500);



		

	}


	// function unsliderliheight(){
	// 	var $winwidth = $(window).width() * 0.35;
	// 	$('ul.bxslider').css({'height' : $winwidth});
	// 	$('.unslider li').css({'height' : $winwidth});
	// }
	// unsliderliheight();
	// $(window).on('resize', function(){ unsliderliheight(); });



		$('.slider').unslider({
			'autoplay' : true,
			'animation': 'fade',
			'nav' : false,
			'arrows' : {
				//  Unslider default behaviour
				prev: '<a class="unslider-arrow prev"></a>',
				next: '<a class="unslider-arrow next"></a>',
			}
		});





		$('#video_section .slider , #news_section  .slider ').matchHeight();
		$(' .slider h4 ').matchHeight();
		$(' .dates-et-horaires h4 ').matchHeight();



	  $('#show_nav_button').on('click', function(e){
	    e.preventDefault();
	    $('header nav ul').toggle();
	  });



		var msnry = $('.grid').masonry({ itemSelector: '.grid-item'});


		setTimeout(function(){ 
			var msnry = $('.grid').masonry({ itemSelector: '.grid-item'});
		}, 1000);

		setTimeout(function(){ 
			var msnry = $('.grid').masonry({ itemSelector: '.grid-item'});
		}, 3000);


		

		
		$('.album_titles li').on('click', function(){
			$('.album_titles li').removeClass('current_title');
			var $classname = $(this).attr('class');
			$(this).addClass('current_title');
			$('.current_album').removeClass('current_album');
			var $class_to_change = ".album.";
			$class_to_change+=$classname;
			$($class_to_change).addClass('current_album');

		

		})

		$('#navigation_section a, table a').on('click', function(e){
		var $this = $(this);
		var $feather = $this.data('featherlight');
		
		if(typeof $feather == 'undefined'){
			e.preventDefault();

			var $href = $this.attr('href');
			if (typeof $href !== 'undefined'){
				
				var $hash = $href.split('#')[1];
				var $offset = 0;

				if ($('#navigation_section').length > 0) { $offset = $('#navigation_section').height() +30; } else { $offset = -30;}

				if (typeof $hash !== 'undefined') {
					var $location = $('#' + $hash);
					if($location.length  > 0) {
						$("html, body").animate({ scrollTop: $location.offset().top - $offset }, 1000);
					} else {
						window.location.href = $href;	
					}
				} else {
					window.location.href = $href;
				}		
			}

		}



	});



});


