<?php 

require_once $GLOBALS['pathCms'] .  '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/CatBreedsOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/CatBreed.php';  
// require_once('FirePHPCore/fb.php4');

   class CatBreedsOadImpl extends AOD implements CatBreedsOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  CBR.CAT_BREED_ID,     \n"; 
         $sql.="  CBR.CAT_BREED_NAME,     \n"; 
         $sql.="  CBR.NAME_ENCODED,     \n";
         $sql.="  CBR.CAT_PURPOSE_ID,     \n"; 
         $sql.="  DPU.DOG_PURPOSE_NAME,     \n"; 
         $sql.="  CBR.COAT_LENGTH_ID,     \n"; 
         $sql.="  DSA.COAT_LENGTH_NAME,     \n"; 
         $sql.="  CBR.SIZE_ID,     \n"; 
         $sql.="  DSF.SIZE_NAME,     \n"; 
         $sql.="  CBR.MAIN_FEATURES,     \n"; 
         $sql.="  CBR.HEADER_TEXT,     \n"; 
         $sql.="  CBR.COLORS,     \n"; 
         $sql.="  CBR.LIFE_MIN,     \n"; 
         $sql.="  CBR.LIFE_MAX,     \n"; 
         $sql.="  CBR.WEIGHT_MIN,     \n"; 
         $sql.="  CBR.WEIGHT_MAX,     \n"; 
         $sql.="  CBR.SERVING_MIN,     \n";
         $sql.="  CBR.SERVING_MAX,     \n";
         $sql.="  CBR.FRIENDLY_RANK,     \n"; 
         $sql.="  CBR.FRIENDLY_TEXT,     \n"; 
         $sql.="  CBR.ACTIVE_RANK,     \n"; 
         $sql.="  CBR.ACTIVE_TEXT,     \n"; 
         $sql.="  CBR.HEALTHY_RANK,     \n"; 
         $sql.="  CBR.HEALTHY_TEXT,     \n"; 
         $sql.="  CBR.TRAINING_RANK,     \n"; 
         $sql.="  CBR.TRAINING_TEXT,     \n"; 
         $sql.="  CBR.GUARDIAN_RANK,     \n";
         $sql.="  CBR.GUARDIAN_TEXT,     \n";
         $sql.="  CBR.GROOMING_RANK,     \n";
         $sql.="  CBR.GROOMING_TEXT,     \n";
         $sql.="  CBR.PICTURE_URL,     \n"; 
         $sql.="  CBR.VIDEO_URL,     \n";
         $sql.="  CBR.APPARTMENTS,     \n";
         $sql.="  CBR.KIDS,     \n";
         $sql.="  CBR.HABILITADA    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CAT_BREEDS CBR \n";
         $sql.="  LEFT JOIN DOG_PURPOSES DPU ON CBR.CAT_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSI ON CBR.SIZE_ID=DSI.SIZE_ID \n";
         $sql.="  LEFT JOIN CAT_COAT_LENGTHS DSA ON CBR.COAT_LENGTH_ID=DSA.COAT_LENGTH_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSF ON CBR.SIZE_ID=DSF.SIZE_ID \n";
         $sql.="WHERE  \n"; 
         $sql.="  CBR.CAT_BREED_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new CatBreed();  
         $stm->bind_result($id, $nombre, $nameEncoded, $purposeId, $purposeName, $coatLengthId, $coatLengthName, $sizeId, $sizeName, 
         		  $mainFeatures, $headerText, $colors, $lifeMin, $lifeMax, $weightMin, $weightMax, 
         		  $servingMin, $servingMax,
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $appartments, $kids, $habilitada); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNombre($nombre);
            $bean->setNameEncoded($nameEncoded);
            $bean->setPurposeId($purposeId);
            $bean->setPurposeName($purposeName);
            $bean->setCoatLengthId($coatLengthId);
            $bean->setCoatLengthName($coatLengthName);
            $bean->setSizeId($sizeId);
            $bean->setSizeName($sizeName);
            $bean->setMainFeatures($mainFeatures);
            $bean->setHeaderText($headerText);
            $bean->setColors($colors);
            $bean->setLifeMin($lifeMin);
            $bean->setLifeMax($lifeMax);
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
      
      public function obtienePorNombreEncoded($nombreEncoded){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  CBR.CAT_BREED_ID,     \n";
      	$sql.="  CBR.CAT_BREED_NAME,     \n";
      	$sql.="  CBR.NAME_ENCODED,     \n";
      	$sql.="  CBR.CAT_PURPOSE_ID,     \n";
      	$sql.="  DPU.DOG_PURPOSE_NAME,     \n";
      	$sql.="  CBR.COAT_LENGTH_ID,     \n";
      	$sql.="  DSA.COAT_LENGTH_NAME,     \n";
      	$sql.="  CBR.SIZE_ID,     \n";
      	$sql.="  DSF.SIZE_NAME,     \n";
      	$sql.="  CBR.MAIN_FEATURES,     \n";
      	$sql.="  CBR.HEADER_TEXT,     \n";
      	$sql.="  CBR.COLORS,     \n";
      	$sql.="  CBR.LIFE_MIN,     \n";
      	$sql.="  CBR.LIFE_MAX,     \n";
      	$sql.="  CBR.WEIGHT_MIN,     \n";
      	$sql.="  CBR.WEIGHT_MAX,     \n";
      	$sql.="  CBR.SERVING_MIN,     \n";
      	$sql.="  CBR.SERVING_MAX,     \n";
      	$sql.="  CBR.FRIENDLY_RANK,     \n";
      	$sql.="  CBR.FRIENDLY_TEXT,     \n";
      	$sql.="  CBR.ACTIVE_RANK,     \n";
      	$sql.="  CBR.ACTIVE_TEXT,     \n";
      	$sql.="  CBR.HEALTHY_RANK,     \n";
      	$sql.="  CBR.HEALTHY_TEXT,     \n";
      	$sql.="  CBR.TRAINING_RANK,     \n";
      	$sql.="  CBR.TRAINING_TEXT,     \n";
      	$sql.="  CBR.GUARDIAN_RANK,     \n";
      	$sql.="  CBR.GUARDIAN_TEXT,     \n";
      	$sql.="  CBR.GROOMING_RANK,     \n";
      	$sql.="  CBR.GROOMING_TEXT,     \n";
      	$sql.="  CBR.PICTURE_URL,     \n";
      	$sql.="  CBR.VIDEO_URL,     \n";
      	$sql.="  CBR.APPARTMENTS,     \n";
      	$sql.="  CBR.KIDS,     \n";
      	$sql.="  CBR.HABILITADA    \n";
      	$sql.="FROM  \n";
      	$sql.="  CAT_BREEDS CBR \n";
      	$sql.="  LEFT JOIN DOG_PURPOSES DPU ON CBR.CAT_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
      	$sql.="  LEFT JOIN CAT_SIZES DSI ON CBR.SIZE_ID=DSI.SIZE_ID \n";
      	$sql.="  LEFT JOIN CAT_COAT_LENGTHS DSA ON CBR.COAT_LENGTH_ID=DSA.COAT_LENGTH_ID \n";
      	$sql.="  LEFT JOIN CAT_SIZES DSF ON CBR.SIZE_ID=DSF.SIZE_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  CBR.CAT_BREED_NAME='" . $nombre . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new CatBreed();
      	$stm->bind_result($id, $nombre, $nameEncoded, $purposeId, $purposeName, $coatLengthId, $coatLengthName, $sizeId, $sizeName, 
      			$mainFeatures, $headerText, $colors, $lifeMin, $lifeMax, $weightMin, $weightMax,
      			$servingMin, $servingMax,
      			$friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText,
      			$pictureUrl, $videoUrl, $appartments, $kids, $habilitada);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNombre($nombre);
      		$bean->setNameEncoded($nameEncoded);
      		$bean->setPurposeId($purposeId);
      		$bean->setPurposeName($purposeName);
      		$bean->setCoatLengthId($coatLengthId);
      		$bean->setCoatLengthName($coatLengthName);
      		$bean->setSizeId($sizeId);
      		$bean->setSizeName($sizeName);
      		$bean->setMainFeatures($mainFeatures);
      		$bean->setHeadertext($headerText);
      		$bean->setColors($colors);
      		$bean->setLifeMin($lifeMin);
      		$bean->setLifeMax($lifeMax);
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
         $sql="INSERT INTO CAT_BREEDS (   \n"; 
         $sql.="  CAT_BREED_ID,     \n"; 
         $sql.="  CAT_BREED_NAME,     \n"; 
         $sql.="  NAME_ENCODED,     \n";
         $sql.="  CAT_PURPOSE_ID,     \n"; 
         $sql.="  COAT_LENGTH_ID,     \n"; 
         $sql.="  SIZE_ID,     \n"; 
         $sql.="  MAIN_FEATURES,     \n"; 
         $sql.="  HEADER_TEXT,     \n"; 
         $sql.="  COLORS,     \n"; 
         $sql.="  LIFE_MIN,     \n"; 
         $sql.="  LIFE_MAX,     \n"; 
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
         $stm->bind_param("sssssssssddddddisisisisisisssii",$bean->getId(), $bean->getNombre(), $bean->getNameEncoded(), $bean->getPurposeId(), $bean->getCoatLengthId(), $bean->getSizeId(), 
         		  $bean->getMainFeatures(),   $bean->getHeaderText(), $bean->getColors(), $bean->getLifeMin(), $bean->getLifeMax(), $bean->getWeightMin(), $bean->getWeightMax(), 
         		  $bean->getServingMin(), $bean->getServingMax(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl(), $bean->getAppartments(), $bean->getKids()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 
      

      


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM CAT_BREEDS   \n"; 
         $sql.="WHERE CAT_BREED_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 
      
      public function inhabilita($id){
      	$conexion=$this->conectarse();
      	$sql="UPDATE CAT_BREEDS   \n";
      	$sql.="SET HABILITADA=0  \n";
      	$sql.="WHERE CAT_BREED_ID=?   \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("s", $id);
      	return $this->ejecutaYCierra($conexion, $stm);
      }


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE CAT_BREEDS SET   \n"; 
         $sql.="  CAT_BREED_NAME=?,     \n"; 
         $sql.="  NAME_ENCODED=?,     \n";
         $sql.="  CAT_PURPOSE_ID=?,     \n"; 
         $sql.="  COAT_LENGTH_ID=?,     \n"; 
         $sql.="  SIZE_ID=?,     \n"; 
         $sql.="  MAIN_FEATURES=?,     \n"; 
         $sql.="  HEADER_TEXT=?,     \n"; 
         $sql.="  COLORS=?,     \n"; 
         $sql.="  LIFE_MIN=?,     \n"; 
         $sql.="  LIFE_MAX=?,     \n"; 
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
         $sql.="WHERE CAT_BREED_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssssssssddddddisisisisisisssiiis", $bean->getNombre(), $bean->getNameEncoded(), $bean->getPurposeId(), $bean->getCoatLengthId(), $bean->getSizeId(), 
         		  $bean->getMainFeatures(), $bean->getHeaderText(),   $bean->getColors(), $bean->getLifeMin(), $bean->getLifeMax(), $bean->getWeightMin(), $bean->getWeightMax(), 
         		  $bean->getServingMin(), $bean->getServingMax(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl(), $bean->getAppartments(), $bean->getKids(), $bean->getHabilitada(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  CBR.CAT_BREED_ID,     \n"; 
         $sql.="  CBR.CAT_BREED_NAME,     \n"; 
         $sql.="  CBR.NAME_ENCODED,     \n";
         $sql.="  CBR.CAT_PURPOSE_ID,     \n"; 
         $sql.="  DPU.DOG_PURPOSE_NAME,     \n"; 
         $sql.="  CBR.COAT_LENGTH_ID,     \n"; 
         $sql.="  DSA.COAT_LENGTH_NAME,     \n"; 
         $sql.="  CBR.SIZE_ID,     \n"; 
         $sql.="  DSF.SIZE_NAME,     \n"; 
         $sql.="  CBR.MAIN_FEATURES,     \n"; 
         $sql.="  CBR.HEADER_TEXT,     \n"; 
         $sql.="  CBR.COLORS,     \n"; 
         $sql.="  CBR.LIFE_MIN,     \n"; 
         $sql.="  CBR.LIFE_MAX,     \n"; 
         $sql.="  CBR.WEIGHT_MIN,     \n"; 
         $sql.="  CBR.WEIGHT_MAX,     \n"; 
         $sql.="  CBR.SERVING_MIN,     \n";
         $sql.="  CBR.SERVING_MAX,     \n";
         $sql.="  CBR.FRIENDLY_RANK,     \n"; 
         $sql.="  CBR.FRIENDLY_TEXT,     \n"; 
         $sql.="  CBR.ACTIVE_RANK,     \n"; 
         $sql.="  CBR.ACTIVE_TEXT,     \n"; 
         $sql.="  CBR.HEALTHY_RANK,     \n"; 
         $sql.="  CBR.HEALTHY_TEXT,     \n"; 
         $sql.="  CBR.TRAINING_RANK,     \n"; 
         $sql.="  CBR.TRAINING_TEXT,     \n";
         $sql.="  CBR.GUARDIAN_RANK,     \n";
         $sql.="  CBR.GUARDIAN_TEXT,     \n";
         $sql.="  CBR.GROOMING_RANK,     \n";
         $sql.="  CBR.GROOMING_TEXT,     \n";
         $sql.="  CBR.PICTURE_URL,     \n"; 
         $sql.="  CBR.VIDEO_URL,     \n";
         $sql.="  CBR.APPARTMENTS,     \n";
         $sql.="  CBR.KIDS,     \n";
         $sql.="  CBR.HABILITADA    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CAT_BREEDS CBR \n";
         $sql.="  LEFT JOIN DOG_PURPOSES DPU ON CBR.CAT_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSI ON CBR.SIZE_ID=DSI.SIZE_ID \n";
         $sql.="  LEFT JOIN CAT_COAT_LENGTHS DSA ON CBR.COAT_LENGTH_ID=DSA.COAT_LENGTH_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSF ON CBR.SIZE_ID=DSF.SIZE_ID \n";
         $sql.="WHERE  \n";
         $sql.="  CBR.HABILITADA=1 \n";
         if (!empty($nombreOParte)){
           $sql.="  AND CBR.CAT_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         }
         if (!empty($inicial)){
         	$sql.="  AND UCASE(LEFT(CBR.CAT_BREED_NAME, 1))='" .$inicial . "' \n";
         }
         if (!empty($tamañoDesde)){
         	$sql.="  AND DSI.ORDEN >=" . $tamañoDesde  . " \n";
         }
         if (!empty($tamañoHasta)){
         	$sql.="  AND DSI.ORDEN <=" . $tamañoHasta  . " \n";
         }
         if (!empty($alimentacion)){
         	if ($alimentacion=="less"){
         	  $sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 < 1  \n";
         	}else if ($alimentacion=="2cups"){
         	  $sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 = 1  \n";
         	}else if ($alimentacion=="more"){
         	  $sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 > 1  \n";
         	}
         }
         if (!empty($appartments)){
         	if ($appartments=="Yes"){
         		$sql.="  AND CBR.APPARTMENTS = 1  \n";
         	}else if ($appartments=="No"){
         		$sql.="  AND CBR.APPARTMENTS = 0  \n";
         	}
         }         
         if (!empty($kids)){
         	if ($kids=="Yes"){
         		$sql.="  AND CBR.KIDS = 1  \n";
         	}else if ($kids=="No"){
         		$sql.="  AND CBR.KIDS = 0  \n";
         	}
         }
         if (!empty($upkeepDesde)){
         	$sql.="  AND CBR.GROOMING_RANK >=" . $upkeepDesde  . " \n";
         }
         if (!empty($upkeepHasta)){
         	$sql.="  AND CBR.GROOMING_RANK <=" . $upkeepHasta  . " \n";
         }                  
         $sql.="ORDER BY  \n"; 
         $sql.="  CBR.CAT_BREED_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $nombre, $nameEncoded, $purposeId, $purposeName, $coatLengthId, $coatLengthName, $sizeId, $sizeName,
         		  $mainFeatures, $headerText, $colors, $lifeMin, $lifeMax, $weightMin, $weightMax,
         		  $servingMin, $servingMax, 
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $appartments, $kids, $habilitada); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new CatBreed();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $bean->setNameEncoded($nameEncoded);
            $bean->setPurposeId($purposeId);
            $bean->setPurposeName($purposeName);
            $bean->setCoatLengthId($coatLengthId);
            $bean->setCoatLengthName($coatLengthName);
            $bean->setSizeId($sizeId);
            $bean->setSizeName($sizeName);
            $bean->setMainFeatures($mainFeatures);
            $bean->setHeaderText($headerText);
            $bean->setColors($colors);
            $bean->setLifeMin($lifeMin);
            $bean->setLifeMax($lifeMax);
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
         $sql.="  CAT_BREEDS CBR \n";
         $sql.="  LEFT JOIN DOG_PURPOSES DPU ON CBR.CAT_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSI ON CBR.SIZE_ID=DSI.SIZE_ID \n";
         $sql.="  LEFT JOIN CAT_COAT_LENGTHS DSA ON CBR.COAT_LENGTH_ID=DSA.COAT_LENGTH_ID \n";
         $sql.="  LEFT JOIN CAT_SIZES DSF ON CBR.SIZE_ID=DSF.SIZE_ID \n";
         $sql.="WHERE  \n";
         $sql.="  CBR.HABILITADA=1 \n";
         if (!empty($nombreOParte)){
         	$sql.="  AND CBR.CAT_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         }
         if (!empty($inicial)){
         	$sql.="  AND UCASE(LEFT(CBR.CAT_BREED_NAME, 1))='" .$inicial . "' \n";
         }
         if (!empty($tamañoDesde)){
         	$sql.="  AND DSI.ORDEN >=" . $tamañoDesde  . " \n";
         }
         if (!empty($tamañoHasta)){
         	$sql.="  AND DSI.ORDEN <=" . $tamañoHasta  . " \n";
         }
         if (!empty($alimentacion)){
         	if ($alimentacion=="less"){
         		$sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 < 1  \n";
         	}else if ($alimentacion=="2cups"){
         		$sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 = 1  \n";
         	}else if ($alimentacion=="more"){
         		$sql.="  AND (CBR.SERVING_MIN + CBR.SERVING_MAX)/2 > 1  \n";
         	}
         } 
         if (!empty($appartments)){
         	if ($appartments=="Yes"){
         		$sql.="  AND CBR.APPARTMENTS = 1  \n";
         	}else if ($appartments=="No"){
         		$sql.="  AND CBR.APPARTMENTS = 0  \n";
         	}
         }
         if (!empty($kids)){
         	if ($kids=="Yes"){
         		$sql.="  AND CBR.KIDS = 1  \n";
         	}else if ($kids=="No"){
         		$sql.="  AND CBR.KIDS = 0  \n";
         	}
         }
         if (!empty($upkeepDesde)){
         	$sql.="  AND CBR.GROOMING_RANK >=" . $upkeepDesde  . " \n";
         }
         if (!empty($upkeepHasta)){
         	$sql.="  AND CBR.GROOMING_RANK <=" . $upkeepHasta  . " \n";
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
      	$sql.="  CBR.CAT_BREED_ID,     \n";
      	$sql.="  CBR.CAT_BREED_NAME,     \n";
      	$sql.="  CBR.NAME_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  CAT_BREEDS CBR \n";
      	$sql.="WHERE  \n";
      	$sql.="  CBR.HABILITADA=1 \n";
      	if (!empty($nombreOParte)){
      		$sql.="  AND CBR.CAT_BREED_NAME LIKE '%" . $nombreOParte . "%' \n";
      	}
      	$sql.="ORDER BY  \n";
      	$sql.="  CBR.CAT_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre, $nameEncoded);
      	$filas=array();
      	while ($stm->fetch()) {      	
            $fila=array();
            $fila['id']=$id;
            $fila['value']=$nombre;
            $fila['nameEncoded']=$nameEncoded;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }
      
      public function selNombresPorShelter($shelterId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  CBR.CAT_BREED_ID,     \n";
      	$sql.="  CBR.CAT_BREED_NAME,     \n";
      	$sql.="  CBR.NAME_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  CAT_BREEDS CBR \n";
      	$sql.="  LEFT JOIN CAT_BREEDS_BY_SHELTER DBS ON CBR.CAT_BREED_ID=DBS.CAT_BREED_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  CBR.HABILITADA=1 \n";
        $sql.="  AND DBS.SHELTER_ID = '" . $shelterId . "' \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  CBR.CAT_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre, $nameEncoded);
      	$filas=array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$nombre;
      		$fila['nameEncoded']=$nameEncoded;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }  
      
      public function selNombresPorBreeder($breederId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  CBR.CAT_BREED_ID,     \n";
      	$sql.="  CBR.CAT_BREED_NAME,     \n";
      	$sql.="  CBR.NAME_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  CAT_BREEDS CBR \n";
      	$sql.="  LEFT JOIN CAT_BREEDS_BY_BREEDER DBS ON CBR.CAT_BREED_ID=DBS.CAT_BREED_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  CBR.HABILITADA=1 \n";
        $sql.="  AND DBS.BREEDER_ID = '" . $breederId . "' \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  CBR.CAT_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre, $nameEncoded);
      	$filas=array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$nombre;
      		$fila['nameEncoded']=$nameEncoded;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }  

      public function selNombresPorForum($forumId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  CBR.CAT_BREED_ID,     \n";
      	$sql.="  CBR.CAT_BREED_NAME,     \n";
      	$sql.="  CBR.NAME_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  CAT_BREEDS CBR \n";
      	$sql.="  LEFT JOIN CAT_BREEDS_BY_FORUM DBS ON CBR.CAT_BREED_ID=DBS.CAT_BREED_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  CBR.HABILITADA=1 \n";
        $sql.="  AND DBS.FORUM_ID = '" . $forumId . "' \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  CBR.CAT_BREED_NAME  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($id, $nombre, $nameEncoded);
      	$filas=array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$nombre;
      		$fila['nameEncoded']=$nameEncoded;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }       

      public function selSheltersPorRaza($catBreedId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHU.ID,     \n";
      	$sql.="  SHU.NAME,     \n";
      	$sql.="  SHU.URL_ENCODED     \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_USA SHU \n";
      	$sql.="  LEFT JOIN CAT_BREEDS_BY_SHELTER DBS ON SHU.ID=DBS.SHELTER_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  DBS.CAT_BREED_ID = '" . $catBreedId . "' \n";
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