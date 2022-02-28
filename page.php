<?php
if (PHP_SAPI === 'cli') {
  $dir = $argv[1];
  $page = $argv[2];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'static/head.html' ?>
<body>
<?php
include 'side-nav.php';
include $dir.'static/lang-ver-anchor.html';
?>
<div id="main" class="main">
<?php
if (file_exists($dir.$page."-mn.php")) {
  include $dir.$page."-mn.php";
} elseif (file_exists($dir.'static/'.$page."-mn.html")) {
  include $dir."static/".$page."-mn.html";
}
?>
</div>
</body>
</html>
