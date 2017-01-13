$(function(){
  $(".header h1").click(function(){
    $("#editProject").modal("show");
  });
  $(".project-files .file").each(function(){
    $(this).click(function(){
      file.open($(this).attr("data-file"));
    });
  });

  var drawboard = new DrawingBoard.Board('drawing-board', {
  	controls: [
  		'Color',
  		{ Size: { type: 'dropdown' } },
  		{ DrawingMode: { filler: false } },
  		'Navigation',
  		'Download'
  	],
  	size: 1,
  	webStorage: 'session',
  	enlargeYourContainer: true
  });

  $(".toolbar").css("padding-top",parseInt($(".drawing-board-controls").height())+5);

  $(".layers-view").sortable({
    revert:true
  });
  $("ul,li").disableSelection();

  $(".layer").each(function(){
    $(this).find(".visible").change(function(){
      if (!$(this).is(":checked")){
        $("."+$(this).parents().eq(1).attr("data-eclass")).hide();
      }else {
        $("."+$(this).parents().eq(1).attr("data-eclass")).show();
      }
    });
    $(this).find(".opacity").change(function(){
      $("."+$(this).parents().eq(0).attr("data-eclass")).css("opacity",$(this).val()/100);
    });
  });

  $(".layer").click(function(){
    setTimeout(function(){
      $(".layer").css("z-index","0");
      $("."+$(".layers-view").children().eq(0).attr("data-eid")).css("z-index","9999");
    },500);

  });
  $(".layer-relaod").click(function(){
    $("#drawing-board").css("z-index","-1");
    $("#code").css("z-index","-1");
    $("#"+$(".layers-view").children().eq(0).attr("data-eid")).css("z-index","9999");
  });
});
