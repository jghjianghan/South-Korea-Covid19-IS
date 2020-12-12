$(function () {
    $(document).scroll(function () {
      var $navbar = $(".navbar");
      var $navlink = $(".nav-link")
      $navbar.toggleClass('scrolled', $(this).scrollTop() > $navbar.height());
      $navlink.toggleClass('scrolled', $(this).scrollTop() > $navbar.height());
    });
  });