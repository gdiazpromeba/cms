<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/oad/impl/DogPurposesOadImpl.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/svc/DogPurposesSvc.php';  

   class DogPurposesSvcImpl implements DogPurposesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new DogPurposesOadImpl();   
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