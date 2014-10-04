<?php 

require_once $GLOBALS['pathCms'] .  '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/DogBreedsOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/DogBreed.php';  
// require_once('FirePHPCore/fb.php4');

   class DogBreedsOadImpl extends AOD implements DogBreedsOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  DBR.DOG_BREED_ID,     \n"; 
         $sql.="  DBR.DOG_BREED_NAME,     \n"; 
         $sql.="  DBR.DOG_SIZE_ID,     \n"; 
         $sql.="  DSI.DOG_SIZE_NAME,     \n"; 
         $sql.="  DBR.DOG_PURPOSE_ID,     \n"; 
         $sql.="  DPU.DOG_PURPOSE_NAME,     \n"; 
         $sql.="  DBR.DOG_SHEDDING_AMOUNT_ID,     \n"; 
         $sql.="  DSA.DOG_SHEDDING_AMOUNT_NAME,     \n"; 
         $sql.="  DBR.DOG_SHEDDING_FREQUENCY_ID,     \n"; 
         $sql.="  DSF.DOG_SHEDDING_FREQUENCY_NAME,     \n"; 
         $sql.="  DBR.MAIN_FEATURES,     \n"; 
         $sql.="  DBR.HEADER_TEXT,     \n"; 
         $sql.="  DBR.COLORS,     \n"; 
         $sql.="  DBR.SIZE_MIN,     \n"; 
         $sql.="  DBR.SIZE_MAX,     \n"; 
         $sql.="  DBR.WEIGHT_MIN,     \n"; 
         $sql.="  DBR.WEIGHT_MAX,     \n"; 
         $sql.="  DBR.SERVING_MIN,     \n";
         $sql.="  DBR.SERVING_MAX,     \n";
         $sql.="  DBR.FRIENDLY_RANK,     \n"; 
         $sql.="  DBR.FRIENDLY_TEXT,     \n"; 
         $sql.="  DBR.ACTIVE_RANK,     \n"; 
         $sql.="  DBR.ACTIVE_TEXT,     \n"; 
         $sql.="  DBR.HEALTHY_RANK,     \n"; 
         $sql.="  DBR.HEALTHY_TEXT,     \n"; 
         $sql.="  DBR.TRAINING_RANK,     \n"; 
         $sql.="  DBR.TRAINING_TEXT,     \n"; 
         $sql.="  DBR.GUARDIAN_RANK,     \n";
         $sql.="  DBR.GUARDIAN_TEXT,     \n";
         $sql.="  DBR.GROOMING_RANK,     \n";
         $sql.="  DBR.GROOMING_TEXT,     \n";
         $sql.="  DBR.PICTURE_URL,     \n"; 
         $sql.="  DBR.VIDEO_URL,     \n";
         $sql.="  DBR.APPARTMENTS,     \n";
         $sql.="  DBR.KIDS,     \n";
         $sql.="  DBR.HABILITADA    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  DOG_BREEDS DBR \n";
         $sql.="  INNER JOIN DOG_PURPOSES DPU ON DBR.DOG_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  INNER JOIN DOG_SIZES DSI ON DBR.DOG_SIZE_ID=DSI.DOG_SIZE_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_AMOUNTS DSA ON DBR.DOG_SHEDDING_AMOUNT_ID=DSA.DOG_SHEDDING_AMOUNT_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_FREQUENCIES DSF ON DBR.DOG_SHEDDING_FREQUENCY_ID=DSF.DOG_SHEDDING_FREQUENCY_ID \n";
         $sql.="WHERE  \n"; 
         $sql.="  DBR.DOG_BREED_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new DogBreed();  
         $stm->bind_result($id, $nombre, $sizeId, $sizeName, $purposeId, $purposeName, $sheddingAmountId, $sheddingAmountName, $sheddingFrequencyId, $sheddingFrequencyName, 
         		  $mainFeatures, $headerText, $colors, $sizeMin, $sizeMax, $weightMin, $weightMax, 
         		  $servingMin, $servingMax,
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $appartments, $kids, $habilitada); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNombre($nombre);
            $bean->setSizeId($sizeId);
            $bean->setSizeName($sizeName);
            $bean->setPurposeId($purposeId);
            $bean->setPurposeName($purposeName);
            $bean->setSheddingAmountId($sheddingAmountId);
            $bean->setSheddingAmountName($sheddingAmountName);
            $bean->setSheddingFrequencyId($sheddingFrequencyId);
            $bean->setSheddingFrequencyName($sheddingFrequencyName);
            $bean->setMainFeatures($mainFeatures);
            $bean->setHeaderText($headerText);
            $bean->setColors($colors);
            $bean->setSizeMin($sizeMin);
            $bean->setSizeMax($sizeMax);
            $bean->setWeightMin($weightMin);
            $bean->setWeightMax($weightMax);
            $bean->setServingMin($servingMin);
            $bean->setServingMax($servingMax);
            $bean->setFriendlyRank($friendlyRank);
            $bean->setFriendlyText($friendlyText);
            $bean->setActiveRank($activeRank);
            $bean->setActiveText($activeText);
            $bean->setHealthyRank($healthyRank);
            $bean->setHealthyText($healthyText);
            $bean->setTrainingRank($trainingRank);
            $bean->setTrainingText($trainingText);
            $bean->setGuardianRank($guardianRank);
            $bean->setGuardianText($guardianText);
            $bean->setGroomingRank($groomingRank);
            $bean->setGroomingText($groomingText);
            $bean->setPictureUrl($pictureUrl);
            $bean->setVideoUrl($videoUrl);
            $bean->setAppartments($appartments);
            $bean->setKids($kids);
            $bean->setHabilitada($habilitada);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorNombre($nombre){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  DBR.DOG_BREED_ID,     \n";
      	$sql.="  DBR.DOG_BREED_NAME,     \n";
      	$sql.="  DBR.DOG_SIZE_ID,     \n";
      	$sql.="  DSI.DOG_SIZE_NAME,     \n";
      	$sql.="  DBR.DOG_PURPOSE_ID,     \n";
      	$sql.="  DPU.DOG_PURPOSE_NAME,     \n";
      	$sql.="  DBR.DOG_SHEDDING_AMOUNT_ID,     \n";
      	$sql.="  DSA.DOG_SHEDDING_AMOUNT_NAME,     \n";
      	$sql.="  DBR.DOG_SHEDDING_FREQUENCY_ID,     \n";
      	$sql.="  DSF.DOG_SHEDDING_FREQUENCY_NAME,     \n";
      	$sql.="  DBR.MAIN_FEATURES,     \n";
      	$sql.="  DBR.HEADER_TEXT,     \n";
      	$sql.="  DBR.COLORS,     \n";
      	$sql.="  DBR.SIZE_MIN,     \n";
      	$sql.="  DBR.SIZE_MAX,     \n";
      	$sql.="  DBR.WEIGHT_MIN,     \n";
      	$sql.="  DBR.WEIGHT_MAX,     \n";
      	$sql.="  DBR.SERVING_MIN,     \n";
      	$sql.="  DBR.SERVING_MAX,     \n";
      	$sql.="  DBR.FRIENDLY_RANK,     \n";
      	$sql.="  DBR.FRIENDLY_TEXT,     \n";
      	$sql.="  DBR.ACTIVE_RANK,     \n";
      	$sql.="  DBR.ACTIVE_TEXT,     \n";
      	$sql.="  DBR.HEALTHY_RANK,     \n";
      	$sql.="  DBR.HEALTHY_TEXT,     \n";
      	$sql.="  DBR.TRAINING_RANK,     \n";
      	$sql.="  DBR.TRAINING_TEXT,     \n";
      	$sql.="  DBR.GUARDIAN_RANK,     \n";
      	$sql.="  DBR.GUARDIAN_TEXT,     \n";
      	$sql.="  DBR.GROOMING_RANK,     \n";
      	$sql.="  DBR.GROOMING_TEXT,     \n";
      	$sql.="  DBR.PICTURE_URL,     \n";
      	$sql.="  DBR.VIDEO_URL,     \n";
      	$sql.="  DBR.APPARTMENTS,     \n";
      	$sql.="  DBR.KIDS,     \n";
      	$sql.="  DBR.HABILITADA    \n";
      	$sql.="FROM  \n";
      	$sql.="  DOG_BREEDS DBR \n";
      	$sql.="  INNER JOIN DOG_PURPOSES DPU ON DBR.DOG_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
      	$sql.="  INNER JOIN DOG_SIZES DSI ON DBR.DOG_SIZE_ID=DSI.DOG_SIZE_ID \n";
      	$sql.="  INNER JOIN DOG_SHEDDING_AMOUNTS DSA ON DBR.DOG_SHEDDING_AMOUNT_ID=DSA.DOG_SHEDDING_AMOUNT_ID \n";
      	$sql.="  INNER JOIN DOG_SHEDDING_FREQUENCIES DSF ON DBR.DOG_SHEDDING_FREQUENCY_ID=DSF.DOG_SHEDDING_FREQUENCY_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  DBR.DOG_BREED_NAME='" . $nombre . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new DogBreed();
      	$stm->bind_result($id, $nombre, $sizeId, $sizeName, $purposeId, $purposeName, $sheddingAmountId, $sheddingAmountName, $sheddingFrequencyId, $sheddingFrequencyName, 
      			$mainFeatures, $headerText, $colors, $sizeMin, $sizeMax, $weightMin, $weightMax,
      			$servingMin, $servingMax,
      			$friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText,
      			$pictureUrl, $videoUrl, $appartments, $kids, $habilitada);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNombre($nombre);
      		$bean->setSizeId($sizeId);
      		$bean->setSizeName($sizeName);
      		$bean->setPurposeId($purposeId);
      		$bean->setPurposeName($purposeName);
      		$bean->setSheddingAmountId($sheddingAmountId);
      		$bean->setSheddingAmountName($sheddingAmountName);
      		$bean->setSheddingFrequencyId($sheddingFrequencyId);
      		$bean->setSheddingFrequencyName($sheddingFrequencyName);
      		$bean->setMainFeatures($mainFeatures);
      		$bean->setHeadertext($headerText);
      		$bean->setColors($colors);
      		$bean->setSizeMin($sizeMin);
      		$bean->setSizeMax($sizeMax);
      		$bean->setWeightMin($weightMin);
      		$bean->setWeightMax($weightMax);
      		$bean->setServingMin($servingMin);
      		$bean->setServingMax($servingMax);
      		$bean->setFriendlyRank($friendlyRank);
      		$bean->setFriendlyText($friendlyText);
      		$bean->setActiveRank($activeRank);
      		$bean->setActiveText($activeText);
      		$bean->setHealthyRank($healthyRank);
      		$bean->setHealthyText($healthyText);
      		$bean->setTrainingRank($trainingRank);
      		$bean->setTrainingText($trainingText);
      		$bean->setGuardianRank($guardianRank);
      		$bean->setGuardianText($guardianText);
      		$bean->setGroomingRank($groomingRank);
      		$bean->setGroomingText($groomingText);
      		$bean->setPictureUrl($pictureUrl);
      		$bean->setVideoUrl($videoUrl);
      		$bean->setAppartments($appartments);
      		$bean->setKids($kids);
      		$bean->setHabilitada($habilitada);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO DOG_BREEDS (   \n"; 
         $sql.="  DOG_BREED_ID,     \n"; 
         $sql.="  DOG_BREED_NAME,     \n"; 
         $sql.="  DOG_SIZE_ID,     \n"; 
         $sql.="  DOG_PURPOSE_ID,     \n"; 
         $sql.="  DOG_SHEDDING_AMOUNT_ID,     \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCY_ID,     \n"; 
         $sql.="  MAIN_FEATURES,     \n"; 
         $sql.="  HEADER_TEXT,     \n"; 
         $sql.="  COLORS,     \n"; 
         $sql.="  SIZE_MIN,     \n"; 
         $sql.="  SIZE_MAX,     \n"; 
         $sql.="  WEIGHT_MIN,     \n"; 
         $sql.="  WEIGHT_MAX,     \n"; 
         $sql.="  SERVING_MIN,     \n";
         $sql.="  SERVING_MAX,     \n";
         $sql.="  FRIENDLY_RANK,     \n"; 
         $sql.="  FRIENDLY_TEXT,     \n"; 
         $sql.="  ACTIVE_RANK,     \n"; 
         $sql.="  ACTIVE_TEXT,     \n"; 
         $sql.="  HEALTHY_RANK,     \n"; 
         $sql.="  HEALTHY_TEXT,     \n"; 
         $sql.="  TRAINING_RANK,     \n"; 
         $sql.="  TRAINING_TEXT,     \n"; 
         $sql.="  GUARDIAN_RANK,     \n";
         $sql.="  GUARDIAN_TEXT,     \n";
         $sql.="  GROOMING_RANK,     \n";
         $sql.="  GROOMING_TEXT,     \n";
         $sql.="  PICTURE_URL,     \n"; 
         $sql.="  VIDEO_URL,     \n"; 
         $sql.="  APPARTMENTS,     \n";
         $sql.="  KIDS,     \n";
         $sql.="  HABILITADA)    \n"; 
         $sql.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssssssssddddddisisisisisisssii",$bean->getId(), $bean->getNombre(), $bean->getSizeId(), $bean->getPurposeId(), $bean->getSheddingAmountId(), $bean->getSheddingFrequencyId(), 
         		  $bean->getMainFeatures(),   $bean->getHeaderText(), $bean->getColors(), $bean->getSizeMin(), $bean->getSizeMax(), $bean->getWeightMin(), $bean->getWeightMax(), 
         		  $bean->getServingMin(), $bean->getServingMax(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl(), $bean->getAppartments(), $bean->getKids()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 
      

      


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM DOG_BREEDS   \n"; 
         $sql.="WHERE DOG_BREED_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 
      
      public function inhabilita($id){
      	$conexion=$this->conectarse();
      	$sql="UPDATE DOG_BREEDS   \n";
      	$sql.="SET HABILITADA=0  \n";
      	$sql.="WHERE DOG_BREED_ID=?   \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("s", $id);
      	return $this->ejecutaYCierra($conexion, $stm);
      }


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE DOG_BREEDS SET   \n"; 
         $sql.="  DOG_BREED_NAME=?,     \n"; 
         $sql.="  DOG_SIZE_ID=?,     \n"; 
         $sql.="  DOG_PURPOSE_ID=?,     \n"; 
         $sql.="  DOG_SHEDDING_AMOUNT_ID=?,     \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCY_ID=?,     \n"; 
         $sql.="  MAIN_FEATURES=?,     \n"; 
         $sql.="  HEADER_TEXT=?,     \n"; 
         $sql.="  COLORS=?,     \n"; 
         $sql.="  SIZE_MIN=?,     \n"; 
         $sql.="  SIZE_MAX=?,     \n"; 
         $sql.="  WEIGHT_MIN=?,     \n"; 
         $sql.="  WEIGHT_MAX=?,     \n"; 
         $sql.="  SERVING_MIN=?,     \n";
         $sql.="  SERVING_MAX=?,     \n";
         $sql.="  FRIENDLY_RANK=?,     \n"; 
         $sql.="  FRIENDLY_TEXT=?,     \n"; 
         $sql.="  ACTIVE_RANK=?,     \n"; 
         $sql.="  ACTIVE_TEXT=?,     \n"; 
         $sql.="  HEALTHY_RANK=?,     \n"; 
         $sql.="  HEALTHY_TEXT=?,     \n"; 
         $sql.="  TRAINING_RANK=?,     \n"; 
         $sql.="  TRAINING_TEXT=?,     \n";
         $sql.="  GUARDIAN_RANK=?,     \n";
         $sql.="  GUARDIAN_TEXT=?,     \n";
         $sql.="  GROOMING_RANK=?,     \n";
         $sql.="  GROOMING_TEXT=?,     \n";
         $sql.="  PICTURE_URL=?,     \n"; 
         $sql.="  VIDEO_URL=?,     \n"; 
         $sql.="  APPARTMENTS=?,     \n";
         $sql.="  KIDS=?,     \n";
         $sql.="  HABILITADA=?     \n"; 
         $sql.="WHERE DOG_BREED_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssssssssddddddisisisisisisssiiis", $bean->getNombre(), $bean->getSizeId(), $bean->getPurposeId(), $bean->getSheddingAmountId(), $bean->getSheddingFrequencyId(), 
         		  $bean->getMainFeatures(), $bean->getHeaderText(),   $bean->getColors(), $bean->getSizeMin(), $bean->getSizeMax(), $bean->getWeightMin(), $bean->getWeightMax(), 
         		  $bean->getServingMin(), $bean->getServingMax(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl(), $bean->getAppartments(), $bean->getKids(), $bean->getHabilitada(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  DBR.DOG_BREED_ID,     \n"; 
         $sql.="  DBR.DOG_BREED_NAME,     \n"; 
         $sql.="  DBR.DOG_SIZE_ID,     \n"; 
         $sql.="  DSI.DOG_SIZE_NAME,     \n"; 
         $sql.="  DBR.DOG_PURPOSE_ID,     \n"; 
         $sql.="  DPU.DOG_PURPOSE_NAME,     \n"; 
         $sql.="  DBR.DOG_SHEDDING_AMOUNT_ID,     \n"; 
         $sql.="  DSA.DOG_SHEDDING_AMOUNT_NAME,     \n"; 
         $sql.="  DBR.DOG_SHEDDING_FREQUENCY_ID,     \n"; 
         $sql.="  DSF.DOG_SHEDDING_FREQUENCY_NAME,     \n"; 
         $sql.="  DBR.MAIN_FEATURES,     \n"; 
         $sql.="  DBR.HEADER_TEXT,     \n"; 
         $sql.="  DBR.COLORS,     \n"; 
         $sql.="  DBR.SIZE_MIN,     \n"; 
         $sql.="  DBR.SIZE_MAX,     \n"; 
         $sql.="  DBR.WEIGHT_MIN,     \n"; 
         $sql.="  DBR.WEIGHT_MAX,     \n"; 
         $sql.="  DBR.SERVING_MIN,     \n";
         $sql.="  DBR.SERVING_MAX,     \n";
         $sql.="  DBR.FRIENDLY_RANK,     \n"; 
         $sql.="  DBR.FRIENDLY_TEXT,     \n"; 
         $sql.="  DBR.ACTIVE_RANK,     \n"; 
         $sql.="  DBR.ACTIVE_TEXT,     \n"; 
         $sql.="  DBR.HEALTHY_RANK,     \n"; 
         $sql.="  DBR.HEALTHY_TEXT,     \n"; 
         $sql.="  DBR.TRAINING_RANK,     \n"; 
         $sql.="  DBR.TRAINING_TEXT,     \n";
         $sql.="  DBR.GUARDIAN_RANK,     \n";
         $sql.="  DBR.GUARDIAN_TEXT,     \n";
         $sql.="  DBR.GROOMING_RANK,     \n";
         $sql.="  DBR.GROOMING_TEXT,     \n";
         $sql.="  DBR.PICTURE_URL,     \n"; 
         $sql.="  DBR.VIDEO_URL,     \n";
         $sql.="  DBR.APPARTMENTS,     \n";
         $sql.="  DBR.KIDS,     \n";
         $sql.="  DBR.HABILITADA    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  DOG_BREEDS DBR \n";
         $sql.="  INNER JOIN DOG_PURPOSES DPU ON DBR.DOG_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  INNER JOIN DOG_SIZES DSI ON DBR.DOG_SIZE_ID=DSI.DOG_SIZE_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_AMOUNTS DSA ON DBR.DOG_SHEDDING_AMOUNT_ID=DSA.DOG_SHEDDING_AMOUNT_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_FREQUENCIES DSF ON DBR.DOG_SHEDDING_FREQUENCY_ID=DSF.DOG_SHEDDING_FREQUENCY_ID \n";
         $sql.="WHERE  \n";
         $sql.="  DBR.HABILITADA=1 \n";
         if (!empty($nombreOParte)){
           $sql.="  AND DBR.DOG_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         }
         if (!empty($inicial)){
         	$sql.="  AND UCASE(LEFT(DBR.DOG_BREED_NAME, 1))='" .$inicial . "' \n";
         }
         if (!empty($tamañoDesde)){
         	$sql.="  AND DSI.ORDEN >=" . $tamañoDesde  . " \n";
         }
         if (!empty($tamañoHasta)){
         	$sql.="  AND DSI.ORDEN <=" . $tamañoHasta  . " \n";
         }
         if (!empty($alimentacion)){
         	if ($alimentacion=="less"){
         	  $sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 < 1  \n";
         	}else if ($alimentacion=="2cups"){
         	  $sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 = 1  \n";
         	}else if ($alimentacion=="more"){
         	  $sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 > 1  \n";
         	}
         }
         if (!empty($appartments)){
         	if ($appartments=="Yes"){
         		$sql.="  AND DBR.APPARTMENTS = 1  \n";
         	}else if ($appartments=="No"){
         		$sql.="  AND DBR.APPARTMENTS = 0  \n";
         	}
         }         
         if (!empty($kids)){
         	if ($kids=="Yes"){
         		$sql.="  AND DBR.KIDS = 1  \n";
         	}else if ($kids=="No"){
         		$sql.="  AND DBR.KIDS = 0  \n";
         	}
         }
         if (!empty($upkeepDesde)){
         	$sql.="  AND DBR.GROOMING_RANK >=" . $upkeepDesde  . " \n";
         }
         if (!empty($upkeepHasta)){
         	$sql.="  AND DBR.GROOMING_RANK <=" . $upkeepHasta  . " \n";
         }                  
         $sql.="ORDER BY  \n"; 
         $sql.="  DBR.DOG_BREED_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $nombre, $sizeId, $sizeName, $purposeId, $purposeName, $sheddingAmountId, $sheddingAmountName, $sheddingFrequencyId, $sheddingFrequencyName, 
         		  $mainFeatures, $headerText, $colors, $sizeMin, $sizeMax, $weightMin, $weightMax,
         		  $servingMin, $servingMax, 
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $appartments, $kids, $habilitada); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new DogBreed();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $bean->setSizeId($sizeId);
            $bean->setSizeName($sizeName);
            $bean->setPurposeId($purposeId);
            $bean->setPurposeName($purposeName);
            $bean->setSheddingAmountId($sheddingAmountId);
            $bean->setSheddingAmountName($sheddingAmountName);
            $bean->setSheddingFrequencyId($sheddingFrequencyId);
            $bean->setSheddingFrequencyName($sheddingFrequencyName);
            $bean->setMainFeatures($mainFeatures);
            $bean->setHeaderText($headerText);
            $bean->setColors($colors);
            $bean->setSizeMin($sizeMin);
            $bean->setSizeMax($sizeMax);
            $bean->setWeightMin($weightMin);
            $bean->setWeightMax($weightMax);
            $bean->setServingMin($servingMin);
            $bean->setServingMax($servingMax);
            $bean->setFriendlyRank($friendlyRank);
            $bean->setFriendlyText($friendlyText);
            $bean->setActiveRank($activeRank);
            $bean->setActiveText($activeText);
            $bean->setHealthyRank($healthyRank);
            $bean->setHealthyText($healthyText);
            $bean->setTrainingRank($trainingRank);
            $bean->setTrainingText($trainingText);
            $bean->setGuardianRank($guardianRank);
            $bean->setGuardianText($guardianText);
            $bean->setGroomingRank($groomingRank);
            $bean->setGroomingText($groomingText);
            $bean->setPictureUrl($pictureUrl);
            $bean->setVideoUrl($videoUrl);
            $bean->setAppartments($appartments);
            $bean->setKids($kids);
            $bean->setHabilitada($habilitada);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) \n";
         $sql.="FROM  \n";
         $sql.="  DOG_BREEDS DBR \n";
         $sql.="  INNER JOIN DOG_PURPOSES DPU ON DBR.DOG_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  INNER JOIN DOG_SIZES DSI ON DBR.DOG_SIZE_ID=DSI.DOG_SIZE_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_AMOUNTS DSA ON DBR.DOG_SHEDDING_AMOUNT_ID=DSA.DOG_SHEDDING_AMOUNT_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_FREQUENCIES DSF ON DBR.DOG_SHEDDING_FREQUENCY_ID=DSF.DOG_SHEDDING_FREQUENCY_ID \n";
         $sql.="WHERE  \n";
         $sql.="  DBR.HABILITADA=1 \n";
         if (!empty($nombreOParte)){
         	$sql.="  AND DBR.DOG_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         }
         if (!empty($inicial)){
         	$sql.="  AND UCASE(LEFT(DBR.DOG_BREED_NAME, 1))='" .$inicial . "' \n";
         }
         if (!empty($tamañoDesde)){
         	$sql.="  AND DSI.ORDEN >=" . $tamañoDesde  . " \n";
         }
         if (!empty($tamañoHasta)){
         	$sql.="  AND DSI.ORDEN <=" . $tamañoHasta  . " \n";
         }
         if (!empty($alimentacion)){
         	if ($alimentacion=="less"){
         		$sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 < 1  \n";
         	}else if ($alimentacion=="2cups"){
         		$sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 = 1  \n";
         	}else if ($alimentacion=="more"){
         		$sql.="  AND (DBR.SERVING_MIN + DBR.SERVING_MAX)/2 > 1  \n";
         	}
         } 
         if (!empty($appartments)){
         	if ($appartments=="Yes"){
         		$sql.="  AND DBR.APPARTMENTS = 1  \n";
         	}else if ($appartments=="No"){
         		$sql.="  AND DBR.APPARTMENTS = 0  \n";
         	}
         }
         if (!empty($kids)){
         	if ($kids=="Yes"){
         		$sql.="  AND DBR.KIDS = 1  \n";
         	}else if ($kids=="No"){
         		$sql.="  AND DBR.KIDS = 0  \n";
         	}
         }
         if (!empty($upkeepDesde)){
         	$sql.="  AND DBR.GROOMING_RANK >=" . $upkeepDesde  . " \n";
         }
         if (!empty($upkeepHasta)){
         	$sql.="  AND DBR.GROOMING_RANK <=" . $upkeepHasta  . " \n";
         }                          
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      
      public function selNombres($nombreOParte){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  DBR.DOG_BREED_ID,     \n";
      	$sql.="  DBR.DOG_BREED_NAME     \n";
      	$sql.="FROM  \n";
      	$sql.="  DOG_BREEDS DBR \n";
      	$sql.="WHERE  \n";
      	$sql.="  DBR.HABILITADA=1 \n";
      	if (!empty($nombreOParte)){
      		$sql.="  AND DBR.DOG_BREED_NAME LIKE '%" . $nombreOParte . "%' \n";
      	}
      	$sql.="ORDER BY  \n";
      	$sql.="  DBR.DOG_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre);
      	$filas=array();
      	while ($stm->fetch()) {      	
            $fila=array();
            $fila['id']=$id;
            $fila['value']=$nombre;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }
      
      public function selNombresPorShelter($shelterId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  DBR.DOG_BREED_ID,     \n";
      	$sql.="  DBR.DOG_BREED_NAME     \n";
      	$sql.="FROM  \n";
      	$sql.="  DOG_BREEDS DBR \n";
      	$sql.="  INNER JOIN DOG_BREEDS_BY_SHELTER DBS ON DBR.DOG_BREED_ID=DBS.DOG_BREED_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  DBR.HABILITADA=1 \n";
        $sql.="  AND DBS.SHELTER_ID = '" . $shelterId . "' \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  DBR.DOG_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre);
      	$filas=array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$nombre;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }  

      public function selSheltersPorRaza($dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHU.ID,     \n";
      	$sql.="  SHU.NAME,     \n";
      	$sql.="  SHU.URL_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_USA SHU \n";
      	$sql.="  INNER JOIN DOG_BREEDS_BY_SHELTER DBS ON SHU.ID=DBS.SHELTER_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  DBS.DOG_BREED_ID = '" . $dogBreedId . "' \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  SHU.NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre, $urlEncoded);
      	$filas=array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$nombre;
      		$fila['urlEncoded']=$urlEncoded;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }      
      

   } 
?>