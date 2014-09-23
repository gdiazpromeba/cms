<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipUsa.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsUsaSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

  if ($ultimo=='obtienePorCodigo'){
		$svc = new ZipsUsaSvcImpl();
		$bean=$svc->obtienePorCodigo($_REQUEST['zip']);
		$ret=array();
		if (!(empty($bean))){
		  $ret["success"]=true;
		  $ret["id"]=$bean->getId();
		  $ret["code"]=$bean->getCode();
		  $ret["latitude"]=$bean->getLatitude();
		  $ret["longitude"]=$bean->getLongitude();
		  $ret["city"]=$bean->getCity();
		  $ret["county"]=$bean->getCounty();
		  $ret["state"]=$bean->getState();
		}else{
		  $ret["success"]=false;
		}
		echo json_encode($ret) ;
  }

?>