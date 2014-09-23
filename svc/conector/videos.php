<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/Video.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/VideosSvcImpl.php';
  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		
		$title=null;
		if (isset($_REQUEST['videoTitle'])) $title=$_REQUEST['videoTitle'];
		

		$svc = new VideosSvcImpl();
		$beans=$svc->selTodos($title, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($title); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['videoId']=$bean->getId();
		  $arrBean['videoTitle']=$bean->getVideoTitle();
		  $arrBean['videoUrl']=$bean->getVideoUrl();
		  $arrBean['videoTags']=$bean->getVideoTags();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	 $bean=new Video(); 
	 $svc = new VideosSvcImpl();
	 $bean->setVideoTitle($_REQUEST['videoTitle']);
	 $bean->setVideoUrl($_REQUEST['videoUrl']);
	 $bean->setVideoTags($_REQUEST['videoTags']);
	 $exito=$svc->inserta($bean);
	 echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	$bean=new Video(); 
	$svc = new VideosSvcImpl();
    $bean->setId($_REQUEST['videoId']);
	$bean->setVideoTitle($_REQUEST['videoTitle']);
	$bean->setVideoUrl($_REQUEST['videoUrl']);
	$bean->setVideoTags($_REQUEST['videoTags']);
  	$exito=$svc->actualiza($bean);
	echo json_encode($exito) ;	

  } else if ($ultimo=='borra'){
	$svc = new VideosSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }
    

?>