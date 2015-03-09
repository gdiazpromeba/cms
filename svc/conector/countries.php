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

  
  	$sql="select distinct c.country, c.capital from countries c order by 1";

  	

  	if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  	}
  	$stm->execute();
  	$stm->bind_result($name, $code);
  	$result=array();
 
  	$result=array();
  	while ($stm->fetch()) {
  		$fila=array();
  		$fila["country"]=$name;
  		$fila["capital"]=$code;
  		$result[]=$fila;
  	}
  	$stm->close();
  	$db_connection->close();
  	echo json_encode($result);  

?>