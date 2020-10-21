/*global $, document*/
$(document).ready(function () {

  'use strict';


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

    $('.cover .sections .boxs-sections a').mouseleave(function () {

      var word = $(this).find('img').attr('src');
      $(this).find('img').attr('src', word.replace('white', 'blue'));
      // $(this).removeClass('active');

    });

    //  Whene Hover On Href Link In Navbar Small Screen For Show Icon Color Blue And White
    $('.jops-turkey aside.sections-jops a:not(".active"), .company-guide aside.company-jops a:not(".active")').mouseenter(function () {

      var word = $(this).find('img').attr('src');
      $(this).find('img').attr('src', word.replace('blue', 'white'))
  
    });
  
    $('.jops-turkey aside.sections-jops a:not(".active"), .company-guide aside.company-jops a:not(".active")').mouseleave(function () {
  
      var word = $(this).find('img').attr('src');
      $(this).find('img').attr('src', word.replace('white', 'blue'))
  
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

  $(".tag-cloud-link").wrap("<div class='col-md-4 col-sm-6 tag'>");
  $('<i class="fas fa-tag"></i>').prependTo('.tag-cloud-link');
  $(' <i class="fas fa-tag"></i> ').prependTo('.tags-art a');

  $('.comment-form-cookies-consent').css('display', 'none');

  var zoom = 16;
  
  $('#zoom-in').on('click', function () {
    
    if (zoom == 24) {
      zoom == 24
    } else {
      zoom += 1;
    }
    $('.blog .content-articls p').css({
      'font-size': zoom + 'px'
    });

  });

  $('#zoom-out').on('click', function () {
    
    if (zoom > 16) {
      zoom -= 1;
    } else {
      zoom == 16
    }
    $('.blog .content-articls p').css({
      'font-size': zoom + 'px'
    });

  });


});