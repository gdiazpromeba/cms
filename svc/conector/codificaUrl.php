<?php
  require_once '../../config.php';
  header("Content-Type: text/plain; charset=utf-8");
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirWeb'] . '/utils/UrlUtils.php';
  
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_REQUEST['urlOrig'];
  $url=UrlUtils::codifica($url);
  echo $url;
  
?>