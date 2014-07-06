<?php 

   interface SheltersUsaSvc { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $stateId, $desde, $cuantos); 
      public function selTodosCuenta($nombre, $stateId);
      public function zipContainers($zipCode); 
   } 

?>