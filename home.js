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
});
