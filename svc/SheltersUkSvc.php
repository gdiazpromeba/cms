<?php 

   interface SheltersUkSvc { 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $country, $satistical, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos);
      public function selTodosCuenta($nombre, $country, $satistical, $latitude, $longitude, $distance, $specialBreedId);
      public function zipContainers($zipCode); 
      

      public function desvinculaDogBreedDeShelter($shelterId, $dogBreedId);
      public function vinculaDogBreedAShelter($shelterId, $dogBreedId);
      
   } 

?>