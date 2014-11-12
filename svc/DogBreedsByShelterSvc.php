<?php 

   interface DogBreedsByShelterSvc  { 

     public function vinculaDogBreedAShelter($breederId, $dogBreedId);
      
     public function desvinculaDogBreedDeShelter($breederId, $dogBreedId);

   } 
?>