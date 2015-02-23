<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/CatBreed.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/CatBreedsSvcImpl.php';
//   require_once('FirePHPCore/fb.php4');
  


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
		
		
		$svc = new CatBreedsSvcImpl();
		$beans=$svc->selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos);
		$cuenta=$svc->seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta);
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['catBreedId']=$bean->getId();
		  $arrBean['catBreedName']=$bean->getNombre();
		  $arrBean['nameEncoded']=$bean->getNameEncoded();
		  $arrBean['catSizeId']=$bean->getSizeId();
		  $arrBean['catSizeName']=$bean->getSizeName();
		  $arrBean['coatLengthId']=$bean->getCoatLengthId();
		  $arrBean['coatLengthName']=$bean->getCoatLengthName();
		  $arrBean['sizeId']=$bean->getSizeId();
		  $arrBean['sizeName']=$bean->getSizeName();
		  $arrBean['mainFeatures']=$bean->getMainFeatures();
		  $arrBean['headerText']=$bean->getHeaderText();
		  $arrBean['colors']=$bean->getColors();
		  $arrBean['lifeMin']=$bean->getLifeMin();
		  $arrBean['lifeMax']=$bean->getLifeMax();
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
	   	$bean=new CatBreed(); 
		$svc = new CatBreedsSvcImpl();
		$bean->setNombre($_REQUEST['catBreedName']);
		$bean->setNameEncoded($_REQUEST['nameEncoded']);
		$bean->setSizeId($_REQUEST['catSize']);
		$bean->setCoatLengthId($_REQUEST['coatLength']);
		$bean->setSizeId($_REQUEST['size']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
		$bean->setHeaderText($_REQUEST['headerText']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setLifeMin($_REQUEST['lifeMin']);
	    $bean->setLifeMax($_REQUEST['lifeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
// 	    $bean->setServingMin($_REQUEST['servingMin']);
// 	    $bean->setServingMax($_REQUEST['servingMax']);
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
// 	    $bean->setAppartments(isset($_REQUEST['appartments'])?1:0);
// 	    $bean->setKids(isset($_REQUEST['kids'])?1:0);
		$exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
		$bean=new CatBreed();
		$bean->setId($_REQUEST['catBreedId']);
		$bean->setNombre($_REQUEST['catBreedName']);
		$bean->setNameEncoded($_REQUEST['nameEncoded']);
		$bean->setSizeId($_REQUEST['catSize']);
		$bean->setCoatLengthId($_REQUEST['coatLength']);
		$bean->setSizeId($_REQUEST['size']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
		$bean->setHeaderText($_REQUEST['headerText']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setLifeMin($_REQUEST['lifeMin']);
	    $bean->setLifeMax($_REQUEST['lifeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
// 	    $bean->setServingMin($_REQUEST['servingMin']);
// 	    $bean->setServingMax($_REQUEST['servingMax']);
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
// 	    $bean->setAppartments(isset($_REQUEST['appartments'])?1:0);
// 	    $bean->setKids(isset($_REQUEST['kids'])?1:0);
	    $bean->setHabilitada(1);
		$svc = new CatBreedsSvcImpl();
		$exito=$svc->actualiza($bean);
		echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new CatBreedsSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	

  } else if ($ultimo=='inhabilita'){
	$svc = new CatBreedsSvcImpl();
	$exito=$svc->inhabilita($_REQUEST['id']);
	echo json_encode($exito) ;	
	
  }else if ($ultimo=='subeFoto'){
   	    header("Content-Type: text/html; charset=utf-8");
        $uploads_dir = '../../resources/images/catBreeds';
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
		$svc = new CatBreedsSvcImpl(); 
		$arr = $svc->selNombres($nombreOParte);
		echo json_encode($arr) ;
  
  } else if ($ultimo=='selNombresPorShelter'){
		$shelterId=$_REQUEST['shelterId'];
		$svc = new CatBreedsSvcImpl(); 
		$arr = $svc->selNombresPorShelter($shelterId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;
		
  } else if ($ultimo=='selNombresPorBreeder'){
		$breederId=$_REQUEST['breederId'];
		$svc = new CatBreedsSvcImpl(); 
		$arr = $svc->selNombresPorBreeder($breederId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;	

  } else if ($ultimo=='selNombresPorForum'){
		$petForumId=$_REQUEST['forumId'];
		$svc = new CatBreedsSvcImpl(); 
		$arr = $svc->selNombresPorForum($petForumId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;			
  
  } else if ($ultimo=='selSheltersPorRaza'){
		$catBreedId=$_REQUEST['catBreedId'];
		$svc = new CatBreedsSvcImpl(); 
		$arr = $svc->selSheltersPorRaza($catBreedId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;
  }
		
  


?>