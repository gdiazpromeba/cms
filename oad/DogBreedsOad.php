<?php 

   interface DogBreedsOad { 

      public function obtiene($id); 
      public function obtienePorNombre($nombre);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function inhabilita($id);
      public function selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde,  $upkeepHasta, $desde, $cuantos); 
      public function seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde,  $upkeepHasta); 
      /**
       * consulta ráipda que devuelve sólo el nombre e Id
       * @param unknown $nombreOParte
       */
      public function selNombres($nombreOParte);
      
      /**
       * consulta ráipda que devuelve sólo el nombre e Id, de razas en las que un refugio se especialice
       * @param unknown $shelterId
       */
      public function selNombresPorShelter($shelterId);
      
      public function desvinculaDogBreedsDeShelter($shelterId);
      public function vinculaDogBreedAShelter($shelterId, $dogBreedId);
      
      
   } 

?>