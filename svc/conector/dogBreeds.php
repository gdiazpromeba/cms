<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/DogBreed.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/DogBreedsSvcImpl.php';
  require_once $GLOBALS['pathWeb'] . '/application/business/dogbreeds/DogBreedUtils.php';
//     require_once('FirePHPCore/fb.php4');
//     ob_start();
  

  
  
  
  function beanToArray($bean){
  	$arrBean=array();
  	$arrBean['dogBreedId']=$bean->getId();
  	$arrBean['dogBreedName']=$bean->getNombre();
  	$arrBean['nameEncoded']=$bean->getNameEncoded();
  	$arrBean['dogSizeId']=$bean->getSizeId();
  	$arrBean['dogSizeName']=$bean->getSizeName();
  	$arrBean['dogPurposeId']=$bean->getPurposeId();
  	$arrBean['dogPurposeName']=$bean->getPurposeName();
  	$arrBean['dogSheddingAmountId']=$bean->getSheddingAmountId();
  	$arrBean['dogSheddingAmountName']=$bean->getSheddingAmountName();
  	$arrBean['dogSheddingFrequencyId']=$bean->getSheddingFrequencyId();
  	$arrBean['dogSheddingFrequencyName']=$bean->getSheddingFrequencyName();
  	$arrBean['mainFeatures']=$bean->getMainFeatures();
  	$arrBean['headerText']=$bean->getHeaderText();
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
  	$arrBean['metaDescripcion']=$bean->getMetaDescripcion();
  	$arrBean['metaKeywords']=$bean->getMetaKeywords();
  	$arrBean['habilitada']=$bean->getHabilitada();
  	
  	$feedingArmado = armaFeeding($bean);
  	$arrBean['feedingArmado'] = $feedingArmado;
  	
  	armaUrlsImagenes($arrBean);
  	
  	return $arrBean;
  }

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");

  if ($ultimo=='obtienePorNombreCodificado'){  
  	$nombreCodificado=$_REQUEST['nombreCodificado'];
  	$svc = new DogBreedsSvcImpl();
  	$bean=$svc->obtienePorNombreCodificado($nombreCodificado);
  	$arrBean=beanToArray($bean);
  	echo json_encode($arrBean);

  }else if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$inicial=isset($_REQUEST['inicial'])?$_REQUEST['inicial']:null;
		$tamañoDesde = isset($_REQUEST['tamañoDesde'])?$_REQUEST['tamañoDesde']:null;
		$tamañoHasta = isset($_REQUEST['tamañoHasta'])?$_REQUEST['tamañoHasta']:null;
		$alimentacion = isset($_REQUEST['alimentacion'])?$_REQUEST['alimentacion']:null;
		$purpose = isset($_REQUEST['purpose'])?$_REQUEST['purpose']:null;
		$kids = isset($_REQUEST['kids'])?$_REQUEST['kids']:null;
		$upkeepDesde = isset($_REQUEST['upkeepDesde'])?$_REQUEST['upkeepDesde']:null;
		$upkeepHasta = isset($_REQUEST['upkeepHasta'])?$_REQUEST['upkeepHasta']:null;
		
		
		$svc = new DogBreedsSvcImpl();
		$beans=$svc->selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $purpose, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos);
		$cuenta=$svc->seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $purpose, $kids, $upkeepDesde, $upkeepHasta);
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=beanToArray($bean);
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;
		
		
    }else if ($ultimo=='selDogBreedGroups'){
    	
    	$svc = new DogBreedsSvcImpl();
    	$beans=$svc->selDogBreedGroups();
    	$datos=array(); 
    	foreach ($beans as &$fila){
    		$fila["pictureUrl"]= $GLOBALS['dirAplicacion']  . "/resources/images/breeds/" . $fila["pictureUrl"];
    		$fila["groupUrl"]= $GLOBALS['dirWeb']  . "/dogbreeds/groups/" . urlencode($fila["name"]);
    	}    	
    	echo json_encode($beans) ;
    	
    }else if ($ultimo=='getDogBreedGroup'){
    		 
      $group = $_REQUEST["group"];
    	    
      $sql= "SELECT  \n";
      $sql.= "  DOG_PURPOSE_ID, \n";
      $sql.= "  DOG_PURPOSE_NAME, \n";
      $sql.= "  PICTURE_URL,      \n";
      $sql.= "  TR.TEXT_RESOURCE       \n";
      $sql.= "FROM  \n";
      $sql.= "  DOG_PURPOSES   \n";
      $sql.= "  INNER JOIN TEXT_RESOURCES TR ON DOG_PURPOSES.DESCRIPTION=TR.TEXT_RES_KEY   \n";
      $sql.= "WHERE     \n";
      $sql.= "  DOG_PURPOSE_NAME='" . $group ."'     \n";

      
      if (!$stm = $db_connection->prepare($sql)){
    	    echo $db_connection->error;
    	    exit();
       }
       $stm->execute();
       $stm->bind_result($purposeId, $name, $url, $text);
       $result=array();
       $result["group"]=array();
       if ($stm->fetch()) {
         $fila=array();
    	 $result["group"]["id"] = $purposeId;
    	 $result["group"]["name"]=$name;
    	 $result["group"]["description"]=$text;
    	 $result["group"]["pictureUrl"]= $GLOBALS['dirAplicacion']  . "/resources/images/breeds/" . $url;
    	 $result["group"]["groupUrl"]= $GLOBALS['dirWeb']  . "/dogbreeds/groups/" . $name;
       }
       $stm->close();
       
       
       $sql= "SELECT  \n";
       $sql.= "  DOG_BREED_NAME, \n";
       $sql.= "  NAME_ENCODED    \n";
       $sql.= "FROM  \n";
       $sql.= "  DOG_BREEDS   \n";
       $sql.= "WHERE     \n";
       $sql.= "  DOG_PURPOSE_ID='" .  $result["group"]["id"] ."'     \n";
       
       if (!$stm2 = $db_connection->prepare($sql)){
       	echo $db_connection->error;
       	exit();
       } 
        
       $result["items"]=array();
       $stm2->execute();
       $stm2->bind_result($name, $nameEncoded);
       while ($stm2->fetch()) {
       	 $item=array();
       	 $item["dogBreedName"] = $name;
       	 $item["nameEncoded"]=$nameEncoded;
       	 $item["url"]=   $GLOBALS['dirWeb']  . "/dogbreeds/groups/"  .  urlencode($result["group"]["name"]) . "/" . $nameEncoded;
       	 $result["items"][]=$item;
       }       
       
       $db_connection->close();
       echo json_encode($result);

    }else if ($ultimo=='seleccionaNg'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$nombreOParte=isset($_REQUEST['nombreOParte'])?$_REQUEST['nombreOParte']:null;
		$inicial=isset($_REQUEST['inicial'])?$_REQUEST['inicial']:null;
		$tamañoDesde=null;
		$tamañoHasta=null;
		if (isset($_REQUEST['size'])){
			$tamaño = $_REQUEST['size'];
			$tamaños=calculaTamaños($tamaño);
			$tamañoDesde=$tamaños[0];
			$tamañoHasta=$tamaños[1];
		}
		$alimentacion = isset($_REQUEST['alimentacion'])?$_REQUEST['alimentacion']:null;
		$upkeepDesde=null;
		$upkeepHasta=null;
		if (isset($_REQUEST['upkeep'])){
			$upkeeps=calculaUpkeep($_REQUEST['upkeep']);
			$upkeepDesde=$upkeeps[0];
			$upkeepHasta=$upkeeps[1];
		}	
		
		
		$cuantos=15;

		
		
		$svc = new DogBreedsSvcImpl();
		$beans=$svc->selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, null, null, $upkeepDesde, $upkeepHasta, $desde, $cuantos);
		$cuenta=$svc->seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, null, null, $upkeepDesde, $upkeepHasta);
		
		$resultado=array();
		$resultado["size"]=$cuenta;
		$resultado["data"]=array();
		
		$resultado["data"]["rows"]=array();
		$numCols=3;
		$numRows=5;
		$index=0;
		$keys = array_keys($beans);
		for ($row=0; $row <$numRows && $index < count($beans) ; $row++){
			$rowObj=array();
			$rowObj["cells"]=array();
			for ($col=0; $col<$numCols && $index < count($keys) ; $col++){
				$bean=$beans[$keys[$index]];
				$cell=array();
				$cell["name"]=$bean->getNombre();
				$cell["nameEncoded"]=$bean->getNameEncoded();
				$cell["pictureUrl"]=$bean->getPictureUrl();
			    $rowObj["cells"][]=$cell;
			    $index++;
			}
			$resultado["data"]["rows"][]=$rowObj;
		}
		echo json_encode($resultado) ;

    }else if ($ultimo=='seleccionaNgAlpha'){

		
		
		$svc = new DogBreedsSvcImpl();
		$beans=$svc->selecciona(null, null, null, null, null, null, null, null, null, 0, 10000);
		
		
		
		$resultado=array();
		$resultado["bloques"]=array();
		$beansPorLetra=array();
		
		//agrupa todos los beans en un array,según la letra incial, en mayúscula
		foreach ($beans as $bean){
			$name=$bean->getNombre();
			$letra=strtoupper($name[0]);
			if (!isset($beansPorLetra[$letra])){
				$beansPorLetra[$letra]=array();
			}
			$beansPorLetra[$letra][]=$bean;
		}
		
		
		foreach (array_keys($beansPorLetra) as $letra){
			$beansDeLaLetra=$beansPorLetra[$letra];
			$bloque=array();
			$bloque["letra"]=$letra;
	
			$bloque["rows"]=array();
			$numCols=3;
			
			$keys = array_keys($beansDeLaLetra);
			for ($index=0;  $index < count($beansDeLaLetra) ; ){
				$rowObj=array();
				$rowObj["cells"]=array();
				for ($col=0; $col<$numCols && $index < count($keys) ; $col++){
					$bean=$beansDeLaLetra[$keys[$index]];
					$cell=array();
					$cell["name"]=$bean->getNombre();
					$cell["nameEncoded"]=$bean->getNameEncoded();
					$cell["pictureUrl"]=$GLOBALS['dirAplicacion'] . "/resources/images/breeds/" . $bean->getPictureUrl();
					$rowObj["cells"][]=$cell;
					$index++;
				}
				$bloque["rows"][]=$rowObj;
			}
			$resultado["bloques"][]=$bloque;
		}
		
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	   	$bean=new DogBreed(); 
		$svc = new DogBreedsSvcImpl();
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setNameEncoded($_REQUEST['nameEncoded']);
		$bean->setSizeId($_REQUEST['dogSize']);
		$bean->setPurposeId($_REQUEST['dogPurpose']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmount']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequency']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
		$bean->setHeaderText($_REQUEST['headerText']);
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
	    $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	    $bean->setMetaKeywords($_REQUEST['metaKeywords']);
		$exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
		$bean=new DogBreed();
		$bean->setId($_REQUEST['dogBreedId']);
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setNameEncoded($_REQUEST['nameEncoded']);
		$bean->setSizeId($_REQUEST['dogSize']);
		$bean->setPurposeId($_REQUEST['dogPurpose']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmount']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequency']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
		$bean->setHeaderText($_REQUEST['headerText']);
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
	    $bean->setMetaDescripcion($_REQUEST['metaDescripcion']);
	    $bean->setMetaKeywords($_REQUEST['metaKeywords']);
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
		foreach ( $res["data"] as &$fila){
			$fila["fullPictureUrl"] = $GLOBALS['dirAplicacion'] . "/resources/images/breeds/" . $fila["pictureUrl"];
		}		
		echo json_encode($res) ;
		
  } else if ($ultimo=='selNombresPorBreeder'){
		$breederId=$_REQUEST['breederId'];
		$svc = new DogBreedsSvcImpl(); 
		$arr = $svc->selNombresPorBreeder($breederId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		foreach ( $res["data"] as &$fila){
			$fila["fullPictureUrl"] = $GLOBALS['dirAplicacion'] . "/resources/images/breeds/" . $fila["pictureUrl"];
		}		
		echo json_encode($res) ;	

  } else if ($ultimo=='selNombresPorForum'){
		$petForumId=$_REQUEST['forumId'];
		$svc = new DogBreedsSvcImpl(); 
		$arr = $svc->selNombresPorForum($petForumId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;		
  
  } else if ($ultimo=='selSheltersPorRaza'){
		$dogBreedId=$_REQUEST['dogBreedId'];
		$svc = new DogBreedsSvcImpl(); 
		$arr = $svc->selSheltersPorRaza($dogBreedId);
		$res=array();
		$res['data']=$arr;
		$res['total']=count($arr);
		echo json_encode($res) ;
  }
  

    function calculaTamaños($selDogSize){
     	$tamañoDesde=0;
     	$tamañoHasta=100;
     
     	switch($selDogSize){
     		case "large":
     			$tamañoDesde=60;
     			$tamañoHasta=60;
     			break;
     		case "medium":
     			$tamañoDesde=50;
     			$tamañoHasta=50;
     			break;
     		case "small":
     			$tamañoDesde=30;
     			$tamañoHasta=30;
     			break;
     		case "toy":
     			$tamañoDesde=20;
     			$tamañoHasta=20;
     			break;
     		default:
     			$tamañoDesde=0;
     			$tamañoHasta=100;
     			break;
     	}
     	return array($tamañoDesde, $tamañoHasta);
     
     }    
  
  function calculaUpkeep($selUpkeep){
  	$upkeepDesde=1;
  	$upkeepHasta=5;
  	switch($selUpkeep){
  		case "little":
  			$upkeepDesde=1;
  			$upkeepHasta=2;
  			break;
  		case "average":
  			$upkeepDesde=3;
  			$upkeepHasta=3;
  			break;
  		case "a lot":
  			$upkeepDesde=4;
  			$upkeepHasta=5;
  			break;
  	}
  	return array($upkeepDesde, $upkeepHasta);
  }
  
  function armaFeeding($info){
  	$min= $info->getServingMin();
  	$max= $info->getServingMax();
  	 
  	if ($min!=$max){
  		$res= DogBreedUtils::trataFracciones($min);
  		$res .=" to " . DogBreedUtils::trataFracciones($max);
  		$res .=" cups of quality dry food, twice a day";
  	}else{
  		$res= DogBreedUtils::trataFracciones($min);
  		$res .=" cups of quality dry food, twice a day";
  	}
  	return $res;
  }  
  
  
  /**
   * crea  URLs completas con las imágenes
   * @param unknown $arrBean
   */
  function armaUrlsImagenes (& $arrBean){
  	//estrellas
  	$urlBase=$GLOBALS['dirAplicacion']  . "/resources/images/estrellas_"; 
  	$arrBean["imgStarFriendly"]= $urlBase . $arrBean["friendlyRank"] . ".gif";
  	$arrBean["imgStarActive"]= $urlBase .   $arrBean["activeRank"] . ".gif";
  	$arrBean["imgStarHealthy"]= $urlBase . $arrBean["healthyRank"] . ".gif";
  	$arrBean["imgStarGuardian"]= $urlBase . $arrBean["guardianRank"] . ".gif";
  	$arrBean["imgStarGrooming"]= $urlBase . $arrBean["groomingRank"] . ".gif";

  	//breed
  	$urlBase=$GLOBALS['dirAplicacion']  . "/resources/images/breeds/";
  	$arrBean["imgBreed"]= $urlBase . $arrBean["pictureUrl"];
  	
  	//botón para cerrar la ventana
  	$arrBean["imgBotonCerrar"]= $GLOBALS['dirWeb']  . "/public/img/close_button_turquesa.gif";
  	
  }


?>