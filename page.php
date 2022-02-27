<!DOCTYPE html>
<html lang="en">
<?php include 'static/head.html' ?>
<body>
<?php
include 'side-nav.php';
include $dir.'lang-ver-anchor.html';
?>
<div id="main" class="main">
<?php
if (file_exists($dir.$page.".php")) {
  include $dir.$page."-mn.php";
} elseif (file_exists($dir.$page.".html")) {
  include $dir."static/".$page."-mn.html";
}
?>
</div>
</body>
</html>
