<?php 

   interface NewsSvc { 

      public function obtiene($id); 
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($title, $desde, $cuantos); 
      public function selTodosCuenta($title); 
   } 

?>