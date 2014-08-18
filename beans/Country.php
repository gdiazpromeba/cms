<?php 

   class Country { 
      private $id; 
      private $name; 
      private $tablePrefix; 
      private $latitude; 
      private $longitude; 

      public function getId(){ 
         return $this->id;  
      }

      public function getName(){ 
         return $this->name;  
      }

      public function getTablePrefix(){ 
         return $this->tablePrefix;  
      }

      public function getLatitude(){ 
         return $this->latitude;  
      }

      public function getLongitude(){ 
         return $this->longitude;  
      }

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setName($valor){ 
         $this->name=$valor; 
      }

      public function setTablePrefix($valor){ 
         $this->tablePrefix=$valor; 
      }

      public function setLatitude($valor){ 
         $this->latitude=$valor; 
      }

      public function setLongitude($valor){ 
         $this->longitude=$valor; 
      }

   }
?>