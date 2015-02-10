<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ShelterUsa.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUsaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
//adaptador para uniformizar los parámetros del "selecciona" para todos los países
if ($ultimo=='seleccionaUniversal'){
  	if (isset($_REQUEST['shelterName'])) $_REQUEST['nombreOParte']=$_REQUEST['shelterName'];
  	if (isset($_REQUEST['firstArea'])) $_REQUEST['stateName']=$_REQUEST['firstArea'];
  	if (isset($_REQUEST['secondArea'])) $_REQUEST['countyName']=$_REQUEST['secondArea'];
  	$ultimo='selecciona';  
}

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$stateName=isset($_REQUEST['stateName'])?$_REQUEST['stateName']:null;
		$countyName=isset($_REQUEST['countyName'])?$_REQUEST['countyName']:null;
		$latitude=isset($_REQUEST['latitude'])?$_REQUEST['latitude']:0;
		$longitude=isset($_REQUEST['longitude'])?$_REQUEST['longitude']:0;
		$distance=isset($_REQUEST['distance'])?$_REQUEST['distance']:null;
		$specialBreedId=isset($_REQUEST['specialBreedId'])?$_REQUEST['specialBreedId']:null;
		
		//si el zipCode existe, transformarlo en latitud y longitud
		if (isset($_REQUEST['zipCode']) && !empty($_REQUEST['zipCode'])){
			$svcZips = new ZipsGenericoSvcImpl();
			$zipBean = $svcZips->obtienePorCodigo("USA", $_REQUEST['zipCode']);
			$latitude = $zipBean->getLatitude();
			$longitude = $zipBean->getLongitude();
		}
	

		$svc = new SheltersUsaSvcImpl();
		$beans=$svc->selTodos($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['id']=$bean->getId();
		  $arrBean['name']=$bean->getName();
		  $arrBean['zip']=$bean->getZip();
		  $arrBean['url']=$bean->getUrl();
		  $arrBean['urlEncoded']=$bean->getUrlEncoded();
		  $arrBean['logoUrl']=$bean->getLogoUrl();
		  $arrBean['email']=$bean->getEmail();
		  $arrBean['phone']=$bean->getPhone();
		  $arrBean['description']=$bean->getDescription();
		  $arrBean['streetAddress']=$bean->getStreetAddress();
		  $arrBean['latitude']=$bean->getLatitude();
		  $arrBean['longitude']=$bean->getLongitude();
		  $arrBean['poBox']=$bean->getPoBox();
		  $arrBean['cityName']=$bean->getCityName();
		  $arrBean['countyName']=$bean->getCountyName();
		  $arrBean['stateName']=$bean->getStateName();
		  $arrBean['distanceMiles']=$bean->getDistancia() * 0.621371 ;  // pasa de km a millas
		  $arrBean['specialBreedId']=$bean->getSpecialBreedId();
		  $arrBean['specialBreedName']=$bean->getSpecialBreedName();
		  $arrBean['adminArea1']=$bean->getAdminArea1();
		  $arrBean['adminArea2']=$bean->getAdminArea2();
		  $arrBean['locality']=$bean->getLocality();
		  $arrBean['statisticalArea']=$bean->getStatisticalArea();
		  $arrBean['metaDescripcion']=$bean->getMetaDescripcion();
		  $arrBean['metaKeywords']=$bean->getMetaKeywords();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;
		
 

   } else if ($ultimo=='inserta'){
	   	$bean=new ShelterUsa(); 
		$svc = new SheltersUsaSvcImpl();
		$bean->setName($_REQUEST['name']);
		$bean->setZip($_REQUEST['zip']);
		$bean->setUrl($_REQUEST['url']);
		$bean->setUrlEncoded($_REQUEST['urlEncoded']);
		$bean->setLogoUrl($_REQUEST['logoUrl']);
		$bean->setEmail($_REQUEST['email']);
		$bean->setPhone($_REQUEST['phone']);
	    $bean->setDescription($_REQUEST['description']);
	    $streetAddress=$_REQUEST['streetAddress']; if (empty($streetAddress)) $streetAddress=null;
	    $bean->setStreetAddress($streetAddress);
	    $bean->setLatitude($_REQUEST['latitude']);
	    $bean->setLongitude($_REQUEST['longitude']);
	    $poBox=$_REQUEST['poBox']; if (empty($poBox)) $poBox=null;
	    $bean->setPoBox($poBox);	
	    $specialBreedId=$_REQUEST['specialBreedId']; if (empty($specialBreedId)) $specialBreedId=null;
	    $bean->setSpecialBreedId($specialBreedId);
	    $bean->setAdminArea1($_REQUEST['adminArea1']);
	    $bean->setAdminArea2($_REQUEST['adminArea2']);
	    $bean->setLocality($_REQUEST['locality']);
	    $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	    $bean->setMetaKeywords($_REQUEST['metaKeywords']);
	    $bean->setStatisticalArea(null);
	    $exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	  $bean=new ShelterUsa();
  	  $svc = new SheltersUsaSvcImpl();
  	  $bean->setId($_REQUEST['shelterUsaId']);
  	  $bean->setName($_REQUEST['name']);
  	  $bean->setZip($_REQUEST['zip']);
  	  $bean->setUrl($_REQUEST['url']);
  	  $bean->setUrlEncoded($_REQUEST['urlEncoded']);
  	  $bean->setLogoUrl($_REQUEST['logoUrl']);
  	  $bean->setEmail($_REQUEST['email']);
  	  $bean->setPhone($_REQUEST['phone']);
  	  $bean->setDescription($_REQUEST['description']);
  	  $streetAddress=$_REQUEST['streetAddress']; if (empty($streetAddress)) $streetAddress=null;
	  $bean->setStreetAddress($streetAddress);
	  $bean->setLatitude($_REQUEST['latitude']);
	  $bean->setLongitude($_REQUEST['longitude']);
	  $poBox=$_REQUEST['poBox']; if (empty($poBox)) $poBox=null;
	  $bean->setPoBox($poBox);	  
	  $specialBreedId=$_REQUEST['specialBreedId']; if (empty($specialBreedId)) $specialBreedId=null;
	  $bean->setSpecialBreedId($specialBreedId);
	  $bean->setAdminArea1($_REQUEST['adminArea1']);
	  $bean->setAdminArea2($_REQUEST['adminArea2']);
	  $bean->setLocality($_REQUEST['locality']);
	  $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	  $bean->setMetaKeywords($_REQUEST['metaKeywords']);
	  $bean->setStatisticalArea(null);
	  $exito=$svc->actualiza($bean);
	  echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new SheltersUsaSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeLogo'){
   	    header("Content-Type: text/html; charset=utf-8");
        $uploads_dir = '../../resources/images/shelterLogos/usa';
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
  	$shelterId=$_REQUEST['shelterId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new SheltersUsaSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->vinculaDogBreedAShelter($shelterId, $breedId);
  	}
  	
 } else if ($ultimo=='desvinculaDogBreed'){
   	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http común
  	$shelterId=$_REQUEST['shelterId'];
    
    // este código mágico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new SheltersUsaSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->desvinculaDogBreedDeShelter($shelterId, $breedId);
  	}
  	
  }
    

?>