<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/oad/impl/DogBreedsOadImpl.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/svc/DogBreedsSvc.php';  

   class DogBreedsSvcImpl implements DogBreedsSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new DogBreedsOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 


      public function inserta($bean){ 
         return $this->oad->inserta($bean); 
      } 


      public function actualiza($bean){ 
         return $this->oad->actualiza($bean); 
      } 


      public function borra($id){ 
         return $this->oad->borra($id); 
      } 

      public function inhabilita($id){
      	return $this->oad->inhabilita($id);
      }

      public function selecciona($parte, $desde, $cuantos){ 
         $arr=$this->oad->selecciona($parte, $desde, $cuantos); 
         return $arr; 
      } 


      public function seleccionaCuenta($parte){ 
         $cantidad=$this->oad->seleccionaCuenta($parte); 
         return $cantidad; 
      } 

   }
?>