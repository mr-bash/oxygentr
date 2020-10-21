/*global $, document*/
$(document).ready(function () {

  'use strict';

  $('.menu-bar').on('click', function () { // Show Or Hide List Navbar In Screen Mobile  
		
		$('header .cover nav ul').slideToggle();

		$(this).toggleClass('transformed');
		
	});

	/* Start Section Home Page */
	$(document).on('click', 'header .cover nav ul li a, header .cover .box-content a, .about .text-about .container-btn a, .services .container-items .container-btn a', function (e) { // Move Scroll To Section When Click Link Menu

		e.preventDefault();
	
		$('html, body').animate({
			scrollTop: $($(this).data('id')).offset().top
		}, 1000);
	
	});
		/* Start Slider Home Page */
	$('header .cover .bg').not('.active').fadeOut(0);

	var go;
	function nextSlide() {

		if($('header .cover .selector span[class="active"]').is(':last-child')) {

			$('header .cover .selector span').first().click();
			window.clearInterval(go);
			runClick();

		} else {

			$('header .cover .selector span[class="active"]').next().click();

		}

	}


	function runClick() { // function Click Automatic

		go = window.setInterval(nextSlide, 10000);

	}

	runClick();

	$('header .cover .selector span').on('click', function () {

		$('header .cover .bg3').each(function () {

			if($(this).hasClass('active')) {
				$('header .cover .home1').fadeIn(0);
			} else {
				$('header .cover .home2').fadeOut(0);
			}

		});

		$('header .cover .bg2').each(function () {

			if($(this).hasClass('active')) {
				$('header .cover .home3').fadeIn(0);
			} else {
				$('header .cover .home2').fadeOut(0);
			}

		});

		$('header .cover .bg1').each(function () {

			if($(this).hasClass('active')) {
				$('header .cover .home2').fadeIn(0);
			} else {
				$('header .cover .home2').fadeOut(0);
			}

		});

		if(!$(this).hasClass('active')) {
			window.clearInterval(go); // For Resert Count Second When Click Manuel
			runClick(); // Run Function After Clicked
			var selImg = $(this).data("img"),
			selContent = $(this).data("content");
			$(this).addClass('active').siblings().removeClass('active');
			$(this).parents('.cover').find(selImg).addClass('active').siblings('.bg').removeClass('active');

			$(this).parents().siblings('.box-content').animate({

				'opacity': 0

			}, 1000, function () {

				$(this).siblings('.bg').fadeOut(1600, function () {

					$(this).siblings(selImg).delay(0).fadeIn(900);

				});
				
				$(this).siblings(selContent).delay(900).animate({

					'opacity': 1

				}, 500);

			});
		}

	});

		/* End Slider Home Page */
	/* End Section Home Page */


	/* Start Section About Page */

	$('.about .text-about .bars-about span').mouseenter(function () {
  
		var word1 = $(this).find('img').attr('src');
		$(this).find('img').attr('src', word1.replace('black', 'white'));

	});

	$('.about .text-about .bars-about span').mouseleave(function () {
  
		var word2 = $(this).find('img').attr('src');
		$(this).not('.active').find('img').attr('src', word2.replace('white', 'black'));

	});

	$('.about .text-about .bars-about span').on('click', function () {

		var words = $(this).find('img').attr('src');
		$(this).not('.active').find('img').attr('src', words.replace('black', 'white'));


		$(this).next('p').slideToggle();
		$(this).toggleClass('active').parent().siblings().find('span').removeClass('active').siblings('p').slideUp();

		$('.about .text-about .bars-about span').each(function () {
	
			if(!$(this).hasClass('active')) {
				$(this).find('img').attr('src', $(this).find('img').attr('src').replace('white', 'black'));
			}
	
		});

	});

	$('.about .text-about .bars-about span').each(function () {

		if(!$(this).hasClass('active')) {
			$(this).find('img').attr('src', $(this).find('img').attr('src').replace('white', 'black'));
		} else {
			$(this).find('img').attr('src', $(this).find('img').attr('src').replace('black', 'white'));
		}

	});

	$('.about .video .box-img .box-run').on('click', function () {

		$('.about .popup-video').append('<div><iframe width="100%" height="100%" src="https://www.youtube.com/embed/8pmwmT-RBpY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>');
		$('.about .popup-video').fadeIn(800);

	});

	$('html').on('click', function () {

		if ($('.about .popup-video').css('display') === 'block') {

			$('.about .popup-video').fadeOut(0);
			$('.about .popup-video > div').remove(0);

		}

	});


	$('.about .popup-video div, .about .video .box-img .box-run, header .cover .selector span').on('click', function (x) {

		x.stopPropagation();

	});

		/* End Section About Page */


		/* Start Section Works Page */

		$('.works .container-items aside ul li span').on('click', function () {

			$(this).addClass('active').parent().siblings().find('span').removeClass('active');

			$('.container-projects .hide').fadeOut(0);
			$($(this).data("type")).fadeIn(200);

		});

		/* End Section Works Page */








		/* Start Plugins */
		$('.countup').counterUp({
			delay: 10,
			time: 2500
		});

		$(".works .container-items .container-projects").niceScroll({
			cursorcolor:"#f28f15",
			cursoropacitymin: .5,
			cursorwidth: "9px",
			cursorborderradius: "0px",
			scrollspeed: 60,
			mousescrollstep: 35,
			cursorminheight: 20,
			background: 'rgb(148, 192, 223)',
			cursorborder: "none",
			zindex: "99999"
		});
		
		/* End Plugins */


});