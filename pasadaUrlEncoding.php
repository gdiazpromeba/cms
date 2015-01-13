<?php
  require_once 'config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/util/UrlUtils.php';
  header("Content-Type: text/plain; charset=utf-8");
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");  
  
  //shelters
  //usa
  
  $selSql="SELECT ID, NAME FROM SHELTERS_USA";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_USA SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	//echo "antes " . $pic; 
  	$pic=UrlUtils::codifica($pic);
    $stmUpd->bind_param("ss", $pic, $fila["id"]);
    $stmUpd->execute();
  }
  
  //shelters
  //canada
  
  $selSql="SELECT ID, NAME FROM SHELTERS_CANADA";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_CANADA SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	//echo "antes " . $pic;
  	$pic=UrlUtils::codifica($pic);
  	$stmUpd->bind_param("ss", $pic, $fila["id"]);
  	$stmUpd->execute();
  }
  
  //shelters
  //UK
  
  $selSql="SELECT ID, NAME FROM SHELTERS_UK";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_UK SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	$pic=UrlUtils::codifica($pic);
  	$stmUpd->bind_param("ss", $pic, $fila["id"]);
  	$stmUpd->execute();
  }
  
  //shelters
  //India
  
  $selSql="SELECT ID, NAME FROM SHELTERS_INDIA";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_INDIA SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	//echo "antes " . $pic;
  	$pic=UrlUtils::codifica($pic);
  	$stmUpd->bind_param("ss", $pic, $fila["id"]);
  	$stmUpd->execute();
  }  
  
  
  //shelters
  //China
  
  $selSql="SELECT ID, NAME FROM SHELTERS_CHINA";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_CHINA SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	//echo "antes " . $pic;
  	$pic=UrlUtils::codifica($pic);
  	$stmUpd->bind_param("ss", $pic, $fila["id"]);
  	$stmUpd->execute();
  }  
  
  //shelters
  //Japan
  
  $selSql="SELECT ID, NAME FROM SHELTERS_JAPAN";
  $stmSel = $db_connection->prepare($selSql);
  $stmSel->execute();
  $arr=array();
  $stmSel->bind_result($id, $nombre);
  while ($stmSel->fetch()) {
  	$fila=array();
  	$fila["id"]=$id;
  	$fila["nombre"]=$nombre;
  	$arr[]=$fila;
  }
  $stmSel->close();
  
  $sqlUpd="UPDATE SHELTERS_JAPAN SET URL_ENCODED=? WHERE ID=? ";
  $stmUpd = $db_connection->prepare($sqlUpd);
  foreach ($arr as $fila ){
  	$pic=$fila["nombre"];
  	//echo "antes " . $pic;
  	$pic=UrlUtils::codifica($pic);
  	$stmUpd->bind_param("ss", $pic, $fila["id"]);
  	$stmUpd->execute();
  }
  
  
  
  
  
  $db_connection->close();
  
  
  return;
 
  
?>
