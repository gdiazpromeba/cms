<?php 

   class ShelterUsa { 
      private $id; 
      private $name; 
      private $zip; 
      private $url; 
      private $logoUrl; 
      private $email; 
      private $phone; 
      private $description; 
      private $streetAddress; 
      private $citiName;
      private $countyName;
      private $stateName;
      private $distancia;

      public function getId(){ 
         return $this->id;  
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
      
      public function getCityName(){
      	return $this->citiName;
      }
      
      public function getCountyName(){
      	return $this->countyName;
      }
      
      public function getStateName(){
      	return $this->stateName;
      }
      
      public function getDistancia(){
      	return $this->distancia;
      }      
      
      public function setId($valor){ 
         $this->id=$valor; 
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
      
      public function setCityName($valor){
      	$this->citiName = $valor;
      }
      
      public function setCountyName($valor){
      	$this->countyName = $valor;
      }
      
      public function setStateName($valor){
      	$this->stateName = $valor;
      }
      
      public function setDistancia($valor){
      	$this->distancia = $valor;
      }      
      

   }
?>