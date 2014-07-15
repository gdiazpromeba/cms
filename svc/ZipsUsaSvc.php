<?php 

   interface ZipsUsaSvc { 

      public function obtiene($id); 
      public function obtienePorCodigo($code);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($desde, $cuantos); 
      public function selTodosCuenta(); 
   } 

?>