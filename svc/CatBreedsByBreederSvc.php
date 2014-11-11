<?php 


   interface CatBreedsByBreederSvc  { 

     public function vinculaCatBreedABreeder($breederId, $catBreedId);
      
     public function desvinculaCatBreedDeBreeder($breederId, $catBreedId);

   } 
?>