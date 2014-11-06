<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/BreedersUkOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/BreedersUkSvc.php';

   class BreedersUkSvcImpl implements BreedersUkSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new BreedersUkOadImpl();   
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


      public function selTodos($nombreOParte, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId); 
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
      
      public function selTodosWeb($breederName, $countryName, $countyName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($breederName, $countryName, $countyName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($breederName, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($breederName, $countryName, $countyName,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      

      public function selFirstAreas(){
      	$arr=$this->oad->selAAL1DeBreeders();
        $res=array();
      	$res[]=array('value'=>"", 'label'=>"Select Country ...");
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