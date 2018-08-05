/* Custom General jQuery
/*--------------------------------------------------------------------------------------------------------------------------------------*/
;(function($, window, document, undefined) {
	//Genaral Global variables
	var $win = $(window),
		$doc = $(document),
		$winW = function(){ return $(window).width() },
		$winH = function(){ return $(window).height() },
		$mainmenu = $('#mainmenu'),
		$screensize = function(element){  
			$(element).width($winW()).height($winH());
		};
		
		var screencheck = function(mediasize){
			if (typeof window.matchMedia !== "undefined"){
				var screensize = window.matchMedia("(max-width:"+ mediasize+"px)");
				if( screensize.matches ) {
					return true;
				}else {
					return false;
				}
			} else { // for IE9 and lower browser
				if( $winW() <=  mediasize ) {
					return true;
				}else {
					return false;
				}
			}
		};

	$doc.ready(function() {
/*--------------------------------------------------------------------------------------------------------------------------------------*/		
		// Remove No-js Class
		$("html").removeClass('no-js').addClass('js');
		
		$(".register").click(function(){
			$("#login").hide();
		});
		
		$(".login").click(function(){
			$("#ragister").hide();
		});
		
		$(".afterlogin a").click(function(){
			$(this).toggleClass('open');
			$(this).next('ul').slideToggle('normal');
		});
		
		/* Popup function like bootstrap
		---------------------------------------------------------------------*/
		var $dialogTrigger = $('.poptrigger'),
		$pagebody =  $('body');
		$dialogTrigger.click( function(){
			var popID = $(this).attr('data-rel');
			$('body').addClass('overflowhidden');
			var winHeight = $(window).height();
			$('#' + popID).fadeIn();
			var popheight = $('#' + popID).find('.popup-block').outerHeight(true);
			
			
			if( $('.popup-block').length){
				var popMargTop = popheight / 2;
				//var popMargLeft = ($('#' + popID).find('.popup-block').width()/2);
				
				if ( winHeight > popheight ) {
					$('#' + popID).find('.popup-block').css({
						'margin-top' : -popMargTop+30
						//'margin-left' : -popMargLeft
					});	
				} else {
					$('#' + popID).find('.popup-block').css({
						'top' : 0,
						//'margin-left' : -popMargLeft
					});
				}
				
			}
			
			$('#' + popID).append("<div class='modal-backdrop'></div>");
			$('.popouterbox .modal-backdrop').fadeTo("fast", 0.80);
			if( popheight > winHeight ){
				$('.popouterbox .modal-backdrop').height(popheight);
			} 
			$('#' + popID).focus();
			return false;
		});
		
		$(window).on("resize", function () {
			if($('.popouterbox').length){
				var popheighton = $('.popouterbox .popup-block').outerHeight(true);
				var winHeight = $(window).height();
				if( popheighton > winHeight ){
					$('.popouterbox .modal-backdrop').height(popheighton);
				} else {
					$('.popouterbox .modal-backdrop').height('100%');
				}	
			}
		});
		
		//Close popup		
		$(document).on('click', '.close-dialogbox, .modal-backdrop', function(){
			
			$(this).parents('.popouterbox').fadeOut('fast', function(){
				$('body').removeClass('overflowhidden');
				$(this).find('.modal-backdrop').fadeOut( function(){
					$('.popouterbox .popup-block').removeAttr('style');
					$(this).remove();
				});
			});
			
			return false;
		});
		
		

		
		
		/* Get Screen size
		---------------------------------------------------------------------*/
		$win.load(function(){
			$win.on('resize', function(){
				$screensize('your selector');	
			}).resize();	
		});
		
		
		/* Menu ICon Append prepend for responsive
		---------------------------------------------------------------------*/
		$(window).on('resize', function(){
			if (screencheck(767)) {
				if(!$('#menu').length){
					$('#mainmenu').prepend('<a href="#" id="menu" class="menulines-button"><span class="menulines"></span> <em>Menu</em></a>');
				}
			} else {
				$("#menu").remove();
			}
		}).resize();

		/* This adds placeholder support to browsers that wouldn't otherwise support it. 
		---------------------------------------------------------------------*/
		if (document.createElement("input").placeholder == undefined) {
			var active = document.activeElement;
			$(':text').focus(function () {
				if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
					$(this).val('').removeClass('hasPlaceholder');
				}
			}).blur(function () {
				if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
					$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
				}
			});
			$(':text').blur();
			$(active).focus();
			$('form:eq(0)').submit(function () {
				$(':text.hasPlaceholder').val('');
			});
		}
		
		
		/* Tab Content box 
		---------------------------------------------------------------------*/
		var tabBlockElement = $('.tab-data');
			$(tabBlockElement).each(function(index, element) {
				var $this = $(this),
					tabTrigger = $this.find(".tabnav li"),
					tabContent = $this.find(".tabcontent");
					var textval = new Array();
					tabTrigger.each(function() {
						textval.push( $(this).text() );
					});	
				$this.find(tabTrigger).first().addClass("active");
				$this.find(tabContent).first().show();

				
				$(tabTrigger).on('click',function () {
					$(tabTrigger).removeClass("active");
					$(this).addClass("active");
					$(tabContent).hide().removeClass('visible');
					var activeTab = $(this).find("a").attr("data-rel");
					$this.find('#' + activeTab).fadeIn('normal').addClass('visible');
								
					return false;
				});
			
				var responsivetabActive =  function(){
				if (screencheck(767)){
					if( !$('.tabMobiletrigger').length ){
						$(tabContent).each(function(index, element) {
							$(this).before("<h2 class='tabMobiletrigger'>"+textval[index]+"</h2>");	
							$this.find('.tabMobiletrigger:first').addClass("rotate");
						});
						$('.tabMobiletrigger').click('click', function(){
							var tabAcoordianData = $(this).next('.tabcontent');
							if($(tabAcoordianData).is(':visible') ){
								$(this).removeClass('rotate');
								$(tabAcoordianData).slideUp('normal');
								//return false;
							} else {
								$this.find('.tabMobiletrigger').removeClass('rotate');
								$(tabContent).slideUp('normal');
								$(this).addClass('rotate');
								$(tabAcoordianData).not(':animated').slideToggle('normal');
							}
							return false;
						})
					}
						
				}
				if ( $winW() > 767 ){
					$('.tabMobiletrigger').remove();
					$this.find(tabTrigger).removeClass("active").first().addClass('active');
					$this.find(tabContent).hide().first().show();		
				}
			}
			$(window).on('resize', function(){
				if(!$this.hasClass('only-tab')){
					responsivetabActive();
				}
			}).resize();
		});
		
		/* Accordion box JS
		---------------------------------------------------------------------*/
		$('.accordion-databox').each(function(index, element) {
			var $accordion = $(this),
				$accordionTrigger = $accordion.find('.accordion-trigger'),
				$accordionDatabox = $accordion.find('.accordion-data');
				
				$accordionTrigger.first().addClass('open');
				$accordionDatabox.first().show();
				
				$accordionTrigger.on('click',function (e) {
					var $this = $(this);
					var $accordionData = $this.next('.accordion-data');
					if( $accordionData.is($accordionDatabox) &&  $accordionData.is(':visible') ){
						$this.removeClass('open');
						$accordionData.slideUp(400);
						e.preventDefault();
					} else {
						$accordionTrigger.removeClass('open');
						$this.addClass('open');
						$accordionDatabox.slideUp(400);
						$accordionData.slideDown(400);
					}
				})
		});
		
		/*Custom Radio and Checkbox
		---------------------------------------------------------------------*/
		if($('input[type="checkbox"], input[type="radio"]').length){
			$('input[type="checkbox"], input[type="radio"]').ezMark();
		}
		
		/* MatchHeight Js
		-------------------------------------------------------------------------*/
		if($('.matchheightbox').length){
			$('.matchheightbox').matchHeight();
		}
		if($('.cols2 .col h4').length){
			$('.cols2 .col h4').matchHeight();
		}
		/*Mobile menu click
		---------------------------------------------------------------------*/
		$(document).on('click',"#menu", function(){
			$(this).toggleClass('menuopen');
			$(this).next('ul').slideToggle('normal');
			return false;
		});
		$(document).on('click',".search", function(){
			$(this).toggleClass('open');
			$(this).next('.search-filters').slideToggle('normal');
			//return false;
		});
		
		
		(function() {
			[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
				new SelectFx(el);
			} );
		})();
		
		
		var div = $("Selector div").height();
		var win = $(window).height();
		if (div > win ) {
			$("Selector div").addClass('red');
			alert('Div is bigger then window size');
		}
		
		
		
		/*~-~-~- Slider Area ~-~-~- */
		if($('.homeslider').length){
		$('.homeslider').owlCarousel({
			loop: true,
			responsiveClass: true,
			nav: true,
			autoplayTimeout: 5000,
			//navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			autoplay: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});
		}
                
                
                if($('.ownslider2').length){
		$('.ownslider2').owlCarousel({
			loop: true,
			responsiveClass: true,
			nav: true,
			autoplayTimeout: 5000,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			autoplay: true,
			responsive: {
				0: {
					items: 4
				},
				600: {
					items: 4
				},
				1000: {
					items: 4
				}
			}
		});
		}
                
	
	
	/*Scroll spy Topmenu
		---------------------------------------------------------------------*/
//		var lastId,
//			topMenu = $("#mainmenu ul"),
//			topMenuHeight = topMenu.outerHeight()-20,
//			// All list items
//			menuItems = topMenu.find("a"),
//			// Anchors corresponding to menu items
//			scrollItems = menuItems.map(function(){
//				var item = $($(this).attr("href"));
//				if (item.length) { return item; }
//			});
	
		// Bind click handler to menu items
		// so we can get a fancy scroll animation
//		menuItems.click(function(e){
//			var href = $(this).attr("href"),
//				offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
//			$('html, body').stop().animate({ 
//				scrollTop: offsetTop
//			}, 300);
//			e.preventDefault();
//		});
	
		// Bind to scroll
//		$(window).scroll(function(){
//			// Get container scroll position
//			var fromTop = $(this).scrollTop()+topMenuHeight;
//			// Get id of current scroll item
//			var cur = scrollItems.map(function(){
//				if ($(this).offset().top < fromTop)
//				return this;
//			});
//			// Get the id of the current element
//			cur = cur[cur.length-1];
//			var id = cur && cur.length ? cur[0].id : "";
//			if (lastId !== id) {
//				lastId = id;
//				// Set/remove active class
//				menuItems.parent().removeClass("active").end().filter("[href='#"+id+"']").parent().addClass("active");
//		   }                   
//		});
		
		
		/* scroll
		--------------------------------------------------------------------------------------------------------------------------------------*/
		$(window).scroll(function(){
			if($(window).scrollTop() > 200 ) {
				$('#header .wrap').addClass('fixed');
			} else {
				$('#header .wrap').removeClass('fixed');
			}              
		});
		
		  $( function() {
			$( ".datepicker" ).datepicker({
                            changeMonth:true,
                            changeYear:true
                        });
		  } );
		  /* Filter
		--------------------------------------------------------------------------------------------------------------------------------------*/
		$(function () {
			var filterList = {
				init: function () {
					if($('#eventslist').length){
						$('#eventslist').mixItUp({
							selectors: {
							target: '.portfolio',
							filter: '.filter'	
							},
							load: {
							filter: '*'  
							}     
						});	//mixItUp							
					}//#portfoliolist length
				}//init: function
			};//filterList
			// Run the show!
			filterList.init();
		});	//function		



		if($('.swiper-container').length){
			// Params
			var sliderSelector = '.swiper-container',
				options = {
				  init: false,
				  loop: true,
				  speed:800,
				  slidesPerView: 2, // or 'auto'
				  // spaceBetween: 10,
				  centeredSlides : true,
				  effect: 'coverflow', // 'cube', 'fade', 'coverflow',
				  coverflowEffect: {
					rotate: 50, // Slide rotate in degrees
					stretch: 0, // Stretch space between slides (in px)
					depth: 100, // Depth offset in px (slides translate in Z axis)
					modifier: 1, // Effect multipler
					slideShadows : true, // Enables slides shadows
				  },
				  grabCursor: true,
				  parallax: true,
				  pagination: {
					el: '.swiper-pagination',
					clickable: true,
				  },
				  navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				  },
				  breakpoints: {
					1023: {
					  slidesPerView: 1,
					  spaceBetween: 0
					}
				  },
				  // Events
				  on: {
					imagesReady: function(){
					  this.el.classList.remove('loading');
					}
				  }
				};
			var mySwiper = new Swiper(sliderSelector, options);
			
			// Initialize slider
			mySwiper.init();
		}
		
		
		
		/*~-~-~- Slider Area ~-~-~- */
		if($('.similar-banner').length){
		$('.similar-banner').owlCarousel({
			loop: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			margin:30,
			responsiveClass: true,
			nav: true,
			autoplayTimeout: 1000,
			//navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			autoplay: false,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 4
				}
			}
		});
		}
		
	
		
/*--------------------------------------------------------------------------------------------------------------------------------------*/		
	});	
/*--------------------------------------------------------------------------------------------------------------------------------------*/
})(jQuery, window, document);