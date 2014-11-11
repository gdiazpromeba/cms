<?php 

   require_once $GLOBALS['pathCms'] . '/svc/SheltersWebSelection.php';
   require_once $GLOBALS['pathCms'] . '/svc/DogBreedsByBreederSvc.php'; 
   
   
   interface SheltersUkSvc extends SheltersWebSelection, DogBreedsByBreederSvc{ 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      public function selTodosCuenta($nombre, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId);
      public function zipContainers($zipCode); 
      
      
   } 

?>