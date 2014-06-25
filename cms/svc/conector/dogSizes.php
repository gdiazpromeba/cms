<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/beans/DogSize.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/svc/impl/DogSizesSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  $svc = new DogSizesSvcImpl();

  if ($ultimo=='selecciona'){
	$beans=$svc->selTodos(0, 100);
	$cuenta=$svc->selTodosCuenta();
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