<?php 

   interface DogBreedsByShelterOad  { 

     public function vinculaDogBreedAShelter($shelterId, $dogBreedId);
      
     public function desvinculaDogBreedDeShelter($shelterId, $dogBreedId);

   } 
?>