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
  
  $v8 = new V8Js();

  /* basic.js */
  $JS = <<< EOT
  len = print('Hello' + ' ' + 'World!' + "\\n");
  len;
  EOT;

  try {
    var_dump($v8->executeString($JS, 'basic.js'));
  } catch (V8JsException $e) {
    var_dump($e);
  }

  if ($ultimo=='selSegundasAreas'){
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