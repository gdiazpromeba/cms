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
   } 

?>