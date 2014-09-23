<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/News.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/NewsSvcImpl.php';
  
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
		if (isset($_REQUEST['newsTitle'])) $title=$_REQUEST['newsTitle'];
		

		$svc = new NewsSvcImpl();
		$beans=$svc->selTodos($title, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($title); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['newsId']=$bean->getId();
		  $arrBean['newsTitle']=$bean->getNewsTitle();
		  $arrBean['urlEncoded']=$bean->getUrlEncoded();
		  $arrBean['newsText']=$bean->getNewsText();
		  $arrBean['newsSource']=$bean->getNewsSource();
		  $arrBean['newsDate']=$bean->getNewsDateLarga();
		  $arrBean['cutPosition']=$bean->getCutPosition();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   }else if ($ultimo=='obtienePorUrlEncoded'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		
		$urlEncoded=null;
		if (isset($_REQUEST['urlEncoded'])) $title=$_REQUEST['urlEncoded'];
		

		$svc = new NewsSvcImpl();
		$bean=$svc->obtienePorUrlEncoded($urlEncoded);
		
	    $arrBean=array();
	    $arrBean['newsId']=$bean->getId();
	    $arrBean['newsTitle']=$bean->getNewsTitle();
	    $arrBean['urlEncoded']=$bean->getUrlEncoded();
	    $arrBean['newsText']=$bean->getNewsText();
	    $arrBean['newsSource']=$bean->getNewsSource();
	    $arrBean['newsDate']=$bean->getNewsDateLarga();
	    $arrBean['cutPosition']=$bean->getCutPosition();

		echo json_encode($arrBean) ;

   }
    else if ($ultimo=='inserta'){
	 $bean=new News(); 
	 $svc = new NewsSvcImpl();
	 $bean->setNewsTitle($_REQUEST['newsTitle']);
	 $bean->setUrlEncoded($_REQUEST['urlEncoded']);
	 $bean->setNewsText($_REQUEST['newsText']);
	 $bean->setNewsSource($_REQUEST['newsSource']);
	 $bean->setNewsDateCorta($_REQUEST['newsDate']);
	 $bean->setCutPosition($_REQUEST['cutPosition']);
	 
	 $exito=$svc->inserta($bean);
	 echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	$bean=new News(); 
	$svc = new NewsSvcImpl();
    $bean->setId($_REQUEST['newsId']);
	$bean->setNewsTitle($_REQUEST['newsTitle']);
	$bean->setUrlEncoded($_REQUEST['urlEncoded']);
	$bean->setNewsText($_REQUEST['newsText']);
	$bean->setNewsSource($_REQUEST['newsSource']);
	$bean->setNewsDateCorta($_REQUEST['newsDate']);
	$bean->setCutPosition($_REQUEST['cutPosition']);
  	$exito=$svc->actualiza($bean);
	echo json_encode($exito) ;	

  } else if ($ultimo=='borra'){
	$svc = new NewsSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeFoto'){
   	header("Content-Type: text/html; charset=utf-8");
    $uploads_dir = '../../resources/images/news';
    if (!is_uploaded_file($_FILES['fotoNews']['tmp_name'])) {
          $exito=array();
          $exito['success']=false;
          $exito['errors']="No se ha podido leer o subir el archivo";
          echo json_encode($exito);
          return;
     }        
     $nombreOrig=$_FILES["fotoNews"]["tmp_name"];
     $nombre=$_FILES["fotoNews"]["name"];
     $movimiento=move_uploaded_file($nombreOrig, "$uploads_dir/$nombre");
     if (!$movimiento){
          $exito=array();
          $exito['success']=false;
          $exito['errors']="No se ha podido mover el archivo a su destino final";
          echo json_encode($exito);
     }else{
          $exito=array();
          $exito['success']=true;
          $exito['archivo']=$nombre;
     }
     echo json_encode($exito);	
 }
    

?>