<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] .  '/oad/impl/CountriesOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] .  '/svc/CountriesSvc.php';

   class CountriesSvcImpl implements CountriesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new CountriesOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      
      public function obtienePorPrefijoTabla($prefijo){
      	$bean=$this->oad->obtienePorPrefijoTabla($prefijo);
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


      public function selTodos($desde, $cuantos){ 
         $arr=$this->oad->selTodos($desde, $cuantos); 
         return $arr; 
      } 


      public function selTodosCuenta(){ 
         $cantidad=$this->oad->selTodosCuenta(); 
         return $cantidad; 
      } 

   }
?>