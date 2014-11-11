<?php 


   interface DogBreedsByBreederOad  { 

     public function vinculaDogBreedABreeder($breederId, $dogBreedId);
      
     public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId);

   } 
?>