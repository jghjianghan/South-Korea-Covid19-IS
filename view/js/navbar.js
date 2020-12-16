$(function () {
    $(document).scroll(function () {
      var $navbar = $(".navbar");
      var $navlogo = $(".nav-logo");
      var $navlink = $(".nav-link");
      $navbar.toggleClass('scrolled', $(this).scrollTop() > $navbar.height());
      $navlogo.toggleClass('scrolled', $(this).scrollTop() > $navbar.height());
      $navlink.toggleClass('scrolled', $(this).scrollTop() > $navbar.height());
    });
  });