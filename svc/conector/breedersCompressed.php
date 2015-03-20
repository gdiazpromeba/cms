<?php
  require_once '../../config.php';

  require_once $GLOBALS['pathCms'] . '/svc/impl/BreedersUsaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/BreedersCanadaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/BreedersUkSvcImpl.php';

  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");
  
  
  if ($ultimo=='selDogBreedsByBreederAreas'){
  	$country=$_REQUEST['country'];
  	$area1=$_REQUEST['area1'];
  
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  DOG_BREED_NAME, \n";
  			$sql.= "  NAME_ENCODED \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_USA BR ON  X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			$area1TypeName="State";
  			$area2TypeName="County";  			
  			break;
  		case "canada":
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  DOG_BREED_NAME, \n";
  			$sql.= "  NAME_ENCODED \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_CANADA BR ON X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Canada";
  			$area1TypeName="Province";
  			$area2TypeName="Subdivision";  			
  			break;
  		case "uk":
 			$sql= "SELECT  DISTINCT \n";
  			$sql.= "  DOG_BREED_NAME, \n";
  			$sql.= "  NAME_ENCODED \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_UK BR ON X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United Kingdom";
  			$area1TypeName="Province";
  			$area2TypeName="Subdivision";  			
  			break;
  	} 
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($name, $nameEncoded);
  	$result=array();
  	$result["countryName"]=$countryName;
  	$result["area1TypeName"]=$area1TypeName;
  	$results["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["name"]=$name;
  		$fila["nameEncoded"]=$nameEncoded; 
  		$fila["url"] = $GLOBALS["dirWeb"] . "/breeders/sitemap/" . $country . "/" . urlencode($area1) . "/" .   $nameEncoded ;
  		$result["items"][]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);  	
  	 
 } elseif ($ultimo=='selDogBreedersByAreasAndBreed'){
  	$country=$_REQUEST['country'];
  	$area1=$_REQUEST['area1'];
  	$breedEncoded=$_REQUEST['breedEncoded'];
  
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$breedName=null;
  	switch ($country){
  		case "usa":
  			$sql= "SELECT  \n";
  			$sql.= "  BR.NAME, \n";
  			$sql.= "  BR.URL_ENCODED, \n";
  			$sql.= "  DB.DOG_BREED_NAME \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_USA BR ON  X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "  AND DB.NAME_ENCODED='" . $breedEncoded . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			$area1TypeName="State";
  			$area2TypeName="County";  			
  			break;
  		case "canada":
  			$sql= "SELECT  \n";
  			$sql.= "  BR.NAME, \n";
  			$sql.= "  BR.URL_ENCODED, \n";
  			$sql.= "  DB.DOG_BREED_NAME \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_CANADA BR ON  X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "  AND DB.NAME_ENCODED='" . $breedEncoded . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Canada";
  			$area1TypeName="Province";
  			$area2TypeName="Subdivision";  			
  			break;
  		case "uk":
  			$sql= "SELECT  \n";
  			$sql.= "  BR.NAME, \n";
  			$sql.= "  BR.URL_ENCODED, \n";
  			$sql.= "  DB.DOG_BREED_NAME \n";
  			$sql.= "FROM  \n";
  			$sql.= "  DOG_BREEDS DB  \n";
  			$sql.= "  INNER JOIN DOG_BREEDS_BY_BREEDER X ON X.DOG_BREED_ID = DB.DOG_BREED_ID   \n";
  			$sql.= "  INNER JOIN BREEDERS_UK BR ON  X.BREEDER_ID = BR.ID   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "  AND DB.NAME_ENCODED='" . $breedEncoded . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United Kingdom";
  			$area1TypeName="Country";
  			$area2TypeName="County";  
  			break;
  	} 
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($shelterName, $shelterNameEncoded, $dogBreedName);
  	$result=array();
  	$result["countryName"]=$countryName;
  	$result["area1TypeName"]=$area1TypeName;
  	$results["items"]=array();
  	while ($stm->fetch()) {
  		$result["dogBreedName"]=$dogBreedName;
  		$fila=array();
  		$fila["name"]=$shelterName;
  		$fila["nameEncoded"]=$shelterNameEncoded; 
  		$fila["url"] = $GLOBALS["dirWeb"] . "/breeders/info/" . $country . "/" .  $shelterNameEncoded ;
  		$result["items"][]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);  	
  	 
 }   
?>