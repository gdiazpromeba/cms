<?php
  require_once '../../config.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ZipGenerico.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");  

  if ($ultimo=='selSegundasAreas'){
  	$pais=$_REQUEST['country'];
  	$firstArea=$_REQUEST['firstArea'];
  	
  	$sql=null;
  	$subdivision=null;
  	switch ($pais){
  		case "usa":
  			$subdivision="county";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2 \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_USA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;
  		case "japan":
  			$subdivision="locality";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  LOCALITY \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_JAPAN  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;
  	   case "canada":
  	   	    $subdivision="subdivision";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2 \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CANADA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;
  	   case "china":
  	   	    $subdivision="locality";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  LOCALITY \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_CHINA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;  					
  	   case "india":
  	   	    $subdivision="district";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2 \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_INDIA  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;
  	   case "uk":
  	   	    $subdivision="county";
  			$sql= "SELECT DISTINCT \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_2 \n";
  			$sql.= "FROM  \n";
  			$sql.= "  SHELTERS_UK  \n";
  			$sql.= "WHERE  \n";
  			$sql.= "  ADMINISTRATIVE_AREA_LEVEL_1='" . $firstArea . "'  \n";
  			break;
  	}
  	
  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($secondArea);
  	$html="<option value=''>Select " . $subdivision . "</option> \n";
  	while ($stm->fetch()) {
  		$html.="<option value='$secondArea'>$secondArea</option> \n";
  	}
  	$stm->close();
  	$db_connection->close();
  	echo $html;
  }

?>