<?php
  require_once '../../config.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ShelterUsa.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/SheltersUsaSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$estadoId=isset($_REQUEST['stateId'])?$_REQUEST['stateId']:null;
		$latitude=isset($_REQUEST['latitude'])?$_REQUEST['latitude']:null;
		$longitude=isset($_REQUEST['longitude'])?$_REQUEST['longitude']:null;
		$distance=isset($_REQUEST['distance'])?$_REQUEST['distance']:null;
		
		$svc = new SheltersUsaSvcImpl();
		$beans=$svc->selTodos($nombreOParte, $estadoId, $latitude, $longitude, $distance, $desde, $cuantos);
		$cuenta=$svc->selTodosCuenta($nombreOParte, $estadoId, $latitude, $longitude, $distance, $desde, $cuantos); 
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['id']=$bean->getId();
		  $arrBean['name']=$bean->getName();
		  $arrBean['zip']=$bean->getZip();
		  $arrBean['url']=$bean->getUrl();
		  $arrBean['logoUrl']=$bean->getLogoUrl();
		  $arrBean['email']=$bean->getEmail();
		  $arrBean['phone']=$bean->getPhone();
		  $arrBean['description']=$bean->getDescription();
		  $arrBean['streetAddress']=$bean->getStreetAddress();
		  $arrBean['cityName']=$bean->getCityName();
		  $arrBean['countyName']=$bean->getCountyName();
		  $arrBean['stateName']=$bean->getStateName();
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
		$bean->setLogoUrl($_REQUEST['logoUrl']);
		$bean->setEmail($_REQUEST['email']);
		$bean->setPhone($_REQUEST['phone']);
	    $bean->setDescription($_REQUEST['description']);
	    $bean->setStreetAddress($_REQUEST['streetAddress']);
		$exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
  	  $bean=new ShelterUsa();
  	  $svc = new SheltersUsaSvcImpl();
  	  $bean->setId($_REQUEST['id']);
  	  $bean->setName($_REQUEST['name']);
  	  $bean->setZip($_REQUEST['zip']);
  	  $bean->setUrl($_REQUEST['url']);
  	  $bean->setLogoUrl($_REQUEST['logoUrl']);
  	  $bean->setEmail($_REQUEST['email']);
  	  $bean->setPhone($_REQUEST['phone']);
  	  $bean->setDescription($_REQUEST['description']);
  	  $bean->setStreetAddress($_REQUEST['streetAddress']);
	  $exito=$svc->actualiza($bean);
	  echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new SheltersUsaSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  } else if ($ultimo=='zipContainers'){
		$svc = new SheltersUsaSvcImpl();
		$exito=$svc->zipContainers($_REQUEST['zip']);
		echo json_encode($exito) ;
	
  }else if ($ultimo=='subeLogo'){
   	    header("Content-Type: text/html; charset=utf-8");
        $uploads_dir = '../../resources/images/shelterLogos';
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
  }

?>