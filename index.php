<?php
include("main.php");
include("config.php");
if (!$password||$password===md5("")){
  header("location:setup.php");
}

if (!$_SESSION['password']) {
  header("location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pancake</title>
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/drawingboard.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simple-undo.js"></script>
    <script src="file.js"></script>
    <script src="home.js"></script>
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="header">
      <h1><?php echo $project['name']; ?></h1>
    </div>
    <div class="project-files">
      <?php
        foreach(scandir("project") as $file){
          echo displayFile($file);
        }
       ?>
    </div>

    <div class="main">
      <div id="drawing-board" style="z-index:9999;">

      </div>
      <iframe src="temp/nofile.html" id="code" class="code" style="z-index:-1;"></iframe>
      <div class="toolbar">
        <div class="layers">
          Layers: <button class="layer-reload"><i class="fa fa-refresh"></i></button><br />
          <ul class="layers-view">
            <li class="layer" data-eclass="drawing-board-canvas-wrapper" data-eid="drawing-board">
              Drawing Board<br />
              <small>Visible: <input type="checkbox" class="visible" checked /></small><br />
              <small>Opacity:</small><br />
              <input type="range" min="1" max="100" value="30" class="opacity" />
            </li>
            <li class="layer" data-eclass="code" data-eid="code">
              Website Preview<br />
              <small>Visible: <input type="checkbox" class="visible" checked /></small><br />
              <small>Opacity:</small><br />
              <input type="range" min="1" max="100" value="100" class="opacity" />
            </li>
          </ul>
        </div>
      </div>
    </div>

    <script src="js/utils.js"></script>
		<script src="js/board.js"></script>
		<script src="js/controls/control.js"></script>
		<script src="js/controls/color.js"></script>
		<script src="js/controls/drawingmode.js"></script>
		<script src="js/controls/navigation.js"></script>
		<script src="js/controls/size.js"></script>
		<script src="js/controls/download.js"></script>
    <?php include("editProject.php"); ?>
  </body>
</html>
