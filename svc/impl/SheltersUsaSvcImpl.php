<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/SheltersUsaOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/SheltersUsaSvc.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/UsaStatesOadImpl.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/DogBreedsByShelterOadImpl.php';


   class SheltersUsaSvcImpl implements SheltersUsaSvc { 
      private $oad=null; 
      private $usaStatesOad = null;
      private $dogBreedsByShelterOad=null; 
      

      function __construct(){ 
         $this->oad=new SheltersUsaOadImpl();   
         $this->usaStatesOad = new UsaStatesOadImpl();
         $this->dogBreedsByShelterOad=new DogBreedsByShelterOadImpl();
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


      public function selTodos($nombreOParte, $estadoName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $estadoName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $estadoName, $countyName, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $estadoName, $countyName, $latitude, $longitude, $distance, $specialBreedId); 
         return $cantidad; 
      } 
      
      
      public function selTodosWeb($shelterName, $firstArea, $secondArea,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $firstArea, $secondArea, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $firstArea, $secondArea,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      
      
      public function vinculaDogBreedAShelter($shelterId, $dogBreedId){
      	$arr=$this->dogBreedsByShelterOad->vinculaDogBreedAShelter($shelterId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeShelter($shelterId, $dogBreedId){
      	$arr=$this->dogBreedsByShelterOad->desvinculaDogBreedDeShelter($shelterId, $dogBreedId);
      	return $arr;
      }
      
      public function selFirstAreas(){
      	$arr=$this->oad->selEstadosDeShelters();
      	$res=array();
      	$res[]=array('value'=>"", 'label'=>"Select state ...");
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