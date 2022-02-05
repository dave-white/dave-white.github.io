<?php
if (php_sapi_name() == 'cli-server') {
  $rsrc_pattern = '/\.\w+$/';
  if (! preg_match($rsrc_pattern, $_SERVER["REQUEST_URI"])) {
    $cln_rsrc = trim($_SERVER["REQUEST_URI"],'/').'.php';
    echo '1';
    echo $cln_rsrc;
    include $cln_rsrc;
  } else {
    include ltrim($_SERVER["REQUEST_URI"], '/');
  }
//  if (preg_match('/(index|research|teaching|cv)/', $_SERVER["REQUEST_URI"], $rqst)) {
//    include $rqst[1].'.php';
//  } else { 
//    // pass
//  }
}
?>
