<?php 

   interface NewsOad { 

      public function obtiene($id); 
      public function obtienePorUrlEncoded($urlEncoded);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($title, $desde, $cuantos); 
      public function selTodosCuenta($title); 
   } 

?>