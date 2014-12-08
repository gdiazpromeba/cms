<?php 


   interface DogBreedsByForumOad  { 

     public function vinculaDogBreedAForum($forumId, $dogBreedId);
      
     public function desvinculaDogBreedDeForum($forumId, $dogBreedId);

   } 
?>