<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/FrontPageOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/FrontPageSvc.php';

   class FrontPageSvcImpl implements FrontPageSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new FrontPageOadImpl();   
      } 

      public function obtiene(){ 
         $bean=$this->oad->obtiene(); 
         return $bean; 
      } 


      public function actualiza($bean){ 
         return $this->oad->actualiza($bean); 
      } 


   }
?>