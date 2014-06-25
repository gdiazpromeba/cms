<?php 

   interface DogBreedsOad { 

      public function obtiene($id); 
      public function obtienePorNombre($nombre);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function inhabilita($id);
      public function selecciona($nombreOParte, $inicial, $tama�oDesde, $tama�oHasta, $alimentacion, $appartments, $kids, $upkeepDesde,  $upkeepHasta, $desde, $cuantos); 
      public function seleccionaCuenta($nombreOParte, $inicial, $tama�oDesde, $tama�oHasta, $alimentacion, $appartments, $kids, $upkeepDesde,  $upkeepHasta); 
   } 

?>