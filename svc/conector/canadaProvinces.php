<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/CanadaProvince.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/CanadaProvincesSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  $svc = new CanadaProvincesSvcImpl();

  if ($ultimo=='selecciona'){
	$beans=$svc->selTodos(0, 100);
	$cuenta=$svc->selTodosCuenta();
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
      
  }

?>