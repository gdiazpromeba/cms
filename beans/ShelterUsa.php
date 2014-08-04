<?php 

   class ShelterUsa { 
      private $id; 
      private $number;
      private $name; 
      private $zip; 
      private $url; 
      private $urlEncoded;
      private $logoUrl; 
      private $email; 
      private $phone; 
      private $description; 
      private $streetAddress; 
      private $poBox;
      private $citiName;
      private $countyName;
      private $stateName;
      private $stateCode;
      private $distancia;
      private $latitude;
      private $longitude;
      private $specialBreedId;
      private $specialBreedName;

      public function getId(){ 
         return $this->id;  
      }
      
      public function getNumber(){
      	return $this->number;
      }      

      public function getName(){ 
         return $this->name;  
      }

      public function getZip(){ 
         return $this->zip;  
      }

      public function getUrl(){ 
         return $this->url;  
      }
      
      public function getUrlEncoded(){
      	return $this->urlEncoded;
      }      

      public function getLogoUrl(){ 
         return $this->logoUrl;  
      }

      public function getEmail(){ 
         return $this->email;  
      }

      public function getPhone(){ 
         return $this->phone;  
      }

      public function getDescription(){ 
         return $this->description;  
      }

      public function getStreetAddress(){ 
         return $this->streetAddress;  
      }
      
      public function getPoBox(){
      	return $this->poBox;
      }
      
      
      public function getCityName(){
      	return $this->citiName;
      }
      
      public function getCountyName(){
      	return $this->countyName;
      }
      
      public function getStateName(){
      	return $this->stateName;
      }

      public function getStateCode(){
      	return $this->stateCode;
      }
      
      public function getDistancia(){
      	return $this->distancia;
      }      
      
      public function getLatitude(){
      	return $this->latitude;
      }
      
      public function getLongitude(){
      	return $this->longitude;
      }
      

      public function getSpecialBreedId(){
      	return $this->specialBreedId;
      }
      
      public function getSpecialBreedName(){
      	return $this->specialBreedName;
      }
      
      
      public function setId($valor){ 
         $this->id=$valor; 
      }
      
      public function setNumber($valor){
      	$this->number=$valor;
      }

      public function setName($valor){ 
         $this->name=$valor; 
      }

      public function setZip($valor){ 
         $this->zip=$valor; 
      }

      public function setUrl($valor){ 
         $this->url=$valor; 
      }

      public function setUrlEncoded($valor){
      	$this->urlEncoded=$valor;
      }      
      
      public function setLogoUrl($valor){ 
         $this->logoUrl=$valor; 
      }

      public function setEmail($valor){ 
         $this->email=$valor; 
      }

      public function setPhone($valor){ 
         $this->phone=$valor; 
      }

      public function setDescription($valor){ 
         $this->description=$valor; 
      }

      public function setStreetAddress($valor){ 
         $this->streetAddress=$valor; 
      }
      
      public function setPoBox($valor){
      	$this->poBox=$valor;
      }
      
      
      public function setCityName($valor){
      	$this->citiName = $valor;
      }
      
      public function setCountyName($valor){
      	$this->countyName = $valor;
      }
      
      public function setStateName($valor){
      	$this->stateName = $valor;
      }
      
      public function setStateCode($valor){
      	$this->stateCode = $valor;
      }
      
      public function setDistancia($valor){
      	$this->distancia = $valor;
      }      
      
      public function setLatitude($valor){
      	$this->latitude = $valor;
      }
      
      public function setLongitude($valor){
      	$this->longitude = $valor;
      }
      
      public function setSpecialBreedId($valor){
      	$this->specialBreedId = $valor;
      }
      
      public function setSpecialBreedName($valor){
      	$this->specialBreedName = $valor;
      }
      
      
      
   }
?>