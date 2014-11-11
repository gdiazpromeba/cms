<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/SheltersUsaOad.php';
require_once $GLOBALS['pathCms'] . '/beans/ShelterUsa.php';
//require_once('FirePHPCore/fb.php4'); 

   class SheltersUsaOadImpl extends AOD implements SheltersUsaOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHU.ID,     \n"; 
         $sql.="  SHU.NUMBER,     \n";
         $sql.="  SHU.NAME,     \n"; 
         $sql.="  SHU.ZIP_CODE,     \n"; 
         $sql.="  SHU.URL,     \n"; 
         $sql.="  SHU.URL_ENCODED,     \n";
         $sql.="  SHU.LOGO_URL,     \n"; 
         $sql.="  SHU.EMAIL,     \n"; 
         $sql.="  SHU.PHONE,     \n"; 
         $sql.="  SHU.DESCRIPTION,     \n"; 
         $sql.="  SHU.STREET_ADDRESS,    \n"; 
         $sql.="  SHU.PO_BOX,    \n";
         $sql.="  CIU.CITY_NAME,    \n";
         $sql.="  COU.COUNTY_NAME,    \n";
         $sql.="  STU.STATE_NAME,    \n";
         $sql.="  STU.STATE_CODE,    \n";
         $sql.="  0 AS DISTANCE_KM, \n";
         $sql.="  SHU.LATITUDE,     \n";
         $sql.="  SHU.LONGITUDE,     \n";
         $sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  SHU.LOCALITY,     \n";
         $sql.="  SHU.STATISTICAL_AREA     \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  SHU \n"; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  \n"; 
         $sql.="  SHU.ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ShelterUsa();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
         		$city, $county, $state, $stateCode, $distance, 
         		$latitud, $longitud,
                $adminArea1, $adminArea2, $locality, $statisticalArea); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setPoBox($poBox);
            $bean->setCityName($city);
            $bean->setStateName($state);
            $bean->setStateCode($stateCode);
            $bean->setDistancia(0);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud);
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statisticalArea);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorNumero($number){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHU.ID,     \n";
      	$sql.="  SHU.NUMBER,     \n";
      	$sql.="  SHU.NAME,     \n";
      	$sql.="  SHU.ZIP_CODE,     \n";
      	$sql.="  SHU.URL,     \n";
      	$sql.="  SHU.URL_ENCODED,     \n";
      	$sql.="  SHU.LOGO_URL,     \n";
      	$sql.="  SHU.EMAIL,     \n";
      	$sql.="  SHU.PHONE,     \n";
      	$sql.="  SHU.DESCRIPTION,     \n";
      	$sql.="  SHU.STREET_ADDRESS,    \n";
      	$sql.="  SHU.PO_BOX,    \n";
      	$sql.="  CIU.CITY_NAME,    \n";
      	$sql.="  COU.COUNTY_NAME,    \n";
      	$sql.="  STU.STATE_NAME,    \n";
      	$sql.="  STU.STATE_CODE,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHU.LATITUDE,    \n";
      	$sql.="  SHU.LONGITUDE,    \n";
      	$sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_1,     \n";
      	$sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_2,     \n";
      	$sql.="  SHU.LOCALITY,     \n";
      	$sql.="  SHU.STATISTICAL_AREA     \n";
        $sql.="FROM  \n"; 
        $sql.="  SHELTERS_USA  SHU \n"; 
        $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
        $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
        $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
        $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  SHU.NUMBER='" . $number . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ShelterUsa();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, $city, $county, $state, $stateCode, 
      			$distance, $latitud, $longitud,
                $adminArea1, $adminArea2, $locality, $statisticalArea); 
      	
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNumber($number);
      		$bean->setName($name);
      		$bean->setZip($zip);
      		$bean->setUrl($url);
      		$bean->setUrlEncoded($urlEncoded);
      		$bean->setLogoUrl($logoUrl);
      		$bean->setEmail($email);
      		$bean->setPhone($phone);
      		$bean->setDescription($description);
      		$bean->setStreetAddress($streetAddress);
      		$bean->setPoBox($poBox);
      		$bean->setCityName($city);
      		$bean->setStateName($state);
      		$bean->setStateCode($stateCode);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      		$bean->setAdminArea1($adminArea1);
      		$bean->setAdminArea2($adminArea2);
      		$bean->setLocality($locality);
      		$bean->setStatisticalArea($statisticalArea);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }   

      public function obtienePorUrlEncoded($urlEncoded){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHU.ID,     \n";
      	$sql.="  SHU.NUMBER,     \n";
      	$sql.="  SHU.NAME,     \n";
      	$sql.="  SHU.ZIP_CODE,     \n";
      	$sql.="  SHU.URL,     \n";
      	$sql.="  SHU.URL_ENCODED,     \n";
      	$sql.="  SHU.LOGO_URL,     \n";
      	$sql.="  SHU.EMAIL,     \n";
      	$sql.="  SHU.PHONE,     \n";
      	$sql.="  SHU.DESCRIPTION,     \n";
      	$sql.="  SHU.STREET_ADDRESS,    \n";
      	$sql.="  SHU.PO_BOX,    \n";
      	$sql.="  CIU.CITY_NAME,    \n";
      	$sql.="  COU.COUNTY_NAME,    \n";
      	$sql.="  STU.STATE_NAME,    \n";
      	$sql.="  STU.STATE_CODE,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHU.LATITUDE,    \n";
      	$sql.="  SHU.LONGITUDE,    \n";
      	$sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_1,     \n";
      	$sql.="  SHU.ADMINISTRATIVE_AREA_LEVEL_2,     \n";
      	$sql.="  SHU.LOCALITY,     \n";
      	$sql.="  SHU.STATISTICAL_AREA     \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_USA  SHU \n";
      	$sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
      	$sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
      	$sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
      	$sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  SHU.URL_ENCODED='" . $urlEncoded . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ShelterUsa();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, $city, $county, $state, $stateCode,
      			$distance, $latitud, $longitud,
                $adminArea1, $adminArea2, $locality, $statisticalArea); 
      	
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNumber($number);
      		$bean->setName($name);
      		$bean->setZip($zip);
      		$bean->setUrl($url);
      		$bean->setUrlEncoded($urlEncoded);
      		$bean->setLogoUrl($logoUrl);
      		$bean->setEmail($email);
      		$bean->setPhone($phone);
      		$bean->setDescription($description);
      		$bean->setStreetAddress($streetAddress);
      		$bean->setPoBox($poBox);
      		$bean->setCityName($city);
      		$bean->setStateName($state);
      		$bean->setStateCode($stateCode);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      		$bean->setAdminArea1($adminArea1);
      		$bean->setAdminArea2($adminArea2);
      		$bean->setLocality($locality);
      		$bean->setStatisticalArea($statisticalArea);
      		
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
         $sql.="  URL_ENCODED,     \n";
         $sql.="  LOGO_URL,     \n"; 
         $sql.="  EMAIL,     \n"; 
         $sql.="  PHONE,     \n"; 
         $sql.="  DESCRIPTION,     \n"; 
         $sql.="  STREET_ADDRESS,     \n"; 
         $sql.="  PO_BOX,     \n";
         $sql.="  LATITUDE,     \n";
         $sql.="  LONGITUDE,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  STATISTICAL_AREA     \n";
         $sql.=") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssssssdddssss",$bean->getId(), $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), $bean->getLogoUrl(), 
         		$bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), $bean->getPoBox(), $bean->getLatitude(), 
         		$bean->getLongitude(), $bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getLocality(), $bean->getStatisticalArea()); 
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
         $sql.="  URL_ENCODED=?,     \n";
         $sql.="  LOGO_URL=?,     \n"; 
         $sql.="  EMAIL=?,     \n"; 
         $sql.="  PHONE=?,     \n"; 
         $sql.="  DESCRIPTION=?,     \n"; 
         $sql.="  STREET_ADDRESS=?,     \n"; 
         $sql.="  PO_BOX=?,     \n";
         $sql.="  LATITUDE=?,     \n";
         $sql.="  LONGITUDE=?,    \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1=?,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2=?,     \n";
         $sql.="  LOCALITY=?,     \n";
         $sql.="  STATISTICAL_AREA=?     \n";
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssssdddsssss", $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), 
         		$bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), 
         		$bean->getPoBox(), $bean->getLatitude(), $bean->getLongitude(), 
         		$bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getLocality(), $bean->getStatisticalArea(),
         		$bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 

      
      public function selTodos($nombre, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHU.ID,     \n"; 
         $sql.="  SHU.NUMBER,     \n";
         $sql.="  SHU.NAME,     \n"; 
         $sql.="  SHU.ZIP_CODE,     \n"; 
         $sql.="  SHU.URL,     \n"; 
         $sql.="  SHU.URL_ENCODED,     \n";
         $sql.="  SHU.LOGO_URL,     \n"; 
         $sql.="  SHU.EMAIL,     \n"; 
         $sql.="  SHU.PHONE,     \n"; 
         $sql.="  SHU.DESCRIPTION,     \n"; 
         $sql.="  SHU.STREET_ADDRESS,    \n"; 
         $sql.="  SHU.PO_BOX,    \n";
         $sql.="  CIU.CITY_NAME,    \n";
         $sql.="  COU.COUNTY_NAME,    \n";
         $sql.="  STU.STATE_NAME,    \n";
         $sql.="  STU.STATE_CODE,    \n";
         $sql.="  DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHU.LATITUDE, SHU.LONGITUDE) AS DISTANCE_KM, \n";
         $sql.="  SHU.LATITUDE,    \n";
         $sql.="  SHU.LONGITUDE,    \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  STATISTICAL_AREA     \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  SHU \n"; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND UPPER(SHU.NAME) LIKE '%" . strtoupper($nombre) . "%'  \n";
         }
         if (!(empty($stateName))){
         	$sql.="  AND STU.STATE_NAME ='" . $stateName . "'  \n";
         }
         if (!(empty($countyName))){
         	$sql.="  AND COU.COUNTY_NAME ='" . $countyName . "'  \n";
         }
         if (!(empty($distance))){
         	  $sql.="  AND GETDISTANCE(" . $latitude . "," . $longitude . ", SHU.LATITUDE, SHU.LONGITUDE) <=" . $distance . " \n";         	
         }   
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHU.ID IN (SELECT DBS.SHELTER_ID FROM DOG_BREEDS_BY_SHELTER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }
         if (!(empty($longitude))){ // la longitud y latitud no son cero, hay que ordenar por la distancia calculada
         	$sql.="ORDER BY  \n";
         	$sql.="  DISTANCE_KM  \n";
         }else { 
         	$sql.="ORDER BY  \n";
         	$sql.="  SHU.NAME  \n";
         }         
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox,
         		  $city, $county, $state, $stateCode, $distance, $latitud, $longitud, $adminArea1, $adminArea2, $locality, $statisticalArea
         ); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ShelterUsa();  
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setPoBox($poBox);
            $bean->setCityName($city);
            $bean->setCountyName($county);
            $bean->setStateName($state);
            $bean->setStateCode($stateCode);
            $bean->setDistancia($distance);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud);  
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statisticalArea);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($nombre, $stateName, $countyName, $latitude, $longitude, $distance, $specialBreedId){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM SHELTERS_USA SHU "; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
                   if (!(empty($nombre))){
         	$sql.="  AND UPPER(SHU.NAME) LIKE '%" . strtoupper($nombre) . "%'  \n";
         }
         if (!(empty($stateName))){
         	$sql.="  AND STU.STATE_NAME ='" . $stateName . "'  \n";
         }
         if (!(empty($countyName))){
         	$sql.="  AND COU.COUNTY_NAME ='" . $countyName . "'  \n";
         }
         if (!(empty($latitude)) && !(empty($longitude)) && !(empty($distance))){
         	$sql.="  AND DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHU.LATITUDE, SHU.LONGITUDE) <=" . $distance . " \n";         	
         } 
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHU.ID IN (SELECT DBS.SHELTER_ID FROM DOG_BREEDS_BY_SHELTER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }         
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      public function selEstadosDeShelters(){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  ADMINISTRATIVE_AREA_LEVEL_1,  \n";
      	$sql.="  COUNT(*)  \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_USA   \n";
      	$sql.="GROUP BY  1 \n";
      	$sql.="ORDER BY  1 \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($name, $amount);
      	$filas = array();
      	while ($stm->fetch()) {
      		$filas[]=array('name' => $name, 'amount' => $amount);
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }      
      

   } 
?>