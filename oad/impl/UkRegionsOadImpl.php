<?php 

require_once '../../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/UkRegionsOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/UkRegion.php';

   class UkregionsOadImpl extends AOD implements UkRegionsOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  REGION_ID,     \n"; 
         $sql.="  REGION_NAME,     \n"; 
         $sql.="  COUNTRY_NAME     \n";
         $sql.="FROM  \n"; 
         $sql.="  UK_REGIONS  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  REGION_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new UkRegion();  
         $id=null;  
         $name=null;  
         $stm->bind_result($id, $name); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO UK_REGIONS (   \n"; 
         $sql.="  REGION_ID,     \n"; 
         $sql.="  REGION_NAME,     \n"; 
         $sql.="  COUNTRY_NAME     \n";
         $sql.="VALUES (?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sss",$bean->getId(), $bean->getName(),$bean->getCountryName() ); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM UK_REGIONS   \n"; 
         $sql.="WHERE REGION_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE UK_REGIONS SET   \n"; 
         $sql.="  REGION_NAME=?,     \n"; 
         $sql.="  COUNTRY_NAME=?     \n";
         $sql.="WHERE REGION_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssss", $bean->getName(), $bean->getCountryName(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($statistical, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  REGION_ID,     \n"; 
         $sql.="  REGION_NAME     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  UK_REGIONS  \n"; 
         if (!empty($statistical)){
         	$sql.="WHERE  \n";
         	$sql.="  STATISTICAL_AREA='" . $statistical . "'  \n";
         }
         $sql.="ORDER BY  \n"; 
         $sql.="  REGION_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $name); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new UkRegion();  
            $bean->setId($id);
            $bean->setName($name);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($statistical){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM UK_REGIONS "; 
         if (!empty($statistical)){
         	$sql.="WHERE  \n";
         	$sql.="  STATISTICAL_AREA='" . $statistical . "'  \n";
         }
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      public function selTodosStatistical($countryName, $desde, $cuantos){
      	$conexion=$this->conectarse();
      	$sql="SELECT DISTINCT \n";
      	$sql.="  STATISTICAL_AREA     \n";
      	$sql.="FROM  \n";
      	$sql.="  UK_REGIONS  \n";
      	if (!empty($countryName)){
      		$sql.="WHERE  \n";
      		$sql.="  COUNTRY_NAME='" . $countryName . "'  \n";
      	}
      	$sql.="ORDER BY  \n";
      	$sql.="  REGION_NAME  \n";
      	$sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($name);
      	$filas = array();
      	while ($stm->fetch()) {
      		$bean=new UkRegion();
      		$bean->setName($name);
      		$filas[]=$bean;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }
      
      
      public function selTodosStatisticalCuenta($countryName){
      	$conexion=$this->conectarse();
      	$sql="SELECT COUNT(DISTINCT STATISTICAL_AREA) FROM UK_REGIONS ";
      	if (!empty($countryName)){
      		$sql.="WHERE  \n";
      		$sql.="  COUNTRY_NAME='" . $countryName . "'  \n";
      	}
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$cuenta=null;
      	$stm->bind_result($cuenta);
      	$stm->fetch();
      	$this->cierra($conexion, $stm);
      	return $cuenta;
      }
      

   } 
?>