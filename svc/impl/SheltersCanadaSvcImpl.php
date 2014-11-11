<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/SheltersCanadaOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/SheltersCanadaSvc.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/DogBreedsByBreederOadImpl.php';

   class SheltersCanadaSvcImpl implements SheltersCanadaSvc { 
      private $oad=null; 
      private $dogBreedersByBreedOad=null; 
      

      function __construct(){ 
         $this->oad=new SheltersCanadaOadImpl();   
         $this->dogBreedersByBreedOad=new DogBreedsByBreederOadImpl();         
      } 

      public function obtiene($id){ 
         $bean=$this->oad->obtiene($id); 
         return $bean; 
      } 
      
      public function obtienePorNumero($numero){
      	$bean=$this->oad->obtienePorNumero($numero);
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


      public function selTodos($nombreOParte, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId); 
         return $cantidad; 
      } 
      
      public function vinculaDogBreedABreeder($breederId, $dogBreedId){
      	$arr= $this->dogBreedersByBreedOad->vinculaDogBreedABreeder($breederId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId){
      	$arr= $this->dogBreedersByBreedOad->desvinculaDogBreedDeBreeder($breederId, $dogBreedId);
      	return $arr;
      }
      
      public function selTodosWeb($shelterName, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $provinceName, $subdivisionName,   $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $provinceName, $subdivisionName,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      
     
      public function selFirstAreas(){
      	$arr=$this->oad->selProvinciasDeShelters();
      	$res=array();
      	$res[]=array('value'=>"", 'label'=>"Select Province ...");
        foreach ($arr as $dupla){
      		$fila=array();
      		$fila['value']=$dupla['name'];
      		$fila['label']=$dupla['name'] . "       (" . $dupla['amount'] . ")";
      		$res[]=$fila;
      	}
      	return $res;
      }  
      
      

   }
?>