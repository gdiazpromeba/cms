<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/SheltersUsaOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/SheltersUsaSvc.php';

   class SheltersUsaSvcImpl implements SheltersUsaSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new SheltersUsaOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      
      public function obtienePorNumero($numero){
      	$bean=$this->oad->obtienePorNumero($numero);
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


      public function selTodos($nombreOParte, $estadoId, $latitude, $longitude, $distance, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $estadoId, $latitude, $longitude, $distance, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $estadoId, $latitude, $longitude, $distance){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $estadoId, $latitude, $longitude, $distance); 
         return $cantidad; 
      } 
      

   }
?>