<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/BreedersUsaOadImpl.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/CatBreedsByBreederOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/BreedersUsaSvc.php';

   class BreedersUsaSvcImpl implements BreedersUsaSvc { 
      private $oad=null; 
      private $catBreedersByBreedOad=null; 

      function __construct(){ 
         $this->oad=new BreedersUsaOadImpl();  
          $this->catBreedersByBreedOad=new CatBreedsByBreederOadImpl();
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


      public function selTodos($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId); 
         return $cantidad; 
      } 
      
      public function vinculaDogBreedABreeder($breederId, $dogBreedId){
      	$arr=$this->oad->vinculaDogBreedABreeder($breederId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId){
      	$arr=$this->oad->desvinculaDogBreedDeBreeder($breederId, $dogBreedId);
      	return $arr;
      }
      
      public function vinculaCatBreedABreeder($breederId, $catBreedId){
      	$arr=$this->catBreedersByBreedOad->vinculaCatBreedABreeder($breederId, $catBreedId);
      	return $arr;
      }      
      
      public function desvinculaCatBreedDeBreeder($breederId, $catBreedId){
      	$arr=$this->catBreedersByBreedOad->desvinculaCatBreedDeBreeder($breederId, $catBreedId);
      	return $arr;
      }      
      
      
      
      public function selTodosWeb($shelterName, $stateName, $countyName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $stateName, $countyName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $stateName, $countyName,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      

      public function selFirstAreas(){
      	$arr=$this->oad->selEstadosDeBreeders();
        $res=array();
      	$res[]=array('value'=>"", 'label'=>"Select State ...");
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