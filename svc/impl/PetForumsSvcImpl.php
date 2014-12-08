<?php 

require_once $GLOBALS['pathCms'] . '/oad/impl/PetForumsOadImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/PetForumsSvc.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/DogBreedsByForumOadImpl.php';
require_once $GLOBALS['pathCms'] . '/oad/impl/CatBreedsByForumOadImpl.php';


   class PetForumsSvcImpl implements PetForumsSvc { 
      private $oad=null; 
      private $dogBreedsByForumOad=null;
      private $catBreedsByForumOad=null;

      function __construct(){ 
         $this->oad=new PetForumsOadImpl();  
         $this->dogBreedsByForumOad = new DogBreedsByForumOadImpl();
         $this->catBreedsByForumOad = new CatBreedsByForumOadImpl();
      } 

      public function obtiene($encodedName){ 
         $bean=$this->oad->obtiene($encodedName); 
         return $bean; 
      } 
      


      public function inserta($bean){ 
         return $this->oad->inserta($bean); 
      } 


      public function actualiza($bean){ 
         return $this->oad->actualiza($bean); 
      } 


      public function borra($id){ 
         return $this->oad->borra($id); 
      } 


      public function selTodos($title, $desde, $cuantos){ 
         $arr=$this->oad->selTodos($title, $desde, $cuantos); 
         return $arr; 
      } 
      
      public function selForumsByBreed($breedId){
         $arr=$this->oad->selForumsByBreed($breedId); 
         return $arr; 
      }


      public function selTodosCuenta($title){ 
         $cantidad=$this->oad->selTodosCuenta($title); 
         return $cantidad; 
      }

      public function vinculaDogBreedAForum($forumId, $dogBreedId){
      	$arr=$this->dogBreedsByForumOad->vinculaDogBreedAForum($forumId, $dogBreedId);
      	return $arr;
      }      
      
      public function desvinculaDogBreedDeForum($forumId, $dogBreedId){
      	$arr=$this->dogBreedsByForumOad->desvinculaDogBreedDeForum($forumId, $dogBreedId);
      	return $arr;
      }
      
      public function vinculaCatBreedAForum($forumId, $catBreedId){
      	$arr=$this->catBreedsByForumOad->vinculaCatBreedAForum($forumId, $catBreedId);
      	return $arr;
      }      
      
      public function desvinculaCatBreedDeForum($forumId, $catBreedId){
      	$arr=$this->catBreedsByForumOad->desvinculaCatBreedDeForum($forumId, $catBreedId);
      	return $arr;
      }      

   }
?>