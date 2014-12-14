<?php 

   interface DogBreedsOad { 

      public function obtiene($id); 
      public function obtienePorNombreCodificado($nombre);
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
       * consulta ráipda que devuelve array php, sólo el nombre e Id, de razas en las que un refugio se especialice
       * @param unknown $shelterId
       */
      public function selNombresPorShelter($shelterId);
      
      /**
       * consulta rápida que devuelve array php, sólo el nombre e Id, de razas en las que un foro se especialice
       * @param unknown $shelterId
       */
      public function selNombresPorForum($petForumId);
      
      
      /**
       * consulta ráipda que devuelve array php, sólo el nombre e Id, de razas en las que un criador se especialice
       * @param unknown $breederId
       */
      public function selNombresPorBreeder($breederId);
      

      /**
      * consulta rapida que devuelve array php, sólo con el nombre del refugio, el id, y la url para link, para una raza
      * determinada
      * @param dofBreedId
      */
      public function selSheltersPorRaza($dogBreedId);
      
   } 

?>