<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/TextResourcesOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/TextResourcesSvc.php';


   class TextResourcesSvcImpl implements TextResourcesSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new TextResourcesOadImpl();   
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


      public function selTodos($textOrPart, $keyOrPart, $desde, $cuantos){ 
         $arr=$this->oad->selTodos($textOrPart, $keyOrPart, $desde, $cuantos); 
         return $arr; 
      } 


      public function selTodosCuenta($textOrPart, $keyOrPart){ 
         $cantidad=$this->oad->selTodosCuenta($textOrPart, $keyOrPart); 
         return $cantidad; 
      } 
      
      public function obtienePorKey($key){
      	return $this->oad->obtienePorKey($key);
      }
      
      public function selTeasers($key){
      	return $this->oad->selTeasers($key);
      }
   }
?>