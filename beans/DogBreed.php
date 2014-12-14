<?php 

   class DogBreed { 
      private $dogBreedId; 
      private $dogBreedName;
      private $nameEncoded;
      private $dogSizeId; 
      private $dogSizeName; 
      private $dogPurposeId; 
      private $dogPurposeName; 
      private $dogSheddingAmountId; 
      private $dogSheddingAmountName; 
      private $dogSheddingFrequencyId; 
      private $dogSheddingFrequencyName; 
      private $mainFeatures; 
      private $headerText; 
      private $colors; 
      private $sizeMin; 
      private $sizeMax; 
      private $weightMin; 
      private $weightMax; 
      private $servingMin;
      private $servingMax;
      private $friendlyRank; 
      private $friendlyText; 
      private $activeRank; 
      private $activeText; 
      private $healthyRank; 
      private $healthyText; 
      private $trainingRank; 
      private $trainingText; 
      private $guardianRank; 
      private $guardianText; 
      private $groomingRank; 
      private $groomingText; 
      private $pictureUrl; 
      private $videoUrl; 
      private $appartments;
      private $kids;
      private $metaDescripcion;
      private $metaKeywords;
      private $habilitada; 

      public function getId(){ 
         return $this->dogBreedId;  
      }

      public function getNombre(){ 
         return $this->dogBreedName;  
      }
      
      public function getNameEncoded(){ 
         return $this->nameEncoded;  
      }      

      public function getSizeId(){ 
         return $this->dogSizeId;  
      }

      public function getSizeName(){ 
         return $this->dogSizeName;  
      }

      public function getPurposeId(){ 
         return $this->dogPurposeId;  
      }

      public function getPurposeName(){ 
         return $this->dogPurposeName;  
      }

      public function getSheddingAmountId(){ 
         return $this->dogSheddingAmountId;  
      }

      public function getSheddingAmountName(){ 
         return $this->dogSheddingAmountName;  
      }

      public function getSheddingFrequencyId(){ 
         return $this->dogSheddingFrequencyId;  
      }

      public function getSheddingFrequencyName(){ 
         return $this->dogSheddingFrequencyName;  
      }

      public function getMainFeatures(){ 
         return $this->mainFeatures;  
      }
      
      public function getHeaderText(){ 
         return $this->headerText;  
      }
      

      public function getColors(){ 
         return $this->colors;  
      }

      public function getSizeMin(){ 
         return $this->sizeMin;  
      }

      public function getSizeMax(){ 
         return $this->sizeMax;  
      }

      public function getWeightMin(){ 
         return $this->weightMin;  
      }

      public function getWeightMax(){ 
         return $this->weightMax;  
      }

      public function getServingMin(){
      	return $this->servingMin;
      }
      
      public function getServingMax(){
      	return $this->servingMax;
      }
      
      

      public function getFriendlyRank(){ 
         return $this->friendlyRank;  
      }

      public function getFriendlyText(){ 
         return $this->friendlyText;  
      }

      public function getActiveRank(){ 
         return $this->activeRank;  
      }

      public function getActiveText(){ 
         return $this->activeText;  
      }

      public function getHealthyRank(){ 
         return $this->healthyRank;  
      }

      public function getHealthyText(){ 
         return $this->healthyText;  
      }

      public function getTrainingRank(){ 
         return $this->trainingRank;  
      }

      public function getTrainingText(){ 
         return $this->trainingText;  
      }

      public function getGuardianRank(){ 
         return $this->guardianRank;  
      }

      public function getGuardianText(){ 
         return $this->guardianText;  
      }

      public function getGroomingRank(){ 
         return $this->groomingRank;  
      }

      public function getGroomingText(){ 
         return $this->groomingText;  
      }

      public function getPictureUrl(){ 
         return $this->pictureUrl;  
      }

      public function getVideoUrl(){ 
         return $this->videoUrl;  
      }
      
      public function getAppartments(){
      	return $this->appartments;
      }
      
      public function getKids(){
      	return $this->kids;
      }
      
      public function getMetaDescripcion(){
      	return $this->metaDescripcion;
      }
      
      public function getMetaKeywords(){
      	return $this->metaKeywords;
      }
      
      public function getHabilitada(){ 
         return $this->habilitada;  
      }

      public function setId($valor){ 
         $this->dogBreedId=$valor; 
      }

      public function setNombre($valor){ 
         $this->dogBreedName=$valor; 
      }
      
      public function setNameEncoded($valor){ 
         $this->nameEncoded=$valor; 
      }
      

      public function setSizeId($valor){ 
         $this->dogSizeId=$valor; 
      }

      public function setSizeName($valor){ 
         $this->dogSizeName=$valor; 
      }

      public function setPurposeId($valor){ 
         $this->dogPurposeId=$valor; 
      }

      public function setPurposeName($valor){ 
         $this->dogPurposeName=$valor; 
      }

      public function setSheddingAmountId($valor){ 
         $this->dogSheddingAmountId=$valor; 
      }

      public function setSheddingAmountName($valor){ 
         $this->dogSheddingAmountName=$valor; 
      }

      public function setSheddingFrequencyId($valor){ 
         $this->dogSheddingFrequencyId=$valor; 
      }

      public function setSheddingFrequencyName($valor){ 
         $this->dogSheddingFrequencyName=$valor; 
      }

      public function setMainFeatures($valor){ 
         $this->mainFeatures=$valor; 
      }
      
      public function setHeaderText($valor){ 
         $this->headerText=$valor;  
      }
      

      public function setColors($valor){ 
         $this->colors=$valor; 
      }

      public function setSizeMin($valor){ 
         $this->sizeMin=$valor; 
      }

      public function setSizeMax($valor){ 
         $this->sizeMax=$valor; 
      }

      public function setWeightMin($valor){ 
         $this->weightMin=$valor; 
      }

      public function setWeightMax($valor){ 
         $this->weightMax=$valor; 
      }

      
      public function setServingMin($valor){
      	$this->servingMin=$valor;
      }      
      
      public function setServingMax($valor){
      	$this->servingMax=$valor;
      }

      public function setFriendlyRank($valor){ 
         $this->friendlyRank=$valor; 
      }

      public function setFriendlyText($valor){ 
         $this->friendlyText=$valor; 
      }

      public function setActiveRank($valor){ 
         $this->activeRank=$valor; 
      }

      public function setActiveText($valor){ 
         $this->activeText=$valor; 
      }

      public function setHealthyRank($valor){ 
         $this->healthyRank=$valor; 
      }

      public function setHealthyText($valor){ 
         $this->healthyText=$valor; 
      }

      public function setTrainingRank($valor){ 
         $this->trainingRank=$valor; 
      }

      public function setTrainingText($valor){ 
         $this->trainingText=$valor; 
      }

      public function setGuardianRank($valor){ 
         $this->guardianRank=$valor; 
      }

      public function setGuardianText($valor){ 
         $this->guardianText=$valor; 
      }

      public function setGroomingRank($valor){ 
         $this->groomingRank=$valor; 
      }

      public function setGroomingText($valor){ 
         $this->groomingText=$valor; 
      }

      public function setPictureUrl($valor){ 
         $this->pictureUrl=$valor; 
      }

      public function setVideoUrl($valor){ 
         $this->videoUrl=$valor; 
      }
      
      public function setAppartments($valor){
      	$this->appartments=$valor;
      }      
      
      public function setKids($valor){
      	$this->kids=$valor;
      }

      public function setMetaDescripcion($valor){
      	$this->metaDescripcion=$valor;
      }
      
      public function setMetaKeywords($valor){
      	$this->metaKeywords=$valor;
      }

      public function setHabilitada($valor){ 
         $this->habilitada=$valor; 
      }

   }
?>