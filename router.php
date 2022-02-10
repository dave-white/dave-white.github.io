<?php
if (php_sapi_name() == 'cli-server') {
  function default_lang_home()
  {
    $supported_langs = array('en', 'fr');
    $issue_lang = 'en'; // default

    $http_lang_mask = '/([a-z]{1,3}(?:\-[A-Z]{1,3})?)\s*(?:;\s*q\s*=\s*(1|1\.0|0.\d|\.\d))?,/';
    if (str_ends_with($_SERVER['HTTP_ACCEPT_LANGUAGE'], ',')) {
      $lang_accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    } else {
      $lang_accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'].',';
    }
    if (preg_match_all($http_lang_mask, $lang_accept, $matches)) {
      $user_langs = array();
      foreach ($matches[1] as $idx => $lang) {
	if (strlen($matches[2][$idx]) <= 0) {
	  $user_langs[$lang] = 1.0;
	} else {
	  $user_langs[$lang] = floatval($matches[2][$idx]);
	}
      }
      arsort($user_langs);

      foreach ($user_langs as $lang => $weight) {
	if (in_array($lang, $supported_langs)) {
	  $issue_lang = $lang;
	  break;
	}
      }
    }

    if ($issue_lang == 'en') {
      include 'index.php';
    } else {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$issue_lang.'/');
    }
  }

  function emit_404()
  {
    http_response_code(404);
    include 'pg-404.html';
    die;
  }

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
	  emit_404();
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
	  emit_404();
	}
      } else {
	incl_index();
      }
    } else {
      include 'index.php';
    }
  }

  $rel_uri = ltrim($_SERVER['REQUEST_URI'], '/');
  if (strlen($rel_uri) <= 0) {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      default_lang_home();
    } else {
      include 'index.php';
    }
  } else {
    if (is_dir($rel_uri)) {
      if (! str_ends_with($rel_uri, '/')) {
	// if (! handle_rqst($rel_uri))
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
}
?>
