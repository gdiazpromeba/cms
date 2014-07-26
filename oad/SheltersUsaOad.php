<?php 

   interface SheltersUsaOad { 

      public function obtiene($id); 
      public function obtienePorNumero($id);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $stateId, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos); 
      public function selTodosCuenta($nombre, $stateId, $latitude, $longitude, $distance, $specialBreedId);

   } 

?>