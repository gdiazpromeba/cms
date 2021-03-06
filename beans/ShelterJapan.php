<?php 

   require_once $GLOBALS['pathCms'] . '/beans/FormattedAddress.php';
   class ShelterJapan implements FormattedAddress{ 
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
      private $adminArea1;
      private $adminArea2;
      private $collArea;
      private $locality;
      private $subLocality1;
      private $distancia;
      private $latitude;
      private $longitude;
      private $specialBreedId;
      private $specialBreedName;
      private $metaDescripcion;
      private $metaKeywords;
      
      public function getMetaDescripcion(){
      	return $this->metaDescripcion;
      }
      
      public function getMetaKeywords(){
      	return $this->metaKeywords;
      }
      
      
      public function setMetaDescripcion($valor){
      	$this->metaDescripcion=$valor;
      }
      
      public function setMetaKeywords($valor){
      	$this->metaKeywords=$valor;
      }      
      

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
      
      
      public function getAdminArea1(){
      	return $this->adminArea1;
      }
      
      public function getAdminArea2(){
      	return $this->adminArea2;
      }
      
      public function getCollArea(){
      	return $this->collArea;
      }
      
      public function getLocality(){
      	return $this->locality;
      }
      
      public function getSubLocality1(){
      	return $this->subLocality1;
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
      

      public function setAdminArea1($valor){
      	$this->adminArea1 = $valor;
      }
      
      public function setAdminArea2($valor){
      	$this->adminArea2 = $valor;
      }
      
      public function setCollArea($valor){
      	$this->collArea = $valor;
      }
      
      public function setLocality($valor){
      	$this->locality = $valor;
      }
      
      public function setSubLocality1($valor){
      	$this->subLocality1 = $valor;
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
      
      public function get1stLine(){
      	$line="";
      	if (!empty($this->poBox)){
      		$line.="P.O.Box " . $this->poBox;
      	}else{      	
      	  $line.=$this->getStreetAddress();
      	  if (!empty($this->subLocality1)){
      		$line.=", " . $this->subLocality1;
      	  }
      	}
      	return $line ;
      }
      
      public function get2ndLine(){
      	$line=$this->getAdminAreas();
      	if (!empty($line)){
      		$line.=" ";
      	}
      	$line.=$this->zip;
      	return $line;
      }
      
      public function getAdminAreas(){
      	$line="";
      	if (!empty($this->collArea)){
      		$line.=$this->collArea;
      	}
      	if ((!empty($this->adminArea1))){
      		if (!empty($line)){
      			$line.=", ";
      		}
      		$line.=$this->adminArea1;
      	}
      	return $line;
      }      
   }
?>