<?php
  require_once '../../config.php';
  header("Content-Type: text/plain; charset=utf-8");
  require_once $GLOBALS['pathCms'] . '/util/UrlUtils.php';
  
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_REQUEST['urlOrig'];
  $url=UrlUtils::codifica($url);
  echo $url;
  
?>