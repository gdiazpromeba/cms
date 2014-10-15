<?php 

   interface TextResourcesOad { 

      public function obtiene($id); 
      public function obtienePorKey($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($textOrPart, $keyOrPart, $desde, $cuantos); 
      public function selTodosCuenta($textOrPart, $keyOrPart); 
      
      /*
      * Obtiene un conjunto de beans cuyas keys comienzan con $key
      * (en la base de datos a terminar con _01, _02, etc.)
      */
      public function selTeasers($key);
   } 

?>