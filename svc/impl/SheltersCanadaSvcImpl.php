<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/SheltersCanadaOadImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/SheltersCanadaSvc.php';

   class SheltersCanadaSvcImpl implements SheltersCanadaSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new SheltersCanadaOadImpl();   
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


      public function selTodos($nombreOParte, $provinceId, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
         $arr=$this->oad->selTodos($nombreOParte, $provinceId, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
         return $arr; 
      }

      public function zipContainers($zipCode){
      	$arr=$this->oad->zipContainers($zipCode);
      	return $arr;
      }


      public function selTodosCuenta($nombreOParte, $provinceId, $latitude, $longitude, $distance, $specialBreedId){ 
         $cantidad=$this->oad->selTodosCuenta($nombreOParte, $provinceId, $latitude, $longitude, $distance, $specialBreedId); 
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
      
      public function selTodosWeb($shelterName, $location, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){
      	$arr=$this->oad->selTodos($shelterName, $location,  $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      	return $arr;
      }
      
      public function selTodosWebCuenta($shelterName, $location, $latitude, $longitude, $distance, $specialBreedId){
      	$cantidad=$this->oad->selTodosCuenta($shelterName, $location,  $latitude, $longitude, $distance, $specialBreedId);
      	return $cantidad;
      }
      
     
      public function selFirstAreas(){
      	$arr=$this->oad->selProvinciasDeShelters();
      	$res=array();
      	$res[]=array('value'=>"", 'label'=>"");
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