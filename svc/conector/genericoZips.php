<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

  if ($ultimo=='obtienePorCodigo'){
		$svc = new ZipsGenericoSvcImpl();
		$bean=$svc->obtienePorCodigo($_REQUEST['pais'], $_REQUEST['zip']);
		$ret=array();
		if (empty($bean)){ 
		  $ret["success"]=false;
		}else{
		  $lat=$bean->getLatitude();
		  if (empty($lat)){
		  	$ret["success"]=false;
		  }else{
		  	$ret["success"]=true;
		  	$ret["id"]=$bean->getId();
		  	$ret["code"]=$bean->getCode();
		  	$ret["latitude"]=$bean->getLatitude();
		  	$ret["longitude"]=$bean->getLongitude();
		  }	
		}
		echo json_encode($ret) ;
  }

?>