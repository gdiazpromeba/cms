<?php 

   class DogSheddingFrequency { 
      private $id; 
      private $name; 

      public function getId(){ 
         return $this->id;  
      }

      public function getNombre(){ 
         return $this->name;  
      }
      
      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setNombre($valor){ 
         $this->name=$valor; 
      }


   }
?>