$(function(){
  $('.alert').fadeOut(3000);

  $('.nav-search').click(function(e){
    e.preventDefault();

    // $(this).hide();
    $('.nav-search-input').show('slide', {direction: 'left'}, 800);
  });

  $('.form-search-close').click(function(e){
    e.preventDefault();

    $('.nav-search-input').hide('slide', {direction: 'left'}, 800);
    // $('.nav-search').show('slide', {direction: 'left'}, 800);
  });


  // SMOOTH SCROLL vers le haut
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.arrow-up').fadeIn();
    } else {
      $('.arrow-up').fadeOut();
    }
  });

  //Click event to scroll to top
  $('.arrow-up').click(function(){
    $('html, body').animate({scrollTop : 0}, 1000);
    return false;
  });


  // sticky sous-menu
  $(window).scroll(function() {
      var scroll = $(window).scrollTop();

      // le menu "normal" apparaît après 300px de scroll
      if (scroll >= 98) {
          $(".main-sous-menu").addClass("sticky");
      } else {
          $(".main-sous-menu").removeClass("sticky");
      }
  });

  // smooth scroll du sous-menu
  $('.sous-menu-link').click(function(e){
    e.preventDefault();

    let link = $(this).attr('href');
    let position = $('.sous-menu-link').index(this);
    let top = $(link).offset().top - 120;

    // si c'est le premier lien
    if (position == 0) {
      // on remonte tout en haut de la page
      top = 0;
    }

    $('html, body').animate({
      scrollTop: top
    }, 1000);
  });

})
