<?php 

   class ZipJapan { 
      private $id; 
      private $code; 
      private $locationId; 
      private $latitude; 
      private $longitude; 
      private $location; 
      private $district; 
      private $prefecture; 

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

      public function getLocation(){ 
         return $this->location;  
      }

      public function getDistrict(){ 
         return $this->district;  
      }

      public function getPrefecture(){ 
         return $this->prefecture;  
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

      public function setLocation($valor){ 
         $this->location=$valor; 
      }

      public function setDistrict($valor){ 
         $this->district=$valor; 
      }

      public function setPrefecture($valor){ 
         $this->prefecture=$valor; 
      }

   }
?>