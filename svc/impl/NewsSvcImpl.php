<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/NewsOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/NewsSvc.php';

   class NewsSvcImpl implements NewsSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new NewsOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      
      public function obtienePorUrlEncoded($urlEncoded){
      	$bean=$this->oad->obtienePorUrlEncoded($urlEncoded);
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


      public function selTodos($title, $desde, $cuantos){ 
         $arr=$this->oad->selTodos($title, $desde, $cuantos); 
         return $arr; 
      } 


      public function selTodosCuenta($title){ 
         $cantidad=$this->oad->selTodosCuenta($title); 
         return $cantidad; 
      } 

   }
?>