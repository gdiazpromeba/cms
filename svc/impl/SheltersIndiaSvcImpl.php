<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/SheltersIndiaOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/SheltersIndiaSvc.php';

   class SheltersIndiaSvcImpl implements SheltersIndiaSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new SheltersIndiaOadImpl();   
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


      public function selTodos($nombreOParte, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId); 
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
      
      public function selTodosWeb($shelterName, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $provinceName, $districtName,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $provinceName, $districtName, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $provinceName, $districtName,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      
      
      public function selFirstAreas(){
      	$arr=$this->oad->selEstadosDeShelters();
      	$res=array();
      	$res[]=array('value'=>"", 'label'=>"Select State ...");
      	foreach ($arr as $valor){
      		$fila=array();
      		$fila['value']=$valor;
      		$fila['label']=$valor;
      		$res[]=$fila;
      	}
      	return $res;
      }
      
      

   }
?>