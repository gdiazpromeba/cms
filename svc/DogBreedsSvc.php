<?php 

   interface DogBreedsSvc { 

      public function obtiene($id); 
      public function obtienePorNombreCodificado($nombre);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function inhabilita($id);
      public function selecciona($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta, $desde, $cuantos); 
      public function seleccionaCuenta($nombreOParte, $inicial, $tamañoDesde, $tamañoHasta, $alimentacion, $appartments, $kids, $upkeepDesde, $upkeepHasta);
      
      /**
       * consulta ráipda que devuelve sólo el nombre e Id
       * @param unknown $nombreOParte
       */
      public function selNombres($nombreOParte);
      
      public function selNombresPorShelter($shelterId);
      
      public function selNombresPorForum($petForumId);
      
      public function selNombresPorBreeder($breederId);
      
      public function selSheltersPorRaza($dogBreedId);
      
   } 

?>