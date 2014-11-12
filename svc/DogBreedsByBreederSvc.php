<?php 

   interface DogBreedsByBreederSvc  { 

     public function vinculaDogBreedABreeder($breederId, $dogBreedId);
      
     public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId);

   } 
?>