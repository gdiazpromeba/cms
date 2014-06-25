<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/oad/impl/DogSizesOadImpl.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/svc/DogSizesSvc.php';  

   class DogSizesSvcImpl implements DogSizesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new DogSizesOadImpl();   
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