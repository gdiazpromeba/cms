<?php
  require_once '../../config.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ZipJapan.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/ZipsJapanSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

  if ($ultimo=='obtienePorCodigo'){
		$svc = new ZipsJapanSvcImpl();
		$bean=$svc->obtienePorCodigo($_REQUEST['zip']);
		$ret=array();
		if (!(empty($bean))){
		  $ret["success"]=true;
		  $ret["id"]=$bean->getId();
		  $ret["code"]=$bean->getCode();
		  $ret["latitude"]=$bean->getLatitude();
		  $ret["longitude"]=$bean->getLongitude();
		  $ret["location"]=$bean->getLocation();
		  $ret["district"]=$bean->getDistrict();
		  $ret["prefecture"]=$bean->getPrefecture();
		}else{
		  $ret["success"]=false;
		}
		echo json_encode($ret) ;
  }

?>