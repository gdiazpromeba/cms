<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/BreedersChinaOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/BreedersChinaSvc.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/DogBreedsByBreederOadImpl.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/CatBreedsByBreederOadImpl.php';



   class BreedersChinaSvcImpl implements BreedersChinaSvc { 
      private $oad=null; 
      private $catBreedsByBreederOad=null; 
      private $dogBreedsByBreederOad=null;
      

      function __construct(){ 
         $this->oad=new BreedersChinaOadImpl();   
         $this->catBreedsByBreederOad=new CatBreedsByBreederOadImpl();
         $this->dogBreedsByBreederOad= new DogBreedsByBreederOadImpl();
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
      	$arr=$this->dogBreedsByBreederOad->vinculaDogBreedABreeder($breederId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId){
      	$arr=$this->dogBreedsByBreederOad->desvinculaDogBreedDeBreeder($breederId, $dogBreedId);
      	return $arr;
      }
      
      public function vinculaCatBreedABreeder($breederId, $catBreedId){
      	$arr=$this->catBreedsByBreederOad->vinculaCatBreedABreeder($breederId, $catBreedId);
      	return $arr;
      }      
      
      public function desvinculaCatBreedDeBreeder($breederId, $catBreedId){
      	$arr=$this->catBreedsByBreederOad->desvinculaCatBreedDeBreeder($breederId, $catBreedId);
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
      	$arr=$this->oad->selProvinciasDeBreeders();
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