<?php
  require_once '../../config.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/DogBreed.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/DogBreedsSvcImpl.php';
  require_once('FirePHPCore/fb.php4');
  


  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$inicial=isset($_REQUEST['inicial'])?$_REQUEST['inicial']:null;
		$tamañoDesde = isset($_REQUEST['tamañoDesde'])?$_REQUEST['tamañoDesde']:null;
		$tamañoHasta = isset($_REQUEST['tamañoHasta'])?$_REQUEST['tamañoHasta']:null;
		$alimentacion = isset($_REQUEST['alimentacion'])?$_REQUEST['alimentacion']:null;
		$appartments = isset($_REQUEST['appartments'])?$_REQUEST['appartments']:null;
		$kids = isset($_REQUEST['kids'])?$_REQUEST['kids']:null;
		$upkeepDesde = isset($_REQUEST['upkeepDesde'])?$_REQUEST['upkeepDesde']:null;
		$upkeepHasta = isset($_REQUEST['upkeepHasta'])?$_REQUEST['upkeepHasta']:null;
		
		
		$svc = new DogBreedsSvcImpl();
		$beans=$svc->selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos);
		$cuenta=$svc->seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta);
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['dogBreedId']=$bean->getId();
		  $arrBean['dogBreedName']=$bean->getNombre();
		  $arrBean['dogSizeId']=$bean->getSizeId();
		  $arrBean['dogSizeName']=$bean->getSizeName();
		  $arrBean['dogPurposeId']=$bean->getPurposeId();
		  $arrBean['dogPurposeName']=$bean->getPurposeName();
		  $arrBean['dogSheddingAmountId']=$bean->getSheddingAmountId();
		  $arrBean['dogSheddingAmountName']=$bean->getSheddingAmountName();
		  $arrBean['dogSheddingFrequencyId']=$bean->getSheddingFrequencyId();
		  $arrBean['dogSheddingFrequencyName']=$bean->getSheddingFrequencyName();
		  $arrBean['mainFeatures']=$bean->getMainFeatures();
		  $arrBean['colors']=$bean->getColors();
		  $arrBean['sizeMin']=$bean->getSizeMin();
		  $arrBean['sizeMax']=$bean->getSizeMax();
		  $arrBean['weightMin']=$bean->getWeightMin();
		  $arrBean['weightMax']=$bean->getWeightMax();
		  $arrBean['servingMin']=$bean->getServingMin();
		  $arrBean['servingMax']=$bean->getServingMax();
		  $arrBean['friendlyRank']=$bean->getFriendlyRank();
		  $arrBean['friendlyText']=$bean->getFriendlyText();
		  $arrBean['activeRank']=$bean->getActiveRank();
		  $arrBean['activeText']=$bean->getActiveText();
		  $arrBean['healthyRank']=$bean->getHealthyRank();
		  $arrBean['healthyText']=$bean->getHealthyText();
		  $arrBean['trainingRank']=$bean->getTrainingRank();
		  $arrBean['trainingText']=$bean->getTrainingText();
		  $arrBean['guardianRank']=$bean->getGuardianRank();
		  $arrBean['guardianText']=$bean->getGuardianText();
		  $arrBean['groomingRank']=$bean->getGroomingRank();
		  $arrBean['groomingText']=$bean->getGroomingText();
		  $arrBean['pictureUrl']=$bean->getPictureUrl();
		  $arrBean['videoUrl']=$bean->getVideoUrl();
		  $arrBean['appartments']=$bean->getAppartments();
		  $arrBean['kids']=$bean->getKids();
		  $arrBean['habilitada']=$bean->getHabilitada();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	   	$bean=new DogBreed(); 
		$svc = new DogBreedsSvcImpl();
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setSizeId($_REQUEST['dogSize']);
		$bean->setPurposeId($_REQUEST['dogPurpose']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmount']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequency']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setSizeMin($_REQUEST['sizeMin']);
	    $bean->setSizeMax($_REQUEST['sizeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
	    $bean->setServingMin($_REQUEST['servingMin']);
	    $bean->setServingMax($_REQUEST['servingMax']);
	    $bean->setFriendlyRank($_REQUEST['friendlyRank']);
	    $bean->setFriendlyText($_REQUEST['friendlyText']);
	    $bean->setActiveRank($_REQUEST['activeRank']);
	    $bean->setActiveText($_REQUEST['activeText']);
	    $bean->setHealthyRank($_REQUEST['healthyRank']);
	    $bean->setHealthyText($_REQUEST['healthyText']);
	    $bean->setTrainingRank($_REQUEST['trainingRank']);
	    $bean->setTrainingText($_REQUEST['trainingText']);
	    $bean->setGuardianRank($_REQUEST['guardianRank']);
	    $bean->setGuardianText($_REQUEST['guardianText']);
	    $bean->setGroomingRank($_REQUEST['groomingRank']);
	    $bean->setGroomingText($_REQUEST['groomingText']);
	    $bean->setPictureUrl($_REQUEST['pictureUrl']);
	    $bean->setVideoUrl($_REQUEST['videoUrl']);
	    $bean->setAppartments(isset($_REQUEST['appartments'])?1:0);
	    $bean->setKids(isset($_REQUEST['kids'])?1:0);
		$exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
		$bean=new DogBreed();
		$bean->setId($_REQUEST['dogBreedId']);
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setSizeId($_REQUEST['dogSize']);
		$bean->setPurposeId($_REQUEST['dogPurpose']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmount']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequency']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setSizeMin($_REQUEST['sizeMin']);
	    $bean->setSizeMax($_REQUEST['sizeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
	    $bean->setServingMin($_REQUEST['servingMin']);
	    $bean->setServingMax($_REQUEST['servingMax']);
	    $bean->setFriendlyRank($_REQUEST['friendlyRank']);
	    $bean->setFriendlyText($_REQUEST['friendlyText']);
	    $bean->setActiveRank($_REQUEST['activeRank']);
	    $bean->setActiveText($_REQUEST['activeText']);
	    $bean->setHealthyRank($_REQUEST['healthyRank']);
	    $bean->setHealthyText($_REQUEST['healthyText']);
	    $bean->setTrainingRank($_REQUEST['trainingRank']);
	    $bean->setTrainingText($_REQUEST['trainingText']);
	    $bean->setGuardianRank($_REQUEST['guardianRank']);
	    $bean->setGuardianText($_REQUEST['guardianText']);
	    $bean->setGroomingRank($_REQUEST['groomingRank']);
	    $bean->setGroomingText($_REQUEST['groomingText']);
	    $bean->setPictureUrl($_REQUEST['pictureUrl']);
	    $bean->setVideoUrl($_REQUEST['videoUrl']);
	    $bean->setAppartments(isset($_REQUEST['appartments'])?1:0);
	    $bean->setKids(isset($_REQUEST['kids'])?1:0);
	    $bean->setHabilitada(1);
		$svc = new DogBreedsSvcImpl();
		$exito=$svc->actualiza($bean);
		echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new DogBreedsSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	

  } else if ($ultimo=='inhabilita'){
	$svc = new DogBreedsSvcImpl();
	$exito=$svc->inhabilita($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeFoto'){
   	    header("Content-Type: text/html; charset=utf-8");
        $uploads_dir = '../../resources/images/breeds';
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
  
  
  } else if ($ultimo=='selNombres'){
		$nombreOParte=isset($_REQUEST['term'])?$_REQUEST['term']:null;
		$svc = new DogBreedsSvcImpl(); 
		$arr = $svc->selNombres($nombreOParte);
		echo json_encode($arr) ;
  
  } else if ($ultimo=='selNombresPorShelter'){
		$shelterId=$_REQUEST['shelterId'];
		$svc = new DogBreedsSvcImpl(); 
		$arr = $svc->selNombresPorShelter($shelterId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;
  
  } else if ($ultimo=='actualizaEnLotePorShelter'){
  	header("Content-Type: application/json; charset=utf-8");
  	   

  	$request_body = file_get_contents('php://input');
  	$data = json_decode($request_body);
  	fb($data);
  	
  	 
  	
  	
//   	if (isset($_REQUEST['JSON'])) {
//   		$decoded = json_decode(stripslashes($_REQUEST['JSON']), TRUE);
//         echo print_r($decoded);  
//   	}else{
//   		echo print_r($_REQUEST);
//   	}
  }
  


?>