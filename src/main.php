<!DOCTYPE html>
<?php
$lang = 'en';
$page = $argv[1];
if (str_contains($page, '/')) {
  $tmp = explode('/', $argv[1], 2);
  if (strlen(trim($tmp[0])) > 0) {
    $lang = trim($tmp[0]);
  }
  $page = trim($tmp[1]);
}
$lang_dir = '';
if ($lang != 'en')
  $lang_dir = $lang.'/';
?>
<html lang=<?php echo $lang; ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="fig8-knt.png?">
  <title>Dave White</title>
  <style>
    
    @media (prefers-color-scheme: dark) {
      body {color:#fff;background:#000}
      a:link {color:#9cf}
      a:hover, a:visited:hover {color:#cef}
      a:visited {color:#c9f}
    }

    @media(prefers-color-scheme: light) {
      body {
	background: #fff4e0;
	color: #000;
      }
    }

    @media print {
      body{
	max-width: none;
      }
    }

    body{
      margin:1em auto;
      padding:0 .62em;
      font: medium/1.62 sans-serif;
    }

    h1,h2,h3 {
      line-height: 1.2em;
    }

    #main {
      margin-left: 15%;
      max-width: 40em;
      padding: 0 4em; /* Top padding = 0, left & right = 43m */
      margin: auto;
    }

    .main p {
      text-align: justify;
    }

    .sidenav {
      color: #fff;
      height: 100%; /* 100% Full-height */
      width: 15%;
      position: fixed; /* Stay in place. Prevents scrolling */
      z-index: 1; /* Stay on top */
      top: 0; /* Stay at the top */
      left: 0;
      background-color: #111; /* Black*/
      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 4em; /* Place content 60px from the top */
    }

    .sidenav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    /* The navigation menu links */
    .sidenav li {
      padding: 1ex 1ex 1ex 2ex;
      font-size: x-large;
    }

    .sidenav a {
      text-decoration: none;
      color: #eee;
    }

    .sidenav .curr {
      background-color: #444;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav li.ncurr:hover {
      background-color: #333;
    }

    .main {
      margin:1em auto;
      max-width:40em;
      padding:0 .62em;
      font:1.2em/1.62 sans-serif;
    }

    table, th, td {
      border: 1px solid grey;
      border-collapse: collapse;
    }

    th, td {
      padding: 1em;
    }

  </style>
</head>
<body>
  <div style="position: fixed;top: 0;right: 0;padding: 1ex;">
    <?php include 'static/'.$lang_dir.'lang-ver-anchor.html'; ?>
  </div>
  <div id="sideNav" class="sidenav">
    <ul>
    <?php
    include $lang_dir.'pg-array.php';
    
    foreach ($pg_array as $pg_id => $pg_name):
      if ($pg_id == $page):
    ?>
	<li class="curr"><?php echo $pg_name; ?></li>
    <?php
      else:
    ?>
	<a href=<?php echo '"'.$pg_id.'.html"'; ?>><li class="ncurr"><?php echo $pg_name; ?></li></a>
	<!-- for text browsers -->
	<a hidden href=<?php echo '"'.$pg_id.'.html"'; ?>>&lt; go</a>
    <?php endif;
      endforeach;
    ?>
    </ul>
  </div>
  <div style="margin-left: 15%">
    <div id="main" class="main">
      <?php include 'static/'.$lang_dir.$page.'-main.html'; ?>
    </div>
  </div>
</body>
</html>