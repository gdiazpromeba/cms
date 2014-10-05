<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/TextResource.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/TextResourcesSvcImpl.php';
  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		
		$keyOrPart=null;
		if (isset($_REQUEST['keyOrPart'])) $keyOrPart=$_REQUEST['keyOrPart'];

		$textOrPart=null;
		if (isset($_REQUEST['textOrPart'])) $textOrPart=$_REQUEST['textOrPart'];
		

		$svc = new TextResourcesSvcImpl();
		$beans=$svc->selTodos($textOrPart, $keyOrPart, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($textOrPart, $keyOrPart); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['id']=$bean->getId();
		  $arrBean['key']=$bean->getKey();
		  $arrBean['text']=$bean->getText();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   }else if ($ultimo=='obtienePorKey'){
		
		$key=$_REQUEST['key'];
		

		$svc = new NewsSvcImpl();
		$bean=$svc->obtieneKey($key);
		
	    $arrBean=array();
	    $arrBean['id']=$bean->getId();
	    $arrBean['key']=$bean->getKey();
	    $arrBean['text']=$bean->getText();

		echo json_encode($arrBean) ;

   }
    else if ($ultimo=='inserta'){
	 $bean=new TextResource(); 
	 $svc = new TextResourcesSvcImpl();
	 $bean->setKey($_REQUEST['key']);
	 $bean->setText($_REQUEST['text']);
	 
	 $exito=$svc->inserta($bean);
	 echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	$bean=new TextResource(); 
	$svc = new TextResourcesSvcImpl();
    $bean->setId($_REQUEST['id']);
	$bean->setKey($_REQUEST['key']);
	$bean->setText($_REQUEST['text']);
  	$exito=$svc->actualiza($bean);
	echo json_encode($exito) ;	

  } else if ($ultimo=='borra'){
	$svc = new TextResourcesSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }    

?>