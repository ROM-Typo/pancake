<?php
session_start();

$project=array(
  "name"=>""
);

$project['name']="project";

// DEBUG
$_SESSION['password']="HI";


/*
displayFile
$file = Full file path from current directory
*/
function displayFile($file){
  if (str_split($file)[0]!==".") {
    if (!is_dir("project/".$file)) {
      echo "<div class='file' data-file='".$file."'>".$file."</div>";
    } else {
      $folder=$file;
      $files=[];
      $filess="";
      foreach(scandir("project/".$file) as $file){
        $files[]=$file;
      }
      foreach($files as $file){
        if (str_split($file)[0]!=="."){
          $filess.="<div class='file' data-file='".$folder."/".$file."'>".$file."</div>";
        }
      }
      echo "<div class='folder' data-file='".$file."'>".$folder."<div class='folder-files'>".$filess."</div></div>";
    }

  }
}
 ?>
