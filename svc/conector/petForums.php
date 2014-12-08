<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/PetForum.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/PetForumsSvcImpl.php';
  
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
		if (isset($_REQUEST['nombreOParte'])) $title=$_REQUEST['nombreOParte'];
		

		$svc = new PetForumsSvcImpl();
		$beans=$svc->selTodos($title, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($title); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['id']=$bean->getId();
		  $arrBean['name']=$bean->getName();
		  $arrBean['encodedName']=$bean->getEncodedName();
		  $arrBean['url']=$bean->getUrl();
		  $arrBean['pictureUrl']=$bean->getPictureUrl();
		  $arrBean['description']=$bean->getDescription();
		  $arrBean['metaDescripcion']=$bean->getMetaDescripcion();
		  $arrBean['metaKeywords']=$bean->getMetaKeywords();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	 $bean=new PetForum(); 
	 $svc = new PetForumsSvcImpl();
	 $bean->setName($_REQUEST['forumName']);
	 $bean->setEncodedName($_REQUEST['encodedName']);
	 $bean->setUrl($_REQUEST['forumUrl']);
	 $bean->setPictureUrl($_REQUEST['forumPictureUrl']);
	 $bean->setDescription($_REQUEST['forumDescription']);
	 $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	 $bean->setMetaKeywords($_REQUEST['metaKeywords']);
	 $exito=$svc->inserta($bean);
	 echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	$bean=new PetForum(); 
	$svc = new PetForumsSvcImpl();
    $bean->setId($_REQUEST['forumId']);
	$bean->setName($_REQUEST['forumName']);
	$bean->setEncodedName($_REQUEST['encodedName']);
	$bean->setUrl($_REQUEST['forumUrl']);
	$bean->setPictureUrl($_REQUEST['forumPictureUrl']);
	$bean->setDescription($_REQUEST['forumDescription']);
	$bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	$bean->setMetaKeywords($_REQUEST['metaKeywords']);
  	$exito=$svc->actualiza($bean);
	echo json_encode($exito) ;	

  } else if ($ultimo=='borra'){
	$svc = new NewsSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeLogo'){
   	header("Content-Type: text/html; charset=utf-8");
    $uploads_dir = '../../resources/images/forumLogos';
    if (!is_uploaded_file($_FILES['fichaFotoFU']['tmp_name'])) {
          $exito=array();
          $exito['success']=false;
          $exito['errors']="No se ha podido leer o subir el archivo";
          echo json_encode($exito);
          return;
     }        
     $nombreOrig=$_FILES["fichaFotoFU"]["tmp_name"];
     $nombre=$_FILES["fichaFotoFU"]["name"];
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
 
 } else if ($ultimo=='vinculaDogBreed'){
  	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http común
  	$forumId=$_REQUEST['forumId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new PetForumsSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->vinculaDogBreedAForum($forumId, $breedId);
  	}
  	
 } else if ($ultimo=='desvinculaDogBreed'){
   	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http común
  	$forumId=$_REQUEST['forumId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new PetForumsSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->desvinculaDogBreedDeForum($forumId, $breedId);
  	}	
 } else if ($ultimo=='vinculaCatBreed'){
  	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http común
  	$forumId=$_REQUEST['forumId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new PetForumsSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->vinculaCatBreedAForum($forumId, $breedId);
  	}
  	
 } else if ($ultimo=='desvinculaCatBreed'){
   	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http común
  	$forumId=$_REQUEST['forumId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new PetForumsSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->desvinculaCatBreedDeForum($forumId, $breedId);
  	}
  	
  }

?>