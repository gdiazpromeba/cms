<?php 

   class TextResource { 
      private $id; 
      private $key; 
      private $text; 

      public function getId(){ 
         return $this->id;  
      }

      public function getKey(){ 
         return $this->key;  
      }

      public function getText(){ 
         return $this->text;  
      }

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setKey($valor){ 
         $this->key=$valor; 
      }

      public function setText($valor){ 
         $this->text=$valor; 
      }

   }
?>