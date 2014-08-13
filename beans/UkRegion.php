<?php 

   class UkRegion { 
      private $id; 
      private $name; 
      private $countryName;

      public function getId(){ 
         return $this->id;  
      }

      public function getName(){ 
         return $this->name;  
      }
      
      public function getCountryName(){
      	return $this->countryName;
      }
      

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setName($valor){ 
         $this->name=$valor; 
      }

      public function setCountryName($valor){
      	$this->countryName=$valor;
      }
      
      
   }
?>