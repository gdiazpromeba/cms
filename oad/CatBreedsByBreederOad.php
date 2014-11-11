<?php 


   interface CatBreedsByBreederOad  { 

     public function vinculaCatBreedABreeder($breederId, $catBreedId);
      
     public function desvinculaCatBreedDeBreeder($breederId, $catBreedId);

   } 
?>