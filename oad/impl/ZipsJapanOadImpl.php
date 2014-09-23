<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/ZipsJapanOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/ZipJapan.php';  

   class ZipsJapanOadImpl extends AOD implements ZipsJapanOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  UZI.ZIP_ID,     \n"; 
         $sql.="  UZI.ZIP_CODE,     \n"; 
         $sql.="  UZI.LOCATION_ID,     \n"; 
         $sql.="  UZI.LATITUDE,     \n"; 
         $sql.="  UZI.LONGITUDE,     \n"; 
         $sql.="  UCI.LOCATION_NAME,     \n"; 
         $sql.="  UCO.DISTRICT_NAME,     \n"; 
         $sql.="  UST.PREFECTURE_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  JAPAN_ZIPS UZI  \n"; 
         $sql.="  INNER JOIN JAPAN_LOCATIONS UCI ON UZI.LOCATION_ID=UCI.LOCATION_ID  \n";
         $sql.="  INNER JOIN JAPAN_DISTRICTS UCO ON UCI.DISTRICT_ID=UCO.DISTRICT_ID  \n";
         $sql.="  INNER JOIN JAPAN_PREFECTURES UST ON UCO.PREFECTURE_ID=UST.PREFECTURE_ID  \n";
         $sql.="WHERE  \n"; 
         $sql.="  ZIP_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ZipJapan();  
         $stm->bind_result($id, $code, $locationId, $latitude, $longitude, $location, $district, $prefecture); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setCode($code);
            $bean->setLocationId($locationId);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
            $bean->setLocation($location);
            $bean->setDistrict($district);
            $bean->setPrefecture($prefecture);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorCodigo($code){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  UZI.ZIP_ID,     \n";
      	$sql.="  UZI.ZIP_CODE,     \n";
      	$sql.="  UZI.LOCATION_ID,     \n";
      	$sql.="  UZI.LATITUDE,     \n";
      	$sql.="  UZI.LONGITUDE,     \n";
      	$sql.="  UCI.LOCATION_NAME,     \n";
      	$sql.="  UCO.DISTRICT_NAME,     \n";
      	$sql.="  UST.PREFECTURE_NAME    \n";
      	$sql.="FROM  \n";
      	$sql.="  JAPAN_ZIPS UZI  \n";
      	$sql.="  INNER JOIN JAPAN_LOCATIONS UCI ON UZI.LOCATION_ID=UCI.LOCATION_ID  \n";
      	$sql.="  INNER JOIN JAPAN_DISTRICTS UCO ON UCI.DISTRICT_ID=UCO.DISTRICT_ID  \n";
      	$sql.="  INNER JOIN JAPAN_PREFECTURES UST ON UCO.PREFECTURE_ID=UST.PREFECTURE_ID  \n";
      	$sql.="WHERE  \n";
      	$sql.="  ZIP_CODE='" . $code. "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ZipJapan();
      	$stm->bind_result($id, $code, $locationId, $latitude, $longitude, $location, $district, $prefecture);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setCode($code);
      		$bean->setLocationId($locationId);
      		$bean->setLatitude($latitude);
      		$bean->setLongitude($longitude);
      		$bean->setLocation($location);
      		$bean->setDistrict($district);
      		$bean->setPrefecture($prefecture);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO JAPAN_ZIP (   \n"; 
         $sql.="  ZIP_ID,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  LOCATION_ID,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE     \n"; 
         $sql.=")VALUES (?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssdd",$bean->getId(), $bean->getCode(), $bean->getLocationId(), $bean->getLatitude(), $bean->getLongitude());
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM JAPAN_ZIP   \n"; 
         $sql.="WHERE ZIP_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE JAPAN_ZIP SET   \n"; 
         $sql.="  ZIP_CODE=?,     \n"; 
         $sql.="  LOCATION_ID=?,     \n"; 
         $sql.="  LATITUDE=?,     \n"; 
         $sql.="  LONGITUDE=?     \n"; 
         $sql.="WHERE ZIP_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssddssss", $bean->getCode(), $bean->getLocationId(), $bean->getLatitude(), $bean->getLongitude(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  ZIP_ID,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  LOCATION_ID,     \n"; 
         $sql.="  LATITUDE,     \n"; 
         $sql.="  LONGITUDE,     \n"; 
         $sql.="  LOCATION_NAME,     \n"; 
         $sql.="  DISTRICT_NAME,     \n"; 
         $sql.="  PREFECTURE_NAME    \n"; 
         $sql.="FROM            \n";
         $sql.="  JAPAN_ZIPS UZI  \n"; 
         $sql.="  INNER JOIN JAPAN_LOCATIONS UCI ON UZI.LOCATION_ID=UCI.LOCATION_ID  \n";
         $sql.="  INNER JOIN JAPAN_DISTRICTS UCO ON UCI.DISTRICT_ID=UCO.DISTRICT_ID  \n";
         $sql.="  INNER JOIN JAPAN_PREFECTURES UST ON UCO.PREFECTURE_ID=UST.PREFECTURE_ID  \n";
         $sql.="ORDER BY  \n"; 
         $sql.="  ZIP_CODE  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $code=null;  
         $locationId=null;  
         $latitude=null;  
         $longitude=null;  
         $location=null;  
         $district=null;  
         $prefecture=null;  
         $stm->bind_result($id, $code, $locationId, $latitude, $longitude, $location, $district, $prefecture); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ZipJapan();  
            $bean->setId($id);
            $bean->setCode($code);
            $bean->setLocationId($locationId);
            $bean->setLatitude($latitude);
            $bean->setLongitude($longitude);
            $bean->setLocation($location);
            $bean->setDistrict($district);
            $bean->setPrefecture($prefecture);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*)  "; 
         $sql.="FROM            \n";
         $sql.="  JAPAN_ZIPS UZI  \n";
         $sql.="  INNER JOIN JAPAN_LOCATIONS UCI ON UZI.LOCATION_ID=UCI.LOCATION_ID  \n";
         $sql.="  INNER JOIN JAPAN_DISTRICTS UCO ON UCI.DISTRICT_ID=UCO.DISTRICT_ID  \n";
         $sql.="  INNER JOIN JAPAN_PREFECTURES UST ON UCO.PREFECTURE_ID=UST.PREFECTURE_ID  \n";
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