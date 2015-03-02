<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/DogBreedsOadImpl.php';  
require_once $GLOBALS['pathCms'] . '/svc/DogBreedsSvc.php';  

   class DogBreedsSvcImpl implements DogBreedsSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new DogBreedsOadImpl();   
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      

      public function obtienePorNombreCodificado($nombre){
      	$bean=$this->oad->obtienePorNombreCodificado($nombre);
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
      
      public function inhabilita($id){
      	return $this->oad->inhabilita($id);
      }
      


      public function selecciona($parte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos){ 
         $arr=$this->oad->selecciona($parte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos); 
         return $arr; 
      } 


      public function seleccionaCuenta($parte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta){ 
         $cantidad=$this->oad->seleccionaCuenta($parte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta); 
         return $cantidad; 
      } 
      
      public function selNombres($nombreOParte){
      	$arr=$this->oad->selNombres($nombreOParte);
      	return $arr;
      }   

      public function selNombresPorShelter($shelterId){
      	$arr=$this->oad->selNombresPorShelter($shelterId);
      	return $arr;
      }
      
      public function selNombresPorForum($petForumId){
      	$arr=$this->oad->selNombresPorForum($petForumId);
      	return $arr;
      }      
      
      public function selNombresPorBreeder($breederId){
      	$arr=$this->oad->selNombresPorBreeder($breederId);
      	return $arr;
      }      
      

      public function selSheltersPorRaza($dogBreedId){
      	$arr=$this->oad->selSheltersPorRaza($dogBreedId);
      	return $arr;
      }
      
      public function selForumsPorRaza($dogBreedId){
      	$arr=$this->oad->selForumsPorRaza($dogBreedId);
      	return $arr;
      }
      
      public function selDogBreedGroups(){
      	$arr=$this->oad->selDogBreedGroups();
      	return $arr;
      }
      
      
   }
?>