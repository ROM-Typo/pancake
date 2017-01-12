var file={
  "open":function(path){
    $(".code").attr("src","project/"+path);
  },
  "new":function(path,callback){
    $.get("api/newfile.php?path="+path,function(data){
      callback(data);
    });
  }
};
