<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/CatBreedsByForumOad.php';

   class CatBreedsByForumOadImpl extends AOD implements CatBreedsByForumOad { 


     public function vinculaCatBreedAForum($forumId, $catBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO CAT_BREEDS_BY_FORUM (   \n";
      	$sql.="  CAT_BREED_ID,     \n";
      	$sql.="  FORUM_ID     \n";
      	$sql.=")VALUES (?, ?)    \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("ss", $catBreedId, $forumId);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }
      
      public function desvinculaCatBreedDeForum($forumId, $catBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM CAT_BREEDS_BY_FORUM    \n";
      	$sql.="WHERE      \n";
      	$sql.="  FORUM_ID ='" . $forumId  . "'     \n";
      	$sql.="  AND CAT_BREED_ID ='" . $catBreedId  . "'     \n";
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