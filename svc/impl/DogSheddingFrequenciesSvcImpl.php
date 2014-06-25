<?php 
require_once '../../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/DogSheddingFrequenciesOadImpl.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/DogSheddingFrequenciesSvc.php';  

   class DogSheddingFrequenciesSvcImpl implements DogSheddingFrequenciesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new DogSheddingFrequenciesOadImpl();   
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


      public function selecciona($desde, $cuantos){ 
         $arr=$this->oad->selecciona($desde, $cuantos); 
         return $arr; 
      } 


      public function seleccionaCuenta(){ 
         $cantidad=$this->oad->seleccionaCuenta(); 
         return $cantidad; 
      } 

   }
?>