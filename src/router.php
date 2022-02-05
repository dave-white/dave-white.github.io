<?php
if (php_sapi_name() == 'cli-server') {
  $rqst_split_mask = '/(.*\/)((\w+)(\.\w+)?)$/';
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
    if (strlen($rqst_pieces['resource_ext'] > 0)) {
      include $rqst_pieces['resource'];
    } else {
      include $rqst_pieces['resource_name'].'.php';
    }
  }
}
?>
