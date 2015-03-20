<?php
  require_once '../../config.php';


  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");
  
  

  	$country=$_REQUEST['country'];
  	$area1=$_REQUEST['area1'];
  
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_USA BR   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			$area1TypeName="State";
  			$area2TypeName="County";  			
  			break;
  		case "canada":
  			$sql= "SELECT DISTINCT \n";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CANADA BR   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Canada";
  			$area1TypeName="Province";
  			$area2TypeName="Subdivision";  			
  			break;
  		case "uk":
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_UK BR   \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United Kingdom";
  			$area1TypeName="Province";
  			$area2TypeName="Subdivision";  			
  			break;
		case "india" :
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_INDIA BR   \n";
			$sql .= "WHERE  \n";
			$sql .= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
			$sql .= "ORDER BY 1  \n";
			$countryName = "India";
			$area1TypeName = "State";
			$area2TypeName = "District";
			break;
		case "china" :
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CHINA BR   \n";
			$sql .= "WHERE  \n";
			$sql .= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
			$sql .= "ORDER BY 1  \n";
			$countryName = "China";
			$area1TypeName = "Province";
			$area2TypeName = "Locality";
			break;
		case "japan" :
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  NAME, \n";
  			$sql.= "  URL_ENCODED, \n";
  			$sql.= "  LOGO_URL, \n";
  			$sql.= "  DESCRIPTION \n";
			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_JAPAN BR   \n";
			$sql .= "WHERE  \n";
			$sql .= "  BR.ADMINISTRATIVE_AREA_LEVEL_1='" . $area1 . "'  \n";
			$sql .= "ORDER BY 1  \n";
			$countryName = "Japan";
			$area1TypeName = "Prefecture";
			$area2TypeName = "Locality";
			break;							
  	} 
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($name, $nameEncoded, $logoUrl, $description);
  	$result=array();
  	$result["countryName"]=$countryName;
  	$result["area1TypeName"]=$area1TypeName;
  	$result["area2TypeName"]=$area2TypeName;
  	$results["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["name"]=$name;
  		$fila["nameEncoded"]=$nameEncoded; 
  		$fila["url"] = $GLOBALS["dirWeb"] . "/shelters/info/" . $country . "/" . $nameEncoded ;
  		$fila["pitcureUrl"] = $GLOBALS["dirAplicacion"] . "/resources/images/shelterLogos/" . $country . "/" . $logoUrl ;
  		$fila["description"] = $description ;
  		$result["items"][] = $fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);  	
  	 
 
?>