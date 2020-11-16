$(document).ready(function() {

    /* focus in and out functions for text fields */
    $("#casv").focusin(function(){
        $(this).addClass("xxAddBorder");
        $("#xx11").removeClass("xxxx11");
    });
    $("#casvz").focusin(function(){
      $(this).addClass("xxAddBorder");
      $("#ztyu").removeClasS("xxxx11");
    })
    $("#pass").focusin(function(){
      $('#qwe').addClass("xxAddBorder");
      $("#qwe").removeClass("xxxx11");
    })
    $("#casv").focusout(function(){
      if ($(this).val() == ""){
        $(this).removeClass("xxAddBorder");
        $("xx8").removeClass("xxMoveText");
        $("#xx11").addClass("xxxx11");
      } else {
        $(this).removeClass("xxAddBorder");
        $("#xx8").addClass("xxMoveText");
        $("#xx11").addClass("xxxx11");
      }
    })
    $("#casvz").focusout(function(){
      if ($(this).val() == ""){
        $(this).removeClass("xxAddBorder");
        $("#xx8v3").removeClass("xxMoveText");
        $("#ztyu").addClass("xxxx11");
      } else {
        $(this).removeClass("xxAddBorder");
        $("#xx8v3").addClass("xxMoveText");
        $("#ztyu").addClass("xxxx11");
      }
    })
    $("#pass").focusout(function(){
      if ($(this).val() == ""){
        $(this).removeClass("xxAddBorder");
        $("#xx8v2").removeClass("xxMoveText");
        $("#qwe").addClass("xxxx11");
      } else {
        $(this).removeClass("xxAddBorder");
        $("#xx8v2").addClass("xxMoveText");
        $("#qwe").addClass("xxxx11");
      }
    })

    /* appearence of loading bar */
    $("#qsald, #rp").click(function(e) {
      e.preventDefault();
      var linkUrl = $(this).attr('href');
      setTimeout(function(url) { window.location = url; }, 700, linkUrl);
      var box_opacity = $('.ghgtu').css('opacity', '1');
    });
});
