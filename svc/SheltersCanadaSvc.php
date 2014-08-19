<?php 

   require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/SheltersWebSelection.php';
   interface SheltersCanadaSvc extends SheltersWebSelection{ 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $provinceId, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      public function selTodosCuenta($nombre, $provinceId, $latitude, $longitude, $distance, $specialBreedId);
      public function zipContainers($zipCode); 
      

      public function desvinculaDogBreedDeShelter($shelterId, $dogBreedId);
      public function vinculaDogBreedAShelter($shelterId, $dogBreedId);
      
   } 

?>