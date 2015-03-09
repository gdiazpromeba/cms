<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");  

  if ($ultimo=='selPrimerasAreasBreedersJson'){
  	$country=$_REQUEST['country'];
  
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_USA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			break;
  		case "canada":
  			$subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_CANADA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Canada";
  			break;
  		case "uk":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_UK  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United Kingdom";
  			break;
  	} 
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($firstArea, $amount);
  	$result=array();
  	$result["countryName"]=$countryName;
  	$result["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["label"]=$firstArea . "($amount)";
  		$fila["value"]=$firstArea;
  		$fila["urlEncoded"]= $GLOBALS["dirWeb"] . "/breeders/sitemap/" . $country . "/" . urlencode($firstArea) ;
  		$result["items"][]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);  

 }elseif ($ultimo=='selSegundasAreasBreedersJson'){
  	$country=$_REQUEST['country'];
  	$firstArea=$_REQUEST['firstArea'];
  	 
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_USA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			$area1TypeName="State";
  			$area2TypeName="County";
  			break;
  		case "canada":
  			$subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_CANADA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$area1TypeName="Province";
  			$countryName="Canada";
  			$area2TypeName="Subdivision";
  			break;
  		case "uk":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_UK  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
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
  	$stm->bind_result($secondArea, $amount);
    $result=array();
    $result["countryName"]=$countryName;
    $result["area1TypeName"]=$area1TypeName;
    $result["area2TypeName"]=$area2TypeName;
    $results["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["label"]=$secondArea . "($amount)";
  		$fila["value"]=$secondArea;
  		$fila["urlEncoded"]= $GLOBALS["dirWeb"] . "/breeders/sitemap/" . $country . "/" . urlencode($firstArea) . "/" .  $secondArea;
  		$result["items"][]=$fila;
  	}
  	
//   	if (isset($_REQUEST['addFirstAll']) && $_REQUEST['addFirstAll']=='true'){
//   		$fila=array();
//   		$fila["name"]="[Select]";
//   		$fila["value"]="";
//   		array_unshift (  $result["items"] ,$fila);
//   	}  	
  	
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);
  
  }elseif ($ultimo=='selPrimerasAreasSheltersJson'){
  	$country=$_REQUEST['country'];
  
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_USA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			break;
  		case "japan":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_JAPAN  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Japan";
  			break;
  		case "canada":
  			$subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CANADA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Canada";
  			break;
  		case "china":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CHINA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="China";
  			break;
  		case "india":
  			$subdivision="district";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_INDIA  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="India";
  			break;
  		case "uk":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_UK  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United Kingdom";
  			break;
  	}
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($firstArea, $amount);
  	$result=array();
  	$result["countryName"]=$countryName;
  	$results["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["label"]=$firstArea . "($amount)";
  		$fila["value"]=$firstArea;
  		$fila["urlEncoded"]= $GLOBALS["dirWeb"] . "/shelters/sitemap/" . $country . "/" . urlencode($firstArea) ;
  		$result["items"][]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);
  
  }elseif ($ultimo=='selSegundasAreasSheltersJson'){
  	$country=$_REQUEST['country'];
  	$firstArea=$_REQUEST['firstArea'];
  	 
  	$sql=null;
  	$subdivision=null;
  	$area1TypeName=null;
  	$area2TypeName=null;
  	switch ($country){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_USA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="the United States of America";
  			$area1TypeName="State";
  			$area2TypeName="County";
  			break;
  		case "japan":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_JAPAN  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="Japan";
  			$area1TypeName="Prefecture";
  			$area2TypeName="Locality";
  			break;
  		case "canada":
  			$subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CANADA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$area1TypeName="Province";
  			$countryName="Canada";
  			$area2TypeName="Subdivision";
  			break;
  		case "china":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CHINA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="China";
  			$area1TypeName="Province";
  			$area2TypeName="Locality";
  			break;
  		case "india":
  			$subdivision="district";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_INDIA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			$countryName="India";
  			$area1TypeName="State";
  			$area2TypeName="Locality";
  			break;
  		case "uk":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_UK  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
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
  	$stm->bind_result($secondArea, $amount);
    $result=array();
    $result["countryName"]=$countryName;
    $result["area1TypeName"]=$area1TypeName;
    $result["area2TypeName"]=$area2TypeName;
    $results["items"]=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["label"]=$secondArea . "($amount)";
  		$fila["value"]=$secondArea ;
  		$fila["urlEncoded"]= $GLOBALS["dirWeb"] . "/shelters/sitemap/" . $country . "/" . urlencode($firstArea) . "/" .  $secondArea;
  		$result["items"][]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);
  
  }else if ($ultimo=='selSegundasAreasShelters'){
  	$pais=$_REQUEST['country'];
  	$firstArea=$_REQUEST['firstArea'];
  	
  	$sql=null;
  	$subdivision=null;
  	switch ($pais){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_USA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "japan":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_JAPAN  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  	   case "canada":
  	   	    $subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CANADA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  	   case "china":
  	   	    $subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CHINA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;  					
  	   case "india":
  	   	    $subdivision="district";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_INDIA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  	   case "uk":
  	   	    $subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_UK  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  	}
  	
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($secondArea, $amount);
  	$html="<option value=''>Select " . $subdivision . "</option> \n";
  	while ($stm->fetch()) {
  		$label = $secondArea . "   (" . $amount . ")";
  		$html.="<option value='$secondArea'>$label</option> \n";
  	}
  	$stm->close();
  	$db_connection->close();
  	echo $html;
  
}else if ($ultimo=='selSegundasAreasBreeders'){
  	$pais=$_REQUEST['country'];
  	$firstArea=$_REQUEST['firstArea'];
  	 
  	$sql=null;
  	$subdivision=null;
  	switch ($pais){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_USA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "japan":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_JAPAN  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "canada":
  			$subdivision="subdivision";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_CANADA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "china":
  			$subdivision="locality";
  			$sql= "SELECT  \n";
  			$sql.= "  LOCALITY, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_CHINA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "india":
  			$subdivision="district";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_INDIA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  		case "uk":
  			$subdivision="county";
  			$sql= "SELECT  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2, \n";
  			$sql.= "  COUNT(*) \n";
  			$sql.= "FROM  \n";
  			$sql.= "  BREEDERS_UK  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			$sql.= "GROUP BY 1 \n";
  			$sql.= "ORDER BY 1  \n";
  			break;
  	}
  	 
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($secondArea, $amount);
  	$html="<option value=''>Select " . $subdivision . "</option> \n";
  	while ($stm->fetch()) {
  		$label = $secondArea . "   (" . $amount . ")";
  		$html.="<option value='$secondArea'>$label</option> \n";
  	}
  	$stm->close();
  	$db_connection->close();
  	echo $html;
  }

?>