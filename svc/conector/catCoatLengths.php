<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/CatCoatLength.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/CatCoatLengthsSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  $svc = new CatCoatLengthsSvcImpl();

  if ($ultimo=='selecciona'){
	$beans=$svc->selecciona(0, 100);
	$cuenta=$svc->seleccionaCuenta();
	$datos=array();
	foreach ($beans as $bean){
	  $arrBean=array();
	  $arrBean['id']=$bean->getId();
	  $arrBean['name']=$bean->getNombre();
	  $datos[]=$arrBean;
	}
	$resultado=array();
	//$resultado['total']=$cuenta;
	$resultado['data']=$datos;
    echo json_encode($resultado);
      
  }

?>