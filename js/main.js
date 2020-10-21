/*global $, document*/
$(document).ready(function () {

  'use strict';



  var screenWidth;
  if($(window).width() < 768) {
    screenWidth = true;
  } else {
    screenWidth = false;
  }

  if($(window).width() < 768 && $(window).width() > 576) {
      $('.img-c').attr('style', $('.img-c').data('sc768'));
  } else if($(window).width() < 576) {
    $('.img-c').each(function () {
      $(this).attr('style', $(this).data('sc576'));
    });
  }

  function sliderCover() { // Function For Animation Section Slider Cover
      
    $('.cover .img-cover1').delay(8000).css('display', 'block').fadeIn(0, function () {

      $(this).fadeOut(0).next().fadeIn().delay(8000).fadeOut(0, function () {

        $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

          $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

            $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

              $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                  $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                    $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                      $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                        $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                          $(this).next().fadeIn().delay(8000).fadeOut(0, function () {

                            sliderCover();
                
                          });
                
                        });
                
                      });
                
                    });
                
                  });
                
                });

              });

            });

          });

        });
      });
  
    });

  }
  sliderCover();
  
  // When Hover To Elements
  (function whenHover() {

    //  Whene Hover On Icon Search
    $('header .top-header .search-oxygen img, header .top-header .search-oxygen input.btn-sub').mouseenter(function () {
      $('header .top-header .search-oxygen input.btn-sub').css('background-color', '#1075a1');
    });
  
    $('header .top-header .search-oxygen img, header .top-header .search-oxygen input.btn-sub').mouseleave(function () {
      $('header .top-header .search-oxygen input.btn-sub').css('background-color', '#21a2da');
    });
  
    //  Whene Hover On Href Link In Navbar Big Screen For Show Icon Color Blue And White
    $('header nav.sc-big ul li').mouseenter(function () {
  
      var word = $(this).find('a:not(".active") img').attr('src');
      $(this).find('a:not("active") img').attr('src', word.replace('white', 'blue'))
  
    });
  
    $('header nav.sc-big ul li').mouseleave(function () {
  
      var word = $(this).find('a:not(".active") img').attr('src');
      $(this).find('a:not("active") img').attr('src', word.replace('blue', 'white'))
  
    });
  
    //  Whene Hover On Href Link In Navbar Small Screen For Show Icon Color Blue And White
    $('header nav.sc-small ul li').mouseenter(function () {
  
      var word = $(this).find('a:not(".active") img').attr('src');
      $(this).find('a:not("active") img').attr('src', word.replace('blue', 'white'))
  
    });
  
    $('header nav.sc-small ul li').mouseleave(function () {
  
      var word = $(this).find('a:not(".active") img').attr('src');
      $(this).find('a:not("active") img').attr('src', word.replace('white', 'blue'))
  
    });

    //  Whene Hover On Href Link In Cover For Show Icon Color Blue And White
    $('.cover .sections .boxs-sections a').mouseenter(function () {

      $(this).find('img').attr('src', $(this).data('in'));

    });

    $('.cover .sections .boxs-sections a').mouseleave(function () {

      $(this).find('img').attr('src', $(this).data('out'));

    });

    //  Whene Hover On Href Link In dashboard "jops.php" For Show Custom Content And Change background Color
    $('.status-btn').mouseenter(function () {

      if($(this).data('status') == 'disabled') {
        $(this).text('تفعيل').removeClass('btn-danger').addClass('btn-success');
      } else {
        $(this).text('تعطيل').removeClass('btn-success').addClass('btn-danger');
      }

    });

    $('.status-btn').mouseleave(function () {

      if($(this).data('status') == 'disabled') {
        $(this).text('معطل').removeClass('btn-success').addClass('btn-danger');
      } else {
        $(this).text('مفعل').removeClass('btn-danger').addClass('btn-success');
      }

    });

    //  Whene Hover On Href Link In Sections Jops For Show Icon Color Blue And White
    $('.jops-turkey .type-jops div > a, .jops-turkey aside.sections-jops a, .company-guide aside.company-jops a').mouseenter(function () {

      $(this).find('img').attr('src', $(this).data('in'));

    });

    $('.jops-turkey .type-jops div > a, .jops-turkey aside.sections-jops a, .company-guide aside.company-jops a').mouseleave(function () {

      $(this).find('img').attr('src', $(this).data('out'));

    });


    $('.company-guide aside.company-jops a:not(".active")').mouseenter(function () {

      $(this).find('img').attr('src', $(this).data('in'));
  
    });
  
    $('.company-guide aside.company-jops a:not(".active")').mouseleave(function () {
  
      $(this).find('img').attr('src', $(this).data('out'));
  
    });

  }());

  // Show Or Hide List Navbar In Screen Mobile 
  $('.menu-bar').on('click', function () {

    $(this).toggleClass('transformed');

    if($(this).hasClass('transformed')) {

      $('header nav.sc-small ul').animate({
        right: '0'
      }, 250, function () { // If Whene Open Or Active

      });

    } else { // If Whene Close Or Not Active

      $('header nav.sc-small ul').animate({
        right: '-125%'
      }, 250);

    }

  });

  
  // Add Width Section Brind Clients By Width Items Children
  var coutnItems = $('.our-clients .brands-clients img').length,
      dynamicWidth = 0,
      i

  for(i = 1;i < coutnItems; i++) {
    dynamicWidth += $('.our-clients .brands-clients a:nth-of-type(' + i + ') img').innerWidth();
    
  }
  $('.our-clients .brands-clients').innerWidth(dynamicWidth);

  // Add Width Section Slider Shop By Width Items Children
  var device;
  if(screenWidth == true) {
    device = '.sc-small';
  } else {
    device = '.sc-big';
  }
  var coutnThumbnails = $('.details-shop '+ device +' .slider-thumbnails .box-thumbnail').length,
      dynamicWidthThumbnails = $('.details-shop '+ device +' .slider-thumbnails .box-thumbnail:nth-of-type(1)').innerWidth(),
      i2;
  for(i2 = 1;i2 < coutnThumbnails; i2++) {
    dynamicWidthThumbnails += $('.details-shop '+ device +' .slider-thumbnails .box-thumbnail:nth-of-type(' + i2 + ')').innerWidth();
  }
  console.log(dynamicWidthThumbnails);
  $('.details-shop '+ device +' .slider-thumbnails .container-img').innerWidth(dynamicWidthThumbnails);
  
  function moveBrands() { // Function For Animation Section Brand Clients
    var time,
        go = $('.our-clients .brands-clients').innerWidth() - 200;
    if(screenWidth == true) {
      time = 30000;
    } else {
      time = 45000;
    }
    $('.our-clients .brands-clients').animate({
      'left': go
    }, time, 'linear', function () {
      $(this).animate({
        'left': '5px'
      }, time, 'linear', function () {
        moveBrands();
      });
    });
  }
  moveBrands();
  function sliderShop() { // Function For Animation Section Slider Products "Shop"

    var moveL = $('.our-clients .brands-clients a:first-of-type').innerWidth(),
    startPos = 0,
    endPos,
    fix,
    widthItem = $('.details-shop  '+ device +' .slider-thumbnails .box-thumbnail:first-of-type').innerWidth();
    if(screenWidth == true) {
      endPos = $('.details-shop '+ device +' .slider-thumbnails .container-img').width() - 430;
      fix = 80;
    } else {
      endPos = $('.details-shop '+ device +' .slider-thumbnails .container-img').width() - 430;
      fix = 15;
    }
    $('.details-shop .slider-thumbnails .container-img div').on('click', function () {

      $(this).addClass('active').siblings().removeClass('active');
      $('.details-shop .show-img img').prop('src', $(this).find('img').prop('src'));
      $('.details-shop .show-img span.count-img').text($(this).data('count'));

    });
    
    $('.details-shop .slider-thumbnails span.to-left').on('click', function () {

      if(Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) >= startPos && Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) <= endPos) {

        $('.details-shop .slider-thumbnails .container-img').animate({
  
          left: Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) + widthItem + 'px'
    
        });
        
      } else if(Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) >= endPos) {
        
        $('.details-shop .slider-thumbnails .container-img').animate({
  
          left: startPos
    
        });

      }

    });

    $('.details-shop .slider-thumbnails span.to-right').on('click', function () {

      if(Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) > startPos) {

        $('.details-shop .slider-thumbnails .container-img').animate({
  
          left: Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) - widthItem +'px'
    
        });
        
      } else if(Number($('.details-shop .slider-thumbnails .container-img').css('left').replace('px', '')) <= endPos) {
        
        $('.details-shop .slider-thumbnails .container-img').animate({
  
          left: endPos + fix + 'px'
    
        });

      }

    });

    
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(1)').attr('data-count', '01');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(2)').attr('data-count', '02');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(3)').attr('data-count', '03');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(4)').attr('data-count', '04');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(5)').attr('data-count', '05');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(6)').attr('data-count', '06');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(7)').attr('data-count', '07');
    $('.details-shop .slider-thumbnails .box-thumbnail:nth-of-type(8)').attr('data-count', '08');
  }
  sliderShop();


  if(screenWidth == false) { // When Hover Sections Clients Company Show Image Of Section In Cover "HomePage"

    $('.cover .sections .boxs-sections a').mouseenter(function () {

      $($(this).attr('data')).fadeIn();

    });

    $('.cover .sections .boxs-sections a').mouseleave(function () {

      $($(this).attr('data')).fadeOut();

    });

  }

  // Add Class Active To Button Section Products
  $('.shop .container-items .section-products').each(function () {
    var varTest = window.location.href;
    if(varTest.charAt(varTest.length - 1) == 1) {
      $(this).find('a:first-of-type').addClass('active');
    } else if(varTest.charAt(varTest.length - 1) == 2) {
      $(this).find('a:last-of-type').addClass('active');
    }

  });


  // Slider Images Of Inormation Company Clients
  $('.slider .big-img img').prop('src', $('.slider .thumbnail-img div.active img').prop('src'));
  $('.slider .thumbnail-img > div').on('click', function () {

    $(this).addClass('active').siblings('div').removeClass('active');
    $('.big-img img').prop('src', $('.thumbnail-img div.active img').prop('src'));
  });

  // Slider Images Of Inormation Company Clients 
  if($('#file-work').val() == 'works.php') {
    $('.type-work a').first().addClass('active');
  }

  $('.confirm').on('click', function () { // Confirm Delete Items In Conrol Panel

    return confirm('Do you really want to delete ?');
    
  });

  $('.confirm_important').on('click', function () { // Confirm Delete Items In Conrol Panel

    return confirm('الرجاء الأنتباه في حال تم حذف القسم سيتم حذف كل العناصر التي بداخله');
    
  });

  // Show Errors In Form Add Clients 

  var msg = '<div class="alert alert-danger alert-dismissible show" role="alert" style="display: none; margin: 0;margin-top:10px"> <strong>العنوان</strong>تجرب رسالة الخطأ<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span> </button> </div>';

  $('.check_error').blur(function () {

    if($(this).val() == '' ) {
      $(this).next('.alert').slideDown();
      $(this).css('border', '1px solid #f48282');
    } else {
      $(this).next('.alert').slideUp(20);
      $(this).css('border', '1px solid #68c462');
    }

  });

  $('.check, .check_select select').blur(function () {

    if($('.check_select select').val() == '0') {
      $('.error_select').slideDown(0);
      $('.check_select select').css('border', '1px solid #f48282');
    } else {
      $('.error_select').slideUp(0);
      $('.check_select select').css('border', '1px solid #68c462');
    }

  });

  // Section Latest Articles Home Page

  $('#next-art').on('click', function () { // Action Whene Click Next Articles

    if(!$(this).hasClass('active')) {
      $(this).addClass('active').siblings().removeClass('active');
      if ($(window).width() >= 1200) {
        $('.latest-blog .items').animate({
		
          right: '-1200px'
      
        }, 600);
      } else if($(window).width() < 1200 && $(window).width() > 992) {
        $('.latest-blog .items').animate({
		
          right: '-997px'
      
        }, 600);
      } else {
        $('.latest-blog .items').animate({
		
          right: '-746px'
      
        }, 600);
      }
    }

  });

  $('#prev-art').on('click', function () { // Action Whene Click Previous Articles

    if(!$(this).hasClass('active')) {
      $(this).addClass('active').siblings().removeClass('active');
      if ($(window).width() >= 1200) {
        $('.latest-blog .items').animate({
		
          right: '-110px'
      
        }, 600);
      } else if($(window).width() < 1200 && $(window).width() > 992) {
        $('.latest-blog .items').animate({
		
          right: '-92px'
      
        }, 600);
      } else {
        $('.latest-blog .items').animate({
		
          right: '-43px'
      
        }, 600);
      }
    }

  });


  $('.details-company .details .box-video span img').on('click', function () { // When Click To Icon Play , Play Video

    $('.show-video').fadeIn(300);
    $($('#data-iframe').val()).prependTo('.show-video');

  });

  $('.show-video').on('click', function () { // When Click Out Box Video Closed Box Video

    $(this).find('iframe').remove();
    $('.show-video').fadeOut(100);

  });

  $(document).on('keyup', function (e) { // When Press Key "Esc" Close Box Video

    if (e.keyCode === 27) {


        $('.show-video iframe').remove();
        $('.show-video').fadeOut(100);

    }

  });

  $('.shop .box-item .box-img i').css({
    'line-height': $('.shop .box-item .box-img').innerHeight() + 'px'
  });

  $('.shop .box-item .box-img').mouseenter(function () {

    $(this).find('a:last-of-type').fadeIn(100);
    $(this).find('a:last-of-type i').delay(100).fadeIn(200);

  });

  $('.shop .box-item .box-img').mouseleave(function () {

    $(this).find('a:last-of-type i').fadeOut(100);
    $(this).find('a:last-of-type').delay(100).fadeOut(200);

  });

  // Function Check Languge
  
  $('.works .box-project').each(function () {

    var checkLang = $(this).find('.info-project h2 a').text().search(/[^a-zA-Z]/g);
    if(checkLang == 0) {
      $(this).find('.info-project h2 a').css('font-family', 'Omar');
    } else {
      $(this).find('.info-project h2 a').css('font-family', 'Arial, Helvetica, sans-serif');
    }

  });

  $('.company-guide .box-company .container-company').each(function () {
    
    var checkLangH4 = $(this).find('h4').text().search(/[^a-zA-Z]/g),
        checkLangAdress = $(this).find('.info-company div:first-of-type span').text().search(/[^a-zA-Z]/g);
    if(checkLangH4 == 0) {
      $(this).find('h4').css('font-family', 'Omar');
    } else {
      $(this).find('h4').css('font-family', 'Arial, Helvetica, sans-serif');
    }

    if(checkLangAdress == 0) {
      $(this).find('.info-company div:first-of-type span').css('font-family', 'Omar');
    } else {
      $(this).find('.info-company div:first-of-type span').css('font-family', 'Arial, Helvetica, sans-serif');
    }

  });

    // Run Plugin Gallery Slider

    
    // $('.pgwSlider .ps-current li:first-of-type').css({
    //   'height': '362px',
    //   'width': '362px',
    //   'margin': '0px auto'
    // });
    if(screenWidth == true) {
      $('.pgwSlider').pgwSlider();
    } else {
      var pgwSlider = $('.pgwSlider').pgwSlider();
      pgwSlider.reload({
      maxHeight : 500
      });
    }


	
		
  
  
	

});


