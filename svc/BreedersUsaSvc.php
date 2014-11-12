<?php 

   require_once $GLOBALS['pathCms'] . '/svc/SheltersWebSelection.php';
   require_once $GLOBALS['pathCms'] . '/svc/CatBreedsByBreederSvc.php';
   require_once $GLOBALS['pathCms'] . '/svc/DogBreedsByBreederSvc.php';
   
   interface BreedersUsaSvc extends SheltersWebSelection, CatBreedsByBreederSvc, DogBreedsByBreederSvc{ 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      public function selTodosCuenta($nombre, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId);
      public function zipContainers($zipCode); 
      
      
   } 

?>