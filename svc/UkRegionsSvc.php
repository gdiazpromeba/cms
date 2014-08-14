<?php 

   interface UkRegionsSvc { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($countryName, $desde, $cuantos); 
      public function selTodosCuenta($countryName);
      public function selTodosStatistical($countryName, $desde, $cuantos);
      public function selTodosStatisticalCuenta($countryName);
      /**
      * dado un condado, sugiere el �rea estad�stica y el pa�s en donde se halla
      */
      public function obtRegionesMayores($regionName);
   } 

?>