<?php 

require_once '../../config.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/oad/AOD.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/oad/DogBreedsOad.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/beans/DogBreed.php';  
require_once('FirePHPCore/fb.php4');

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
         $sql.="  DBR.COLORS,     \n"; 
         $sql.="  DBR.SIZE_MIN,     \n"; 
         $sql.="  DBR.SIZE_MAX,     \n"; 
         $sql.="  DBR.WEIGHT_MIN,     \n"; 
         $sql.="  DBR.WEIGHT_MAX,     \n"; 
         $sql.="  DBR.FOOD_AMOUNT,     \n"; 
         $sql.="  DBR.FRIENDLY_RANK,     \n"; 
         $sql.="  DBR.FRIENDLY_TEXT,     \n"; 
         $sql.="  DBR.ACTIVE_RANK,     \n"; 
         $sql.="  DBR.ACTIVE_TEXT,     \n"; 
         $sql.="  DBR.HEALTHY_RANK,     \n"; 
         $sql.="  DBR.HEALTHY_TEXT,     \n"; 
         $sql.="  DBR.TRANING_RANK,     \n"; 
         $sql.="  DBR.TRANING_TEXT,     \n"; 
         $sql.="  DBR.GUARDIAN_RANK,     \n";
         $sql.="  DBR.GUARDIAN_TEXT,     \n";
         $sql.="  DBR.GROOMING_RANK,     \n";
         $sql.="  DBR.GROOMING_TEXT,     \n";
         $sql.="  DBR.PICTURE_URL,     \n"; 
         $sql.="  DBR.VIDEO_URL,     \n"; 
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
         $id=null;  
         $nombre=null;  
         $sizeId=null;  
         $sizeName=null;  
         $purposeId=null;  
         $purposeName=null;  
         $sheddingAmountId=null;  
         $sheddingAmountName=null;  
         $sheddingFrequencyId=null;  
         $sheddingFrequencyName=null;  
         $mainFeatures=null;  
         $colors=null;  
         $sizeMin=null;  
         $sizeMax=null;  
         $weightMin=null;  
         $weightMax=null;  
         $foodAmount=null;  
         $friendlyRank=null;  
         $friendlyText=null;  
         $activeRank=null;  
         $activeText=null;  
         $healthyRank=null;  
         $healthyText=null;  
         $trainingRank=null;  
         $trainingText=null; 
         $guardianRank=null;
         $guardianText=null;
         $groomingRank=null;
         $groomingText=null;
         $pictureUrl=null;  
         $videoUrl=null;  
         $habilitada=null;  
         $stm->bind_result($id, $nombre, $sizeId, $sizeName, $purposeId, $purposeName, $sheddingAmountId, $sheddingAmountName, $sheddingFrequencyId, $sheddingFrequencyName, $mainFeatures, $colors, $sizeMin, $sizeMax, $weightMin, $weightMax, $foodAmount, 
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $habilitada); 
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
            $bean->setColors($colors);
            $bean->setSizeMin($sizeMin);
            $bean->setSizeMax($sizeMax);
            $bean->setWeightMin($weightMin);
            $bean->setWeightMax($weightMax);
            $bean->setFoodAmount($foodAmount);
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
         $sql.="  COLORS,     \n"; 
         $sql.="  SIZE_MIN,     \n"; 
         $sql.="  SIZE_MAX,     \n"; 
         $sql.="  WEIGHT_MIN,     \n"; 
         $sql.="  WEIGHT_MAX,     \n"; 
         $sql.="  FOOD_AMOUNT,     \n"; 
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
         $sql.="  HABILITADA)    \n"; 
         $sql.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssssddddsisisisisisisss",$bean->getId(), $bean->getNombre(), $bean->getSizeId(), $bean->getPurposeId(), $bean->getSheddingAmountId(), $bean->getSheddingFrequencyId(), $bean->getMainFeatures(), $bean->getColors(), $bean->getSizeMin(), $bean->getSizeMax(), $bean->getWeightMin(), $bean->getWeightMax(), $bean->getFoodAmount(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl()); 
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


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE DOG_BREEDS SET   \n"; 
         $sql.="  DOG_BREED_NAME=?,     \n"; 
         $sql.="  DOG_SIZE_ID=?,     \n"; 
         $sql.="  DOG_PURPOSE_ID=?,     \n"; 
         $sql.="  DOG_SHEDDING_AMOUNT_ID=?,     \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCY_ID=?,     \n"; 
         $sql.="  MAIN_FEATURES=?,     \n"; 
         $sql.="  COLORS=?,     \n"; 
         $sql.="  SIZE_MIN=?,     \n"; 
         $sql.="  SIZE_MAX=?,     \n"; 
         $sql.="  WEIGHT_MIN=?,     \n"; 
         $sql.="  WEIGHT_MAX=?,     \n"; 
         $sql.="  FOOD_AMOUNT=?,     \n"; 
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
         $sql.="  HABILITADA=?     \n"; 
         $sql.="WHERE DOG_BREED_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssddddsisisisisisisssis", $bean->getNombre(), $bean->getSizeId(), $bean->getPurposeId(), $bean->getSheddingAmountId(), $bean->getSheddingFrequencyId(), $bean->getMainFeatures(), $bean->getColors(), $bean->getSizeMin(), $bean->getSizeMax(), $bean->getWeightMin(), $bean->getWeightMax(), $bean->getFoodAmount(), 
         		  $bean->getFriendlyRank(), $bean->getFriendlyText(), $bean->getActiveRank(), $bean->getActiveText(), $bean->getHealthyRank(), $bean->getHealthyText(), $bean->getTrainingRank(), $bean->getTrainingText(), $bean->getGuardianRank(), $bean->getGuardianText(), $bean->getGroomingRank(), $bean->getGroomingText(), 
         		  $bean->getPictureUrl(), $bean->getVideoUrl(), $bean->getHabilitada(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 
      
      public function inhabilita($id){
      	$conexion=$this->conectarse();
      	$sql="UPDATE DOG_BREEDS SET   \n";
      	$sql.="  HABILITADA=0     \n";
      	$sql.="WHERE DOG_BREED_ID='" . $id . "'   \n";
      	$stm=$this->preparar($conexion, $sql);
      	return $this->ejecutaYCierra($conexion, $stm);
      }      


      public function selecciona($nombreOParte, $desde, $cuantos){ 
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
         $sql.="  DBR.COLORS,     \n"; 
         $sql.="  DBR.SIZE_MIN,     \n"; 
         $sql.="  DBR.SIZE_MAX,     \n"; 
         $sql.="  DBR.WEIGHT_MIN,     \n"; 
         $sql.="  DBR.WEIGHT_MAX,     \n"; 
         $sql.="  DBR.FOOD_AMOUNT,     \n"; 
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
         $sql.="  DBR.HABILITADA    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  DOG_BREEDS DBR \n";
         $sql.="  INNER JOIN DOG_PURPOSES DPU ON DBR.DOG_PURPOSE_ID=DPU.DOG_PURPOSE_ID \n";
         $sql.="  INNER JOIN DOG_SIZES DSI ON DBR.DOG_SIZE_ID=DSI.DOG_SIZE_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_AMOUNTS DSA ON DBR.DOG_SHEDDING_AMOUNT_ID=DSA.DOG_SHEDDING_AMOUNT_ID \n";
         $sql.="  INNER JOIN DOG_SHEDDING_FREQUENCIES DSF ON DBR.DOG_SHEDDING_FREQUENCY_ID=DSF.DOG_SHEDDING_FREQUENCY_ID \n";
         $sql.="WHERE  \n";
         $sql.="  DBR.HABILITADA=1 \n";
         $sql.="  AND DBR.DOG_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         $sql.="ORDER BY  \n"; 
         $sql.="  DBR.DOG_BREED_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
         fb($sql);
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $nombre=null;  
         $sizeId=null;  
         $sizeName=null;  
         $purposeId=null;  
         $purposeName=null;  
         $sheddingAmountId=null;  
         $sheddingAmountName=null;  
         $sheddingFrequencyId=null;  
         $sheddingFrequencyName=null;  
         $mainFeatures=null;  
         $colors=null;  
         $sizeMin=null;  
         $sizeMax=null;  
         $weightMin=null;  
         $weightMax=null;  
         $foodAmount=null;  
         $friendlyRank=null;  
         $friendlyText=null;  
         $activeRank=null;  
         $activeText=null;  
         $healthyRank=null;  
         $healthyText=null;  
         $trainingRank=null;  
         $trainingText=null; 
         $guardianRank=null;
         $guardianText=null;
         $groomingRank=null;
         $groomingText=null;
         $pictureUrl=null;  
         $videoUrl=null;  
         $habilitada=null;  
         $stm->bind_result($id, $nombre, $sizeId, $sizeName, $purposeId, $purposeName, $sheddingAmountId, $sheddingAmountName, $sheddingFrequencyId, $sheddingFrequencyName, $mainFeatures, $colors, $sizeMin, $sizeMax, $weightMin, $weightMax, $foodAmount, 
         		  $friendlyRank, $friendlyText, $activeRank, $activeText, $healthyRank, $healthyText, $trainingRank, $trainingText, $guardianRank, $guardianText, $groomingRank, $groomingText, 
         		  $pictureUrl, $videoUrl, $habilitada); 
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
            $bean->setColors($colors);
            $bean->setSizeMin($sizeMin);
            $bean->setSizeMax($sizeMax);
            $bean->setWeightMin($weightMin);
            $bean->setWeightMax($weightMax);
            $bean->setFoodAmount($foodAmount);
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
            $bean->setHabilitada($habilitada);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function seleccionaCuenta($nombreOParte){ 
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
         $sql.="  AND DBR.DOG_BREED_NAME LIKE '%" .$nombreOParte . "%' \n";
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 

   } 
?>