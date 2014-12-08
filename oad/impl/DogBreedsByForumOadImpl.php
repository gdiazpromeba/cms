<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/DogBreedsByForumOad.php';

   class DogBreedsByForumOadImpl extends AOD implements DogBreedsByForumOad { 


     public function vinculaDogBreedAForum($forumId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO DOG_BREEDS_BY_FORUM (   \n";
      	$sql.="  DOG_BREED_ID,     \n";
      	$sql.="  FORUM_ID     \n";
      	$sql.=")VALUES (?, ?)    \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("ss", $dogBreedId, $forumId);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }
      
      public function desvinculaDogBreedDeForum($forumId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM DOG_BREEDS_BY_FORUM    \n";
      	$sql.="WHERE      \n";
      	$sql.="  FORUM_ID ='" . $forumId  . "'     \n";
      	$sql.="  AND DOG_BREED_ID ='" . $dogBreedId  . "'     \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }   
       

   } 
?>