<?php
if (php_sapi_name() == 'cli-server') {
  $rout_dir = __DIR__;
  $rqst_split_mask = '/\/([\w\-\/]*\/)?(([\w\-]+)(\.\w+)?)$/';
  if (preg_match($rqst_split_mask, $_SERVER["REQUEST_URI"], $matches, PREG_UNMATCHED_AS_NULL)) {
    $rqst_pieces = array(
      'uri' => $matches[0],
      'dir' => $matches[1],
      'resource' => $matches[2],
      'resource_name' => $matches[3],
      'resource_ext' => $matches[4]
    );
    if (trim($rqst_pieces['dir'], '/') > 0) {
      chdir(trim($rqst_pieces['dir'], '/'));
    }

    $ret_file = '';
    if (strlen($rqst_pieces['resource_ext'] > 0)) {
      $ret_file = $rqst_pieces['resource'];
    } elseif (strlen($rqst_pieces['resource_name']) > 0) {
      $ret_file = $rqst_pieces['resource_name'].'.php';
    } else {
      $ret_file = 'index.php';
    }

    if (file_exists($ret_file)) {
      echo '1!';
      var_dump($rqst_pieces);
      include $ret_file;
    } else {
      echo '2!';
      var_dump($rqst_pieces);
      include __DIR__.'/index.php';
    }
  } else {
    include 'index.php';
  }
}
?>
