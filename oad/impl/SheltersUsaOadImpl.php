<?php 

require_once '../../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/SheltersUsaOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ShelterUsa.php';
 

   class SheltersUsaOadImpl extends AOD implements SheltersUsaOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  ID,     \n"; 
         $sql.="  NAME,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  URL,     \n"; 
         $sql.="  LOGO_URL,     \n"; 
         $sql.="  EMAIL,     \n"; 
         $sql.="  PHONE,     \n"; 
         $sql.="  DESCRIPTION,     \n"; 
         $sql.="  STREET_ADDRESS    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ShelterUsa();  
         $id=null;  
         $name=null;  
         $zip=null;  
         $url=null;  
         $logoUrl=null;  
         $email=null;  
         $phone=null;  
         $description=null;  
         $streetAddress=null;  
         $stm->bind_result($id, $name, $zip, $url, $logoUrl, $email, $phone, $description, $streetAddress); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO SHELTERS_USA (   \n"; 
         $sql.="  ID,     \n"; 
         $sql.="  NAME,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  URL,     \n"; 
         $sql.="  LOGO_URL,     \n"; 
         $sql.="  EMAIL,     \n"; 
         $sql.="  PHONE,     \n"; 
         $sql.="  DESCRIPTION,     \n"; 
         $sql.="  STREET_ADDRESS)    \n"; 
         $sql.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssssssss",$bean->getId(), $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM SHELTERS_USA   \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE SHELTERS_USA SET   \n"; 
         $sql.="  NAME=?,     \n"; 
         $sql.="  ZIP_CODE=?,     \n"; 
         $sql.="  URL=?,     \n"; 
         $sql.="  LOGO_URL=?,     \n"; 
         $sql.="  EMAIL=?,     \n"; 
         $sql.="  PHONE=?,     \n"; 
         $sql.="  DESCRIPTION=?,     \n"; 
         $sql.="  STREET_ADDRESS=?     \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssss", $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function zipContainers($zipCode){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  Z.CITY,     \n";
      	$sql.="  Z.COUNTY,     \n";
      	$sql.="  U.STATE_NAME     \n";
      	$sql.="FROM  \n";
      	$sql.="  ZIPS Z \n";
      	$sql.="  INNER JOIN USA_STATES U ON Z.STATE=U.STATE_CODE\n";
      	$sql.="WHERE  \n";
      	$sql.="  ZIP_CODE='" . $zipCode . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($city, $county, $state);
      	$ret=array();
      	if ($stm->fetch()) {
      		$ret['success']=true;
      		$ret['city']=$city;
      		$ret['county']=$county;
      		$ret['state']=$state;
      	}else{
      		$ret['success']=false;
      	}
      	$this->cierra($conexion, $stm);
      	return $ret;
      }
      
      public function selTodos($nombre, $stateId, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHU.ID,     \n"; 
         $sql.="  SHU.NAME,     \n"; 
         $sql.="  SHU.ZIP_CODE,     \n"; 
         $sql.="  SHU.URL,     \n"; 
         $sql.="  SHU.LOGO_URL,     \n"; 
         $sql.="  SHU.EMAIL,     \n"; 
         $sql.="  SHU.PHONE,     \n"; 
         $sql.="  SHU.DESCRIPTION,     \n"; 
         $sql.="  SHU.STREET_ADDRESS,    \n"; 
         $sql.="  CIU.CITY_NAME,    \n";
         $sql.="  COU.COUNTY_NAME,    \n";
         $sql.="  STU.STATE_NAME    \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  SHU \n"; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND SHU.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($stateId))){
         	$sql.="  AND STU.STATE_ID ='" . $stateId . "'  \n";
         }
         $sql.="ORDER BY  \n"; 
         $sql.="  ID  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $name, $zip, $url, $logoUrl, $email, $phone, $description, $streetAddress, $city, $county, $state); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ShelterUsa();  
            $bean->setId($id);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setCityName($city);
            $bean->setCountyName($county);
            $bean->setStateName($state);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($nombre, $stateId){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM SHELTERS_USA SHU "; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
                   if (!(empty($nombre))){
         	$sql.="  AND SHU.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($stateId))){
         	$sql.="  AND STU.STATE_ID ='" . $stateId . "'  \n";
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