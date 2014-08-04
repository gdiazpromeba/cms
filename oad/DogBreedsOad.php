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
      /**
       * consulta r�ipda que devuelve s�lo el nombre e Id
       * @param unknown $nombreOParte
       */
      public function selNombres($nombreOParte);
      
      /**
       * consulta r�ipda que devuelve array php, s�lo el nombre e Id, de razas en las que un refugio se especialice
       * @param unknown $shelterId
       */
      public function selNombresPorShelter($shelterId);

      /**
      * consulta rapida que devuelve array php, s�lo con el nombre del refugio, el id, y la url para link, para una raza
      * determinada
      * @param dofBreedId
      */
      public function selSheltersPorRaza($dogBreedId);
      
   } 

?>