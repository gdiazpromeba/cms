<?php 

   interface DogBreedsSvc { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function inhabilita($id); 
      public function selecciona($nombreOParte, $desde, $cuantos); 
      public function seleccionaCuenta($nombreOParte); 
   } 

?>