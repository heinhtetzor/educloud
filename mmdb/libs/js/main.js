$(document).ready(function(){

    //mobile navbar dropdown
    $(".navbar-toggler").on("click",function(){
        $("#navbarPhy").slideToggle();
        if( $("a.nav-link").on("click",function(){
            $("#navbarPhy").slideUp();
    }));
});
$(document).scroll(function () {
    var $nav = $(".fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    var $subNav = $(".dropdown-menu");
    $subNav.toggleClass('scrolled', $(this).scrollTop() > $subNav.height());
  });
});

//upkey function
$(function() {
    $('a#up-arrow').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
            }
        }
    });
});


//w3 sildeshow function
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
