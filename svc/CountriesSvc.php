<?php 

   interface CountriesSvc { 

      public function obtiene($id); 
      public function obtienePorPrefijoTabla($prefijo);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($desde, $cuantos); 
      public function selTodosCuenta(); 
   } 

?>