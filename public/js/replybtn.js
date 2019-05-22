$('.replybtn').click(function () {
    $('html, body').animate({
        scrollTop: $('.discuss-section').offset().top
    },
    {
        duration: 2000,
        complete: function(){
           $('#cke_comment-field').css({'box-shadow' : '0 2px 6px rgba(0,0,0,0.35)'});
       }
    });
});