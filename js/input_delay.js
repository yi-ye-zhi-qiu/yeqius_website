$(document).ready(function() {
    $("#qsald, #rp").click(function(e) {
      e.preventDefault();
      var linkUrl = $(this).attr('href');
      setTimeout(function(url) { window.location = url; }, 700, linkUrl);
      var box_opacity = $('.ghgtu').css('opacity', '1');
    });
});

//form-delay;
const form = $("#login-form");
    form.submit(() => {
//some other functions you need to proceed before submit
    var box_opacity = $('.ghgtu').css('opacity', '1');
    setTimeout(() => {}, 1200);
           return true;
});
