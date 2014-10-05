<?php 

   interface TextResourcesOad { 

      public function obtiene($id); 
      public function obtienePorKey($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($textOrPart, $keyOrPart, $desde, $cuantos); 
      public function selTodosCuenta($textOrPart, $keyOrPart); 
   } 

?>