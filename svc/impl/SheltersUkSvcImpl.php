<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/SheltersUkOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/SheltersUkSvc.php';

   class SheltersUkSvcImpl implements SheltersUkSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new SheltersUkOadImpl();   
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


      public function selTodos($nombreOParte, $country, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $country, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
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
      
      public function vinculaDogBreedAShelter($shelterId, $dogBreedId){
      	$arr=$this->oad->vinculaDogBreedAShelter($shelterId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeShelter($shelterId, $dogBreedId){
      	$arr=$this->oad->desvinculaDogBreedDeShelter($shelterId, $dogBreedId);
      	return $arr;
      }
      
      public function selTodosWeb($shelterName, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $countryName, $countyName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      
      
      public function selFirstAreas(){
      	$arr=$this->oad->selCountriesDeShelters();
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