<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/SheltersUkOad.php';
require_once $GLOBALS['pathCms'] . '/beans/ShelterUk.php';
// require_once('FirePHPCore/fb.php4'); 
// ob_start();

   class SheltersUkOadImpl extends AOD implements SheltersUkOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHJ.ID,     \n"; 
         $sql.="  SHJ.NUMBER,     \n";
         $sql.="  SHJ.NAME,     \n"; 
         $sql.="  SHJ.ZIP_CODE,     \n"; 
         $sql.="  SHJ.URL,     \n"; 
         $sql.="  SHJ.URL_ENCODED,     \n";
         $sql.="  SHJ.LOGO_URL,     \n"; 
         $sql.="  SHJ.EMAIL,     \n"; 
         $sql.="  SHJ.PHONE,     \n"; 
         $sql.="  SHJ.DESCRIPTION,     \n"; 
         $sql.="  SHJ.STREET_ADDRESS,    \n"; 
         $sql.="  SHJ.PO_BOX,    \n";
         $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
         $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
         $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
         $sql.="  SHJ.LOCALITY,    \n";
         $sql.="  SHJ.STATISTICAL_AREA,    \n";
         $sql.="  0 AS DISTANCE_KM, \n";
         $sql.="  SHJ.LATITUDE,     \n";
         $sql.="  SHJ.LONGITUDE,     \n";
         $sql.="  SHJ.META_DESCRIPCION,     \n";
         $sql.="  SHJ.META_KEYWORDS     \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_UK  SHJ \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  SHJ.ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ShelterUk();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
         		$adminArea1, $adminArea2, $collArea,  $locality, $statistical, 
         		$distance, $latitud, $longitud, $metaDescripcion, $metaKeywords); 
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
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statistical);
            $bean->setDistancia(0);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud);
            $bean->setMetaDescripcion($metaDescripcion);
            $bean->setMetaKeywords($metaKeywords);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorNumero($number){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHJ.ID,     \n";
      	$sql.="  SHJ.NUMBER,     \n";
      	$sql.="  SHJ.NAME,     \n";
      	$sql.="  SHJ.ZIP_CODE,     \n";
      	$sql.="  SHJ.URL,     \n";
      	$sql.="  SHJ.URL_ENCODED,     \n";
      	$sql.="  SHJ.LOGO_URL,     \n";
      	$sql.="  SHJ.EMAIL,     \n";
      	$sql.="  SHJ.PHONE,     \n";
      	$sql.="  SHJ.DESCRIPTION,     \n";
      	$sql.="  SHJ.STREET_ADDRESS,    \n";
      	$sql.="  SHJ.PO_BOX,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
        $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
        $sql.="  SHJ.LOCALITY,    \n";
        $sql.="  SHJ.STATISTICAL_AREA,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHJ.LATITUDE,    \n";
      	$sql.="  SHJ.LONGITUDE,    \n";
        $sql.="  SHJ.META_DESCRIPCION,     \n";
        $sql.="  SHJ.META_KEYWORDS     \n";
        $sql.="FROM  \n"; 
        $sql.="  SHELTERS_UK  SHJ \n"; 
      	$sql.="WHERE  \n";
      	$sql.="  SHJ.NUMBER='" . $number . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ShelterUk();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
      			$adminArea1, $adminArea2, $collArea,  $locality, $statistical, 
      			$distance, $latitud, $longitud, $metaDescripcion, $metaKeywords); 
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
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statistical);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      		$bean->setMetaDescripcion($metaDescripcion);
      		$bean->setMetaKeywords($metaKeywords);
      		
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }   

      public function obtienePorUrlEncoded($urlEncoded){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHJ.ID,     \n";
      	$sql.="  SHJ.NUMBER,     \n";
      	$sql.="  SHJ.NAME,     \n";
      	$sql.="  SHJ.ZIP_CODE,     \n";
      	$sql.="  SHJ.URL,     \n";
      	$sql.="  SHJ.URL_ENCODED,     \n";
      	$sql.="  SHJ.LOGO_URL,     \n";
      	$sql.="  SHJ.EMAIL,     \n";
      	$sql.="  SHJ.PHONE,     \n";
      	$sql.="  SHJ.DESCRIPTION,     \n";
      	$sql.="  SHJ.STREET_ADDRESS,    \n";
      	$sql.="  SHJ.PO_BOX,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
        $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
        $sql.="  SHJ.LOCALITY,    \n";
        $sql.="  SHJ.STATISTICAL_AREA,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHJ.LATITUDE,    \n";
      	$sql.="  SHJ.LONGITUDE,    \n";
        $sql.="  SHJ.META_DESCRIPCION,     \n";
        $sql.="  SHJ.META_KEYWORDS     \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_UK  SHJ \n";
      	$sql.="WHERE  \n";
      	$sql.="  SHJ.URL_ENCODED='" . $urlEncoded . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ShelterUk();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
      			$adminArea1, $adminArea2, $collArea,  $locality, $statistical, 
      			$distance, $latitud, $longitud, $metaDescripcion, $metaKeywords);
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
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statistical);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      		$bean->setMetaDescripcion($metaDescripcion);
      		$bean->setMetaKeywords($metaKeywords);
      		
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO SHELTERS_UK (   \n"; 
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
         $sql.="  COLLOQUIAL_AREA,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  STATISTICAL_AREA,     \n";
         $sql.="  META_DESCRIPCION,     \n";
         $sql.="  META_KEYWORDS     \n";
         $sql.=") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssssssdddsssssss",$bean->getId(), $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), $bean->getLogoUrl(), 
         		$bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), $bean->getPoBox(), $bean->getLatitude(), $bean->getLongitude(),
         		$bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getCollArea(), $bean->getLocality(), $bean->getStatisticalArea(),
         		$bean->getMetaDescripcion(), $bean->getMetaKeywords()  
         ); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM SHELTERS_UK   \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE SHELTERS_UK SET   \n"; 
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
         $sql.="  COLLOQUIAL_AREA=?,     \n";
         $sql.="  LOCALITY=?,     \n";
         $sql.="  STATISTICAL_AREA=?,     \n";         
         $sql.="  META_DESCRIPCION=?,     \n";
         $sql.="  META_KEYWORDS=?     \n";
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssssdddssssssss", $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), 
         		$bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), 
         		$bean->getPoBox(), $bean->getLatitude(), $bean->getLongitude(), 
         		$bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getCollArea(), $bean->getLocality(), $bean->getStatisticalArea(),
         		$bean->getMetaDescripcion(), $bean->getMetaKeywords(),
         		$bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 

      
      public function selTodos($nombre, $countryName, $countyName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHJ.ID,     \n"; 
         $sql.="  SHJ.NUMBER,     \n";
         $sql.="  SHJ.NAME,     \n"; 
         $sql.="  SHJ.ZIP_CODE,     \n"; 
         $sql.="  SHJ.URL,     \n"; 
         $sql.="  SHJ.URL_ENCODED,     \n";
         $sql.="  SHJ.LOGO_URL,     \n"; 
         $sql.="  SHJ.EMAIL,     \n"; 
         $sql.="  SHJ.PHONE,     \n"; 
         $sql.="  SHJ.DESCRIPTION,     \n"; 
         $sql.="  SHJ.STREET_ADDRESS,    \n"; 
         $sql.="  SHJ.PO_BOX,    \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  COLLOQUIAL_AREA,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  STATISTICAL_AREA,     \n";
         $sql.="  DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) AS DISTANCE_KM, \n";
         $sql.="  SHJ.LATITUDE,    \n";
         $sql.="  SHJ.LONGITUDE,    \n";
         $sql.="  META_DESCRIPCION,     \n";
         $sql.="  META_KEYWORDS     \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_UK  SHJ \n"; 
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND SHJ.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($countryName))){
         	$sql.="  AND ADMINISTRATIVE_AREA_LEVEL_1 ='" . $countryName . "'  \n";
         }
         if (!(empty($countyName))){
         	$sql.="  AND ADMINISTRATIVE_AREA_LEVEL_2 ='" . $countyName . "'  \n";
         }
         if (!(empty($distance))){
         	  $sql.="  AND GETDISTANCE(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) <=" . $distance . " \n";         	
         }   
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHJ.ID IN (SELECT DBS.SHELTER_ID FROM DOG_BREEDS_BY_SHELTER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }
         if (!(empty($longitude))){ // la longitud y latitud no son cero, hay que ordenar por la distancia calculada
         	$sql.="ORDER BY  \n";
         	$sql.="  DISTANCE_KM  \n";
         }else { 
         	$sql.="ORDER BY  \n";
         	$sql.="  SHJ.NAME  \n";
         }         
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox,
         		  $adminArea1, $adminArea2, $collArea,  $locality, $statistical, 
         		  $distance, $latitud, $longitud, $metaDescripcion, $metaKeywords); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ShelterUk();  
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
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setStatisticalArea($statistical);
            $bean->setDistancia($distance);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud); 
      		$bean->setMetaDescripcion($metaDescripcion);
      		$bean->setMetaKeywords($metaKeywords);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($nombre, $country, $statistical, $latitude, $longitude, $distance, $specialBreedId){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM SHELTERS_UK SHJ "; 
         $sql.="WHERE  1=1  \n";
                   if (!(empty($nombre))){
         	$sql.="  AND SHJ.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($statistical))){
         	$sql.="  AND STATISTICAL_AREA ='" .  $statistical . "'  \n";
         }else if (!(empty($country))){
         	$sql.="  AND ADMINISTRATIVE_AREA_LEVEL_1 ='" . $country . "'  \n";
         }
         if (!(empty($latitude)) && !(empty($longitude)) && !(empty($distance))){
         	  $sql.="  AND DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) <=" . $distance . " \n";         	
         } 
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHJ.ID IN (SELECT DBS.SHELTER_ID FROM DOG_BREEDS_BY_SHELTER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }         
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      public function selAreasEstadisticasDeShelters(){
      	$conexion=$this->conectarse();
      	$sql="SELECT DISTINCT \n";
      	$sql.="  STATISTICAL_AREA  \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_UK  SHJ \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  STATISTICAL_AREA  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($prefecture);
      	$filas = array();
      	while ($stm->fetch()) {
      		$filas[]=$prefecture;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }    

      public function selCountriesDeShelters(){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  ADMINISTRATIVE_AREA_LEVEL_1,  \n";
      	$sql.="  COUNT(*)  \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_UK   \n";
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