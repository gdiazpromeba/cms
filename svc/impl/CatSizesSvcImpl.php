<?php 
require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/CatSizesOadImpl.php'; 
require_once $GLOBALS['pathCms'] . '/svc/CatSizesSvc.php';  

   class DogSizesSvcImpl implements CatSizesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new CatSizesOadImpl();   
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