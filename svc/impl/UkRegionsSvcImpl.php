<?php 
require_once '../../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/UkRegionsOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/UkRegionsSvc.php';

   class UkRegionsSvcImpl implements UkRegionsSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new UkRegionsOadImpl();   
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


      public function selTodos($countryName, $desde, $cuantos){ 
         $arr=$this->oad->selTodos($countryName, $desde, $cuantos); 
         return $arr; 
      } 


      public function selTodosCuenta($countryName){ 
         $cantidad=$this->oad->selTodosCuenta($countryName); 
         return $cantidad; 
      } 
      
      public function selTodosStatistical($countryName, $desde, $cuantos){
      	$arr=$this->oad->selTodosStatistical($countryName, $desde, $cuantos);
      	return $arr;
      }
      
      
      public function selTodosStatisticalCuenta($countryName){
      	$cantidad=$this->oad->selTodosStatisticalCuenta($countryName);
      	return $cantidad;
      } 

      public function obtRegionesMayores($regionName){
      	$arr=$this->oad->obtRegionesMayores($regionName);
      	if (count($arr)==0){
      		$arr["country"]="";
      		$arr["statistical"]="";
      	}
      	return $arr;
      }      

   }
?>