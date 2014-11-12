<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/DogBreedsByShelterOad.php';

   class DogBreedsByShelterOadImpl extends AOD implements DogBreedsByShelterOad { 


     public function vinculaDogBreedAShelter($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO DOG_BREEDS_BY_SHELTER (   \n";
      	$sql.="  DOG_BREED_ID,     \n";
      	$sql.="  SHELTER_ID     \n";
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
      
      public function desvinculaDogBreedDeShelter($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM DOG_BREEDS_BY_SHELTER    \n";
      	$sql.="WHERE      \n";
      	$sql.="  SHELTER_ID ='" . $breederId  . "'     \n";
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