$(document).ready(function() {

    /* focus in and out functions for text fields */
    $("#loginbox").focusin(function(){
        $(this).addClass("xxAddBorder");
        $("#xx11").removeClass("xxxx11");
    });
    $("#emailbox").focusin(function(){
      $(this).addClass("xxAddBorder");
      $("#ztyu").removeClasS("xxxx11");
    })
    $("#passwordbox").focusin(function(){
      $('#qwe').addClass("xxAddBorder");
      $("#qwe").removeClass("xxxx11");
    })
    $("#loginbox").focusout(function(){
      if ($(this).val() == ""){
        $(this).removeClass("xxAddBorder");
        $("#xx8").removeClass("xxMoveText");
        $("#xx11").addClass("xxxx11");
      } else {
        $(this).removeClass("xxAddBorder");
        $("#xx8").addClass("xxMoveText");
        $("#xx11").addClass("xxxx11");
      }
    })
    $("#emailbox").focusout(function(){
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
    $("#passwordbox").focusout(function(){
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
    /* e.preventDefault on #ow298 is causing issues */
    $("#qsald, #rp").click(function(e) {
      e.preventDefault();
      var linkUrl = $(this).attr('href');
      setTimeout(function(url) { window.location = url; }, 700, linkUrl);
      var box_opacity = $('.ghgtu').css('opacity', '1');
    });
});
