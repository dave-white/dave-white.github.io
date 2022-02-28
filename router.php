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
      $dir = '';
      $page = 'index';
      include 'page.php';
    } else {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$issue_lang.'/');
    }
  }

  function emit_404()
  {
    http_response_code(404);
    include 'static/pg-404.html';
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

  function parse_rqst($uri)
  {
    $rqst_split_mask = '/(([\w\-\/]*\/)*([\w\-]+))(\.\w+)?$/';
    if (preg_match($rqst_split_mask, $uri, $matches, PREG_UNMATCHED_AS_NULL)) {
      foreach ($matches as $idx => $val) {
	if (is_null($val)) {
	  $matches[$idx] = '';
	}
      }
      $resource_p = $matches[0];
      $resource_pr = $matches[1];
      $resource_ph = $matches[2];
      $resource_tr = $matches[3];
      $resource_ext = $matches[4];

      if (file_exists($resource_pr.'-mn.php') || file_exists($resource_ph.'static/'.$resource_tr.'-mn.html')) {
	  $dir = $resource_ph;
	  $page = $resource_tr;
	  include 'page.php';
      } elseif (file_exists($resource_pr.'.html')) {
	  include $resource_pr.'.html';
      } elseif (file_exists($resource_p)) {
	  include $resource_p;
      } else {
	  emit_404();
      }
    } else {
	emit_404();
    }
  }

  $uri = ltrim($_SERVER['REQUEST_URI'], '/');
  if (strlen($uri) == 0) {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      default_lang_home();
    } else {
      $dir = '';
      $page = 'index';
      include 'page.php';
    }
  } elseif (! file_exists($uri)) {
    parse_rqst($uri);
  } elseif (is_dir($uri)) {
    if (! str_ends_with($uri, '/')) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.$uri.'/');
    } elseif (file_exists($uri.'index-mn.php')) {
      $dir = $uri;
      $page = 'index';
      include 'page.php';
    } elseif (file_exists($uri.'index.html')) {
      include $uri.'index.html';
    } else {
      emit_404();
    }
  } elseif (is_file($uri)) {
    if (str_ends_with($uri, '/')) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/'.rtrim($uri, '/'));
    } else {
      include $uri;
    }
  } else {
    emit_404();
  }
}
?>
