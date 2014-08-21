<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/ZipsGenericoOad.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ZipGenerico.php';  

class ZipsGenericoOadImpl extends AOD implements ZipsGenericoOad { 

      
      public function obtienePorCodigo($pais, $code){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  UZI.ZIP_ID,     \n";
      	$sql.="  UZI.ZIP_CODE,     \n";
      	$sql.="  UZI.LOCATION_ID,     \n";
      	$sql.="  UZI.LATITUDE,     \n";
      	$sql.="  UZI.LONGITUDE     \n";
      	$sql.="FROM  \n";
      	$sql.="  " . $pais . "_ZIPS UZI  \n";
      	$sql.="WHERE  \n";
      	$sql.="  ZIP_CODE='" . $code. "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ZipGenerico();
      	$stm->bind_result($id, $code, $locationId, $latitude, $longitude);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setCode($code);
      		$bean->setLocationId($locationId);
      		$bean->setLatitude($latitude);
      		$bean->setLongitude($longitude);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }   

      public function inserta($pais, $bean){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO " . $pais. "_ZIPS (   \n";
      	$sql.="  ZIP_ID,     \n";
      	$sql.="  ZIP_CODE,     \n";
      	$sql.="  LOCATION_ID,     \n";
      	$sql.="  LATITUDE,     \n";
      	$sql.="  LONGITUDE     \n";
      	$sql.=")VALUES (?, ?, ?, ?, ?)    \n";
      	$nuevoId=$this->idUnico();
      	$bean->setId($nuevoId);
      	$stm=$this->preparar($conexion, $sql);
      	$id = $bean->getId();
      	$code = $bean->getCode();
      	$locationId = $bean->getLocationId();
      	$latitude = $bean->getLatitude();
      	$longitude = $bean->getLongitude();
      	$stm->bind_param("sssdd", $id, $code, $locationId, $latitude, $longitude);
      	return $this->ejecutaYCierra($conexion, $stm, $nuevoId);
      }      

 } 
?>