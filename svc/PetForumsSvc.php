<?php 

   interface PetForumsSvc  { 

      public function obtiene($encodedName); 
      
      public function inserta($bean);


      public function borra($id);


      public function actualiza($bean);


      public function selTodos($name, $desde, $cuantos);
      
      public function selTodosCuenta($name);
      
      public function selForumsByBreed($breedId);

   } 
?>