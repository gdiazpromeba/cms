<?php 

   interface SheltersCanadaOad { 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos); 
      public function selTodosCuenta($nombre, $provinceName, $subdivisionName, $latitude, $longitude, $distance, $specialBreedId);

   } 

?>