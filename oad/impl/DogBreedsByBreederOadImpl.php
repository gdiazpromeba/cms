<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/DogBreedsByBreederOad.php';

   class DogBreedsByBreederOadImpl extends AOD implements DogBreedsByBreederOad { 


     public function vinculaDogBreedABreeder($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO DOG_BREEDS_BY_BREEDER (   \n";
      	$sql.="  DOG_BREED_ID,     \n";
      	$sql.="  BREEDER_ID     \n";
      	$sql.=")VALUES (?, ?)    \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("ss", $dogBreedId, $breederId);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }
      
      public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM DOG_BREEDS_BY_BREEDER    \n";
      	$sql.="WHERE      \n";
      	$sql.="  BREEDER_ID ='" . $breederId  . "'     \n";
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