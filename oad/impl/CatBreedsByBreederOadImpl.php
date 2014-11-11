<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/CatBreedsByBreederOad.php';

   class CatBreedsByBreederOadImpl extends AOD implements CatBreedsByBreederOad { 


     public function vinculaCatBreedABreeder($breederId, $catBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO CAT_BREEDS_BY_BREEDER (   \n";
      	$sql.="  CAT_BREED_ID,     \n";
      	$sql.="  BREEDER_ID     \n";
      	$sql.=")VALUES (?, ?)    \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("ss", $catBreedId, $breederId);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }
      
      public function desvinculaCatBreedDeBreeder($breederId, $catBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM CAT_BREEDS_BY_BREEDER    \n";
      	$sql.="WHERE      \n";
      	$sql.="  BREEDER_ID ='" . $breederId  . "'     \n";
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