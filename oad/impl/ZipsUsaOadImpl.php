<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/ZipsUsaOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/ZipUsa.php';  

   class ZipsUsaOadImpl extends AOD implements ZipsUsaOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  UZI.ZIP_ID,     \n"; 
         $sql.="  UZI.ZIP_CODE,     \n"; 
         $sql.="  UZI.CITY_ID,     \n"; 
         $sql.="  UZI.LATITUDE,     \n"; 
         $sql.="  UZI.LONGITUDE,     \n"; 
         $sql.="  UCI.CITY_NAME,     \n"; 
         $sql.="  UCO.COUNTY_NAME,     \n"; 
         $sql.="  UST.STATE_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  USA_ZIPS UZI  \n"; 
         $sql.="  INNER JOIN USA_CITIES UCI ON UZI.CITY_ID=UCI.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES UCO ON UCI.COUNTY_ID=UCO.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES UST ON UCO.STATE_ID=UST.STATE_ID  \n";
         $sql.="WHERE  \n"; 
         $sql.="  ZIP_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ZipUsa();  
         $stm->bind_result($id, $code, $cityId, $latitude, $longitude, $city, $county, $state); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setCode($code);
            $bean->setCityId($cityId);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
            $bean->setCity($city);
            $bean->setCounty($county);
            $bean->setState($state);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorCodigo($code){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  UZI.ZIP_ID,     \n";
      	$sql.="  UZI.ZIP_CODE,     \n";
      	$sql.="  UZI.CITY_ID,     \n";
      	$sql.="  UZI.LATITUDE,     \n";
      	$sql.="  UZI.LONGITUDE,     \n";
      	$sql.="  UCI.CITY_NAME,     \n";
      	$sql.="  UCO.COUNTY_NAME,     \n";
      	$sql.="  UST.STATE_NAME    \n";
      	$sql.="FROM  \n";
      	$sql.="  USA_ZIPS UZI  \n";
      	$sql.="  INNER JOIN USA_CITIES UCI ON UZI.CITY_ID=UCI.CITY_ID  \n";
      	$sql.="  INNER JOIN USA_COUNTIES UCO ON UCI.COUNTY_ID=UCO.COUNTY_ID  \n";
      	$sql.="  INNER JOIN USA_STATES UST ON UCO.STATE_ID=UST.STATE_ID  \n";
      	$sql.="WHERE  \n";
      	$sql.="  ZIP_CODE='" . $code. "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ZipUsa();
      	$stm->bind_result($id, $code, $cityId, $latitude, $longitude, $city, $county, $state);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setCode($code);
      		$bean->setCityId($cityId);
      		$bean->setLatitude($latitude);
      		$bean->setLongitude($longitude);
      		$bean->setCity($city);
      		$bean->setCounty($county);
      		$bean->setState($state);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO USA_ZIP (   \n"; 
         $sql.="  ZIP_ID,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  CITY_ID,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE     \n"; 
         $sql.=")VALUES (?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssdd",$bean->getId(), $bean->getCode(), $bean->getCityId(), $bean->getLatitude(), $bean->getLongitude());
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM USA_ZIP   \n"; 
         $sql.="WHERE ZIP_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE USA_ZIP SET   \n"; 
         $sql.="  ZIP_CODE=?,     \n"; 
         $sql.="  CITY_ID=?,     \n"; 
         $sql.="  LATITUDE=?,     \n"; 
         $sql.="  LONGITUDE=?     \n"; 
         $sql.="WHERE ZIP_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssddssss", $bean->getCode(), $bean->getCityId(), $bean->getLatitude(), $bean->getLongitude(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  ZIP_ID,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  CITY_ID,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE,     \n"; 
         $sql.="  CITY_NAME,     \n"; 
         $sql.="  COUNTY_NAME,     \n"; 
         $sql.="  STATE_NAME    \n"; 
         $sql.="FROM            \n";
         $sql.="  USA_ZIPS UZI  \n"; 
         $sql.="  INNER JOIN USA_CITIES UCI ON UZI.CITY_ID=UCI.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES UCO ON UCI.COUNTY_ID=UCO.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES UST ON UCO.STATE_ID=UST.STATE_ID  \n";
         $sql.="ORDER BY  \n"; 
         $sql.="  ZIP_CODE  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $code=null;  
         $cityId=null;  
         $latitude=null;  
         $longitude=null;  
         $city=null;  
         $county=null;  
         $state=null;  
         $stm->bind_result($id, $code, $cityId, $latitude, $longitude, $city, $county, $state); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ZipUsa();  
            $bean->setId($id);
            $bean->setCode($code);
            $bean->setCityId($cityId);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
            $bean->setCity($city);
            $bean->setCounty($county);
            $bean->setState($state);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*)  "; 
         $sql.="FROM            \n";
         $sql.="  USA_ZIPS UZI  \n";
         $sql.="  INNER JOIN USA_CITIES UCI ON UZI.CITY_ID=UCI.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES UCO ON UCI.COUNTY_ID=UCO.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES UST ON UCO.STATE_ID=UST.STATE_ID  \n";
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