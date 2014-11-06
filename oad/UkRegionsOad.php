<?php 

   interface UkRegionsOad { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($statistical, $desde, $cuantos); 
      public function selTodosCuenta($statistical); 
      public function selTodosStatistical($countryName, $desde, $cuantos);
      public function selTodosStatisticalCuenta($countryName);    
      public function obtRegionesMayores($regionName);  
   } 

?>