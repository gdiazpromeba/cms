<?php 

   class ZipGenerico { 
      private $id; 
      private $code; 
      private $locationId; 
      private $latitude; 
      private $longitude; 

      public function getId(){ 
         return $this->id;  
      }

      public function getCode(){ 
         return $this->code;  
      }

      public function getLocationId(){ 
         return $this->locationId;  
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

      public function setCode($valor){ 
         $this->code=$valor; 
      }

      public function setLocationId($valor){ 
         $this->locationId=$valor; 
      }

      public function setLatitude($valor){ 
         $this->latitude=$valor; 
      }

      public function setLongitude($valor){ 
         $this->longitude=$valor; 
      }

   }
?>