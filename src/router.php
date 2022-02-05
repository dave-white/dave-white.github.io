<?php
if (php_sapi_name() == 'cli-server') {
  function incl_index()
  {
    if (file_exists('index.php')) {
      include 'index.php';
    } elseif (file_exists('index.html')) {
      include 'index.html';
    } else {
      include __DIR__.'/index.php';
    }
  }

  function handle_rqst($rel_uri)
  {
    $rqst_split_mask = '/([\w\-\/]*\/)?(([\w\-]+)(\.\w+)?)$/';
    if (preg_match($rqst_split_mask, $rel_uri, $matches, PREG_UNMATCHED_AS_NULL)) {
      foreach ($matches as $idx => $val) {
	if (is_null($val)) {
	  $matches[$idx] = '';
	}
      }
      $dir = $matches[1];
      $resource = $matches[2];
      $resource_name = $matches[3];
      $resource_ext = $matches[4];

      $new_rel_dir = trim($dir, '/');
      if (strlen($new_rel_dir) > 0) {
	if (is_dir($new_rel_dir)) {
	  chdir($new_rel_dir);
	} else {
	  header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
	  exit;
	}
      }

      if (strlen($resource) > 0) {
	if (file_exists($resource)) {
	  include $resource;
	} elseif (file_exists($resource_name.'.php')) {
	  include $resource_name.'.php';
	} elseif (file_exists($resource_name.'.html')) {
	  include $resource_name.'.html';
	} else {
	  header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(__DIR__, '', getcwd()).'/');
	}
      } else {
	incl_index();
      }
    } else {
      include 'index.php';
    }
  }

  $rel_uri = ltrim($_SERVER['REQUEST_URI'], '/');
  if (is_dir($rel_uri)) {
    if (! str_ends_with($rel_uri, '/')) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$rel_uri.'/');
    } else {
      chdir($rel_uri);
      incl_index();
    }
  } else {
    if (str_ends_with($rel_uri, '/')) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.rtrim($rel_uri, '/'));
    } else {
      handle_rqst($rel_uri);
    }
  }
}
?>
