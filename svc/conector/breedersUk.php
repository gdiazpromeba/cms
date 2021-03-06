<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/BreederUk.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/BreedersUkSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  
//   require_once('FirePHPCore/fb.php4');
//   ob_start();
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  //adaptador para uniformizar los par�metros del "selecciona" para todos los pa�ses
  if ($ultimo=='seleccionaUniversal'){
  	if (isset($_REQUEST['breederName'])) $_REQUEST['nombreOParte']=$_REQUEST['breederName'];
  	if (isset($_REQUEST['firstArea'])) $_REQUEST['country']=$_REQUEST['firstArea'];
  	if (isset($_REQUEST['secondArea'])) $_REQUEST['county']=$_REQUEST['secondArea'];
  	$ultimo='selecciona';
  }  

if ($ultimo=='selecciona'){
		//parametros de paginaci�n
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$country=isset($_REQUEST['country'])?$_REQUEST['country']:null;
		$county=isset($_REQUEST['county'])?$_REQUEST['county']:null;
		$latitude=isset($_REQUEST['latitude'])?$_REQUEST['latitude']:0;
		$longitude=isset($_REQUEST['longitude'])?$_REQUEST['longitude']:0;
		$distance=isset($_REQUEST['distance'])?$_REQUEST['distance']:null;
		$specialBreedId=isset($_REQUEST['specialBreedId'])?$_REQUEST['specialBreedId']:null;
		
		//si el zipCode existe, transformarlo en latitud y longitud
		if (isset($_REQUEST['zipCode']) && !empty($_REQUEST['zipCode'])){
			$svcZips = new ZipsGenericoSvcImpl();
			$zipBean = $svcZips->obtienePorCodigo("UK", $_REQUEST['zipCode']);
			$latitude = $zipBean->getLatitude();
			$longitude = $zipBean->getLongitude();
		}
		

		$svc = new BreedersUkSvcImpl();
		$beans=$svc->selTodos($nombreOParte, $country, $county, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($nombreOParte, $country, $county, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos); 
		
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
		  $arrBean['adminArea1']=$bean->getAdminArea1();
		  $arrBean['adminArea2']=$bean->getAdminArea2();
		  //$arrBean['collArea']=$bean->getCollArea();
		  $arrBean['locality']=$bean->getLocality();
		  $arrBean['subLocality1']=$bean->getSubLocality1();
		  $arrBean['distanceKm']=$bean->getDistancia();  
		  $arrBean['specialBreedId']=$bean->getSpecialBreedId();
		  $arrBean['specialBreedName']=$bean->getSpecialBreedName();
		  $arrBean['metaDescripcion']=$bean->getMetaDescripcion();
		  $arrBean['metaKeywords']=$bean->getMetaKeywords();

		  $arrBean["urlCompleta"]= $GLOBALS["dirWeb"]  .  "/breeders/info/" . "uk" . "/" .  $arrBean["urlEncoded"];
		  $arrBean["distanciaFormateada"]=  number_format($arrBean["distanceKm"] , 1) . " km";
		  $arrBean["locacion"] =  $arrBean['adminArea2'] . ", " . $arrBean['adminArea1'];		  
		  
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	   	$bean=new BreederUk(); 
		$svc = new BreedersUkSvcImpl();
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
	    $adminArea1 = $_REQUEST['adminArea1']; if (empty($adminArea1)) $adminArea1 = null;
	    $bean->setAdminArea1($adminArea1);
	    $adminArea2 = $_REQUEST['adminArea2']; if (empty($adminArea2)) $adminArea2 = null;
	    $bean->setAdminArea2($adminArea2);
// 	    $collArea = $_REQUEST['collArea']; if (empty($collArea)) $collArea = null;
// 	    $bean->setCollArea($collArea);
	    $locality = $_REQUEST['locality']; if (empty($locality)) $locality = null;
	    $bean->setLocality($locality);
	    $subLocality1 = $_REQUEST['subLocality1']; if (empty($subLocality1)) $subLocality1 = null;
	    $bean->setSubLocality1($subLocality1);
	    $specialBreedId=$_REQUEST['specialBreedId']; if (empty($specialBreedId)) $specialBreedId=null;
	    $bean->setSpecialBreedId($specialBreedId);
	    $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	    $bean->setMetaKeywords($_REQUEST['metaKeywords']);
	    $exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	  $bean=new BreederUk();
  	  $svc = new BreedersUkSvcImpl();
  	  $bean->setId($_REQUEST['breederUkId']);
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
	  $adminArea1 = $_REQUEST['adminArea1']; if (empty($adminArea1)) $adminArea1 = null;
	  $bean->setAdminArea1($adminArea1);
	  $adminArea2 = $_REQUEST['adminArea2']; if (empty($adminArea2)) $adminArea2 = null;
	  $bean->setAdminArea2($adminArea2);
// 	  $collArea = $_REQUEST['collArea']; if (empty($collArea)) $collArea = null;
// 	  $bean->setCollArea($collArea);
	  $locality = $_REQUEST['locality']; if (empty($locality)) $locality = null;
	  $bean->setLocality($locality);
	  $subLocality1 = $_REQUEST['subLocality1']; if (empty($subLocality1)) $subLocality1 = null;
	  $bean->setSubLocality1($subLocality1);
	  $specialBreedId=$_REQUEST['specialBreedId']; if (empty($specialBreedId)) $specialBreedId=null;
	  $bean->setSpecialBreedId($specialBreedId);
	  $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	  $bean->setMetaKeywords($_REQUEST['metaKeywords']);
	  $exito=$svc->actualiza($bean);
	  echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new BreedersUkSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeLogo'){
   	    header("Content-Type: text/html; charset=utf-8");
        $uploads_dir = '../../resources/images/breederLogos/uk';
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
  	   
  	//la parte http com�n
  	$breederId=$_REQUEST['breederId'];
    
    // este c�digo m�gico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new BreedersUkSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->vinculaDogBreedABreeder($breederId, $breedId);
  	}
  	
 } else if ($ultimo=='desvinculaDogBreed'){
   	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http com�n
  	$breederId=$_REQUEST['breederId'];
    
    // este c�digo m�gico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new BreedersUkSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->desvinculaDogBreedDeBreeder($breederId, $breedId);
  	}
  	
  } else if ($ultimo=='vinculaCatBreed'){
  	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http com�n
  	$breederId=$_REQUEST['breederId'];
    
    // este c�digo m�gico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new BreedersUkSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->vinculaCatBreedABreeder($breederId, $breedId);
  	}
  	
 } else if ($ultimo=='desvinculaCatBreed'){
   	header("Content-Type: application/json; charset=utf-8");
  	   
  	//la parte http com�n
  	$breederId=$_REQUEST['breederId'];
    
    // este c�digo m�gico extrae solamente la parte JSON de la respuesta
  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body, true); // el "true"  es para indicar que quiero un array y no un objeto stdClass
  	
  	$svc = new BreedersUkSvcImpl();
  	foreach ($data as $item){
      $breedId=$item['id'];
      $svc->desvinculaCatBreedDeBreeder($breederId, $breedId);
    }
 }
    

?>