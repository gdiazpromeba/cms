<?php
  require_once '../../config.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/UkRegion.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/UkRegionsSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  $svc = new UkRegionsSvcImpl();

  if ($ultimo=='selecciona'){
  	$statistical = isset($_REQUEST['statistical'])?$_REQUEST['statistical']:null;
	$beans=$svc->selTodos($statistical, 0, 100);
	$cuenta=$svc->selTodosCuenta($statistical);
	$datos=array();
	foreach ($beans as $bean){
	  $arrBean=array();
	  $arrBean['id']=$bean->getId();
	  $arrBean['name']=$bean->getName();
	  $datos[]=$arrBean;
	}
	$resultado=array();
	//$resultado['total']=$cuenta;
	$resultado['data']=$datos;
    echo json_encode($resultado);
      
  } else if ($ultimo=='seleccionaStatistical'){
  	$countryName=isset($_REQUEST['countryName'])?$_REQUEST['countryName']:null;
	$beans=$svc->selTodosStatistical($countryName, 0, 100);
	$cuenta=$svc->selTodosStatisticalCuenta($countryName);
	$datos=array();
	foreach ($beans as $bean){
	  $arrBean=array();
	  $arrBean['id']=$bean->getId();
	  $arrBean['name']=$bean->getName();
	  $datos[]=$arrBean;
	}
	$resultado=array();
	//$resultado['total']=$cuenta;
	$resultado['data']=$datos;
    echo json_encode($resultado);
      
  } else if ($ultimo=='obtieneRegionesMayores'){
  	$regionName=$_REQUEST['regionName'];
	$arr=$svc->obtRegionesMayores($regionName);
    echo json_encode($arr);
  }

?>