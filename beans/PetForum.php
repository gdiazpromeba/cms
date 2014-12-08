<?php 

   class PetForum { 
      private $id; 
      private $name; 
      private $encodedName;      
      private $url; 
      private $pictureUrl; 
      private $description;
      private $metaDescripcion;
      private $metaKeywords;
      
      

      public function getId(){ 
         return $this->id;  
      }

      public function getName(){ 
         return $this->name;  
      }
      
      public function getEncodedName(){ 
         return $this->encodedName;  
      }
      
      

      public function getUrl(){
      	return $this->url;
      }
            
      public function getPictureUrl(){
      	return $this->pictureUrl;
      }
      
      
      public function getDescription(){ 
         return $this->description;  
      }
      
      public function getMetaDescripcion(){
      	return $this->metaDescripcion;
      }
      
      public function getMetaKeywords(){
      	return $this->metaKeywords;
      }      

      public function setId($valor){
      	$this->id=$valor;
      }
      
      public function setName($valor){
      	$this->name=$valor;
      }
      
      public function setEncodedName($valor){
      	$this->encodedName=$valor;
      }
      
      
      public function setUrl($valor){
      	$this->url=$valor;
      }
      
      public function setPictureUrl($valor){
      	$this->pictureUrl=$valor;
      }
      

      public function setDescription($valor){ 
         $this->description=$valor; 
      }
      
         public function setMetaDescripcion($valor){
      	$this->metaDescripcion=$valor;
      }
      
      public function setMetaKeywords($valor){
      	$this->metaKeywords=$valor;
      }
      
   }
?>