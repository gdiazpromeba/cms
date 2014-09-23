<?php 
require_once $GLOBALS['pathCms'] . '/oad/impl/ZipsJapanOadImpl.php';  
require_once $GLOBALS['pathCms'] . '/svc/ZipsJapanSvc.php';  

   class ZipsJapanSvcImpl implements ZipsJapanSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new ZipsJapanOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      
      public function obtienePorCodigo($code){
      	$bean=$this->oad->obtienePorCodigo($code);
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