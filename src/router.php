<?php
if (php_sapi_name() == 'cli-server') {
  $rqst_split_mask = '/(\/[\w\-\/]*\/)?(([\w\-]+)(\.\w+)?)+\/?$/';
  if (preg_match($rqst_split_mask, $_SERVER["REQUEST_URI"], $matches, PREG_UNMATCHED_AS_NULL)) {
    $rqst_pieces = array(
      'uri' => $matches[0],
      'dir' => $matches[1],
      'resource' => $matches[2],
      'resource_name' => $matches[3],
      'resource_ext' => $matches[4]
    );
    foreach ($rqst_pieces as $key => $val) {
      if (is_null($val)) {
	$rqst_pieces[$key] = '';
      }
    }

    $new_rel_dir = trim($rqst_pieces['dir'], '/');
    if (strlen($new_rel_dir) > 0 && file_exists($new_rel_dir)) {
      chdir($new_rel_dir);
    }

    function incl_index() {
      if (file_exists('index.php')) {
	include 'index.php';
      } elseif (file_exists('index.html')) {
	include 'index.html';
      } else {
	include __DIR__.'/index.php';
      }
    }

    if (strlen($rqst_pieces['resource']) > 0) {
      if (file_exists($rqst_pieces['resource'])) {
	if (is_dir($rqst_pieces['resource'])) {
	  chdir($rqst_pieces['resource']);
	  incl_index();
	} else {
	  include $rqst_pieces['resource'];
	}
      } elseif (file_exists($rqst_pieces['resource_name'].'.php')) {
	include $rqst_pieces['resource_name'].'.php';
      } elseif (file_exists($rqst_pieces['resource_name'].'.html')) {
	include $rqst_pieces['resource_name'].'.html';
      } else {
	incl_index();
      }
    } else {
      incl_index();
    }

//    $ret_file = '';
//    if (strlen($rqst_pieces['resource_ext'] > 0)) {
//      $ret_file = $rqst_pieces['resource'];
//    } elseif (strlen($rqst_pieces['resource_name']) > 0) {
//      if (is_dir($rqst_pieces['resource_name'])) {
//	$new_rel_dir = $rqst_pieces['resource_name'];
//	header('Location: '.$_SERVER['P_HOST'].'/'.$new_rel_dir.'/');
//	return;
//	chdir($new_rel_dir);
//	$ret_file = 'index.php';
//      } else {
//	$ret_file = $rqst_pieces['resource_name'].'.php';
//      }
//    } else {
//      $ret_file = 'index.php';
//    }
//
//    if (strlen($ret_file) > 0 && file_exists($ret_file)) {
//      include $ret_file;
//    } else {
//      if (file_exists('index.php')) {
//	include 'index.php';
//      } else {
//	include __DIR__.'/index.php';
//      }
//    }
  } else {
    include 'index.php';
  }
}
?>
