<?php 

   class JapanPrefecture { 
      private $id; 
      private $name; 

      public function getId(){ 
         return $this->id;  
      }

      public function getName(){ 
         return $this->name;  
      }


      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setName($valor){ 
         $this->name=$valor; 
      }


   }
?>