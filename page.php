<?php
if (PHP_SAPI === 'cli') {
  $page = $argv[1];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'static/head.html' ?>
<body>
<?php
include 'side-nav.php';
?>
<div id="main" class="main">
<?php include $dir."static/".$page.".html"; ?>
</div>
</body>
</html>
