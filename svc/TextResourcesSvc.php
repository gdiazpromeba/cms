<?php 

   interface TextResourcesSvc { 

      public function obtiene($id); 
      public function obtienePorKey($key); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($textOrPart, $keyOrPart, $desde, $cuantos); 
      public function selTodosCuenta($textOrPart, $keyOrPart); 
      public function selTeasers($key);
   } 

?>