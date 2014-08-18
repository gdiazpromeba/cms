<?php 

 
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] .  '/beans/Country.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] .  '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] .  '/oad/CountriesOad.php';

   class CountriesOadImpl extends AOD implements CountriesOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  COUNTRY_ID,     \n"; 
         $sql.="  COUNTRY_NAME,     \n"; 
         $sql.="  TABLE_PREFIX,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  COUNTRIES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  COUNTRY_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new Country();  
         $id=null;  
         $name=null;  
         $tablePrefix=null;  
         $latitude=null;  
         $longitude=null;  
         $stm->bind_result($id, $name, $tablePrefix, $latitude, $longitude); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
            $bean->setTablePrefix($tablePrefix);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorPrefijoTabla($prefijo){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  COUNTRY_ID,     \n";
      	$sql.="  COUNTRY_NAME,     \n";
      	$sql.="  TABLE_PREFIX,     \n";
      	$sql.="  LATITUDE,     \n";
      	$sql.="  LONGITUDE    \n";
      	$sql.="FROM  \n";
      	$sql.="  COUNTRIES  \n";
      	$sql.="WHERE  \n";
      	$sql.="  TABLE_PREFIX='" . $prefijo . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new Country();
      	$id=null;
      	$name=null;
      	$tablePrefix=null;
      	$latitude=null;
      	$longitude=null;
      	$stm->bind_result($id, $name, $tablePrefix, $latitude, $longitude);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setName($name);
      		$bean->setTablePrefix($tablePrefix);
      		$bean->setLatitude($latitude);
      		$bean->setLongitude($longitude);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO COUNTRIES (   \n"; 
         $sql.="  COUNTRY_ID,     \n"; 
         $sql.="  COUNTRY_NAME,     \n"; 
         $sql.="  TABLE_PREFIX,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE)    \n"; 
         $sql.="VALUES (?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssdd",$bean->getId(), $bean->getName(), $bean->getTablePrefix(), $bean->getLatitude(), $bean->getLongitude()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM COUNTRIES   \n"; 
         $sql.="WHERE COUNTRY_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE COUNTRIES SET   \n"; 
         $sql.="  COUNTRY_NAME=?,     \n"; 
         $sql.="  TABLE_PREFIX=?,     \n"; 
         $sql.="  LATITUDE=?,     \n"; 
         $sql.="  LONGITUDE=?     \n"; 
         $sql.="WHERE COUNTRY_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssdds", $bean->getName(), $bean->getTablePrefix(), $bean->getLatitude(), $bean->getLongitude(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  COUNTRY_ID,     \n"; 
         $sql.="  COUNTRY_NAME,     \n"; 
         $sql.="  TABLE_PREFIX,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  COUNTRIES  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  COUNTRY_ID  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $name=null;  
         $tablePrefix=null;  
         $latitude=null;  
         $longitude=null;  
         $stm->bind_result($id, $name, $tablePrefix, $latitude, $longitude); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new Country();  
            $bean->setId($id);
            $bean->setName($name);
            $bean->setTablePrefix($tablePrefix);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM COUNTRIES "; 
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