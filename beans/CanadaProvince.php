<?php 

   class CanadaProvince { 
      private $id; 
      private $name; 
      private $code;

      public function getId(){ 
         return $this->id;  
      }

      public function getName(){ 
         return $this->name;  
      }
      
      public function getCode(){
      	return $this->code;
      }
      


      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setName($valor){ 
         $this->name=$valor; 
      }
      
      public function setCode($valor){
      	$this->code=$valor;
      }
      


   }
?>