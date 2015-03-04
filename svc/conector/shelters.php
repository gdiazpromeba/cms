<?php
  require_once '../../config.php';

  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUsaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersCanadaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUkSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersJapanSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersIndiaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersChinaSvcImpl.php';
  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  
  $svc=null;
  $country=$_REQUEST["country"];
  $countryName=null;
  $area1TypeName=null;
  $area2TypeName=null;
  
  switch($country){
  	case "usa":
  		$svc=new SheltersUsaSvcImpl();
  		$countryName="the United States of America";
  		$area1TypeName="State";
  		$area2TypeName="County";
  		break;
  	case "canada":
  		$svc=new SheltersCanadaSvcImpl();
  		$countryName="Canada";
  		$area1TypeName="Province";
  		$area2TypeName="Subdivision";
  		break;
  	case "uk":
  		$svc=new SheltersUkSvcImpl();
  		$countryName="United Kingdom";
  		$area1TypeName="Country";
  		$area2TypeName="County";
  		break;
  	case "japan":
  		$svc=new SheltersJapanSvcImpl();
  		$countryName="Japan";
  		$area1TypeName="Prefecture";
  		$area2TypeName="Locality";
  		break;
  	case "china":
  		$svc=new SheltersChinaSvcImpl();
  		$countryName="China";
  		$area1TypeName="Province";
  		$area2TypeName="Locality";
  		break;
  	case "india":
  		$svc=new SheltersIndiaSvcImpl();
  		$countryName="India";
  		$area1TypeName="State";
  		$area2TypeName="Locality";
  		break;
  }
  
  $area1=null;
  $area2=null;
  $area1=$_REQUEST['area1'];
  $area2=$_REQUEST['area2'];
  
  $beans=$svc->selTodosWeb(null, $area1, $area2,  0, 0, null, null, 0, 10000);
  $cuenta= $svc->selTodosWebCuenta(null, $area1, $area2, 0, 0, null, null);
  
  $datos=array();
  $datos["countryName"]=$countryName;
  $datos["area1TypeName"]=$area1TypeName;
  $datos["area2TypeName"]=$area2TypeName;
  $datos["items"]=array();
  foreach ($beans as $bean){
  	$arrBean=array();
  	$arrBean['name']=$bean->getName();
  	$arrBean['urlEncoded']=$bean->getUrlEncoded();
  	$datos["items"][]=$arrBean;
  }
  echo json_encode($datos) ;  
?>