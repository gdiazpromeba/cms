<?php
require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/VideosOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/VideosSvc.php';



   class VideosSvcImpl implements VideosSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new VideosOadImpl();   
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