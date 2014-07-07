<?php 

   interface SheltersUsaSvc { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $stateId, $latitude, $longitude, $distance, $desde, $cuantos);
      public function selTodosCuenta($nombre, $stateId, $latitude, $longitude, $distance, $desde, $cuantos);
      public function zipContainers($zipCode); 
      
      /*
       * Devuelve una lista de refugios para perros estadounidenses, 
       * situados hasta la distancia indicada, del código postal que se indica
       * 
       * $zip es el código postal estadounidense 
       * $distanciaMaxima es el radio de búsqueda, en millas
       */
      public function selPorDistancia($zip, $distanciaMaxima);
   } 

?>