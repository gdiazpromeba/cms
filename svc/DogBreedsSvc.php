<?php 

   interface DogBreedsSvc { 

      public function obtiene($id); 
      public function obtienePorNombre($nombre);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function inhabilita($id);
      public function selecciona($nombreOParte, $inicial, $tama�oDesde, $tama�oHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos); 
      public function seleccionaCuenta($nombreOParte, $inicial, $tama�oDesde, $tama�oHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta);
      
      /**
       * consulta r�ipda que devuelve s�lo el nombre e Id
       * @param unknown $nombreOParte
       */
      public function selNombres($nombreOParte);
      
      public function selNombresPorShelter($shelterId);
      
      public function selNombresPorBreeder($breederId);
      
      public function selSheltersPorRaza($dogBreedId);
      
   } 

?>