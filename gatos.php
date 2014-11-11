<?php
  require_once 'config.php';
  require_once $GLOBALS['pathCms'] . '/beans/ZipGenerico.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/ZipsGenericoSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");
//   require_once('FirePHPCore/fb.php4'); 
  
  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);
  
  $db_connection = new mysqli("localhost", $GLOBALS['usuario'] , $GLOBALS['clave'] , $GLOBALS['baseDeDatos']);
  $db_connection->set_charset("utf8");  
  
  

  $fh = fopen("gatos.csv", 'r') or die("can't open file");
  $sql="INSERT INTO CAT_BREEDS VALUES (?, ?)";
  if (!$stm = $db_connection->prepare($sql)){
  		echo $db_connection->error;
  		exit();
  }

  
  

  if ($fh) {
    while (($line = fgets($fh)) !== false) {
        $stm->bind_param("ss", idUnico(), $line);
        $stm->execute();
    }
    $stm->close();
  } else {
    echo "error al abrir el archivo";
  } 
  fclose($fh);


  function idUnico(){
      // no prefix
      // works only in PHP 5 and later versions
      $token = md5(uniqid());

      // better, difficult to guess
      $better_token = md5(uniqid(mt_rand(), true));
	  return $better_token;
  }  
  
?>
