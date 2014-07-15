<?php 

   class ZipUsa { 
      private $id; 
      private $code; 
      private $cityId; 
      private $latitude; 
      private $longitude; 
      private $city; 
      private $county; 
      private $state; 

      public function getId(){ 
         return $this->id;  
      }

      public function getCode(){ 
         return $this->code;  
      }

      public function getCityId(){ 
         return $this->cityId;  
      }

      public function getLatitude(){ 
         return $this->latitude;  
      }

      public function getLongitude(){ 
         return $this->longitude;  
      }

      public function getCity(){ 
         return $this->city;  
      }

      public function getCounty(){ 
         return $this->county;  
      }

      public function getState(){ 
         return $this->state;  
      }

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setCode($valor){ 
         $this->code=$valor; 
      }

      public function setCityId($valor){ 
         $this->cityId=$valor; 
      }

      public function setLatitude($valor){ 
         $this->latitude=$valor; 
      }

      public function setLongitude($valor){ 
         $this->longitude=$valor; 
      }

      public function setCity($valor){ 
         $this->city=$valor; 
      }

      public function setCounty($valor){ 
         $this->county=$valor; 
      }

      public function setState($valor){ 
         $this->state=$valor; 
      }

   }
?>