<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUsaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersCanadaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersChinaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersIndiaSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUkSvcImpl.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersJapanSvcImpl.php';
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

   
  
      $country=$_REQUEST["country"];
      switch ($country){
      	case "usa":
      	  $svc = new SheltersUsaSvcImpl();
      	  break;
       case "uk":
      	  $svc = new SheltersUkSvcImpl();
      	  break;
       case "china":
      	  $svc = new SheltersChinaSvcImpl();
      	  break;
       case "india":
      	  $svc = new SheltersIndiaSvcImpl();
      	  break;
       case "japan":
      	  $svc = new SheltersJapanSvcImpl();
      	  break;
       case "canada":
      	  $svc = new SheltersCanadaSvcImpl();
      	  break;
      }
   	  
   	  
   	  
   	  
   	  $beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 10000);
   	  $cuenta=$svc->selTodosCuenta(null, null, null, 0, 0, null, null, 0, 10000);
   	  
   	  
   	  $datos=array();
   	  foreach ($beans as $bean){
   	  	$area1 = $bean->getAdminArea1();
   	  	$area2 = $bean->getAdminArea2();
   	  	$name = $bean->getName();
   	  	$url  = $bean->getUrlEncoded(); 
   	  	
   	  	if (!isset($datos[$area1])){
   	  		$datos[$area1]=array();
   	  	}
   	  	if (!isset($datos[$area1][$area2])){
   	  		$datos[$area1][$area2]=array();
   	  	}
   	  	
   	    $item=array();
   	    $item["name"]=$name;
   	    $urlCompleta =$GLOBALS["dirWeb"] . "/shelters/info/" . $country . "/" .  $url;
   	    $item["url"]=$urlCompleta ;
   	    $datos[$area1][$area2][]=$item;
   	  }
   	  
   	  //ordeno las segundas áreas dentro de cada área
   	  foreach(array_keys($datos) as $key){
   	  	ksort($datos[$key]);
   	  }
   	  //ordeno las primeras áreas
   	  ksort($datos);
   	  
   	  $res=array("firstAreas" => array());
   	  $indexFA=0;
   	  foreach ($datos as $key=>$value){
   	  	//construir la base de las firstAreas
   	  	$firstArea=array();
   	  	$firstAreaName = $key;
   	  	$firstArea["name"]=$firstAreaName;
   	  	$firstArea["collapsed"]=true;
   	  	$firstArea["index"]=$indexFA++;
   	  	$firstArea["secondAreas"]=array();
   	  	
   	  	//lenar los items de "secondAreas"
   	  	$indexSA=0;
   	  	foreach ($datos[$firstAreaName] as $key=>$value ){
   	  		$secondArea=array();
   	  		$secondAreaName = $key;
   	  		$secondArea["name"]=$secondAreaName;
   	  		$secondArea["collapsed"]=true;
   	  		$secondArea["index"]=$indexSA++;
   	  		$secondArea["items"]=array();
   	  		
   	  		
   	  		//llenar los items de la secondArea
   	  		foreach ($datos[$firstAreaName][$secondAreaName] as $itemDatos ){
   	  			$item=array();
   	  			$item["name"]=$itemDatos["name"];
   	  			$item["url"]=$itemDatos["url"];
   	  			$secondArea["items"][]=$item;
   	  		}
   	  		
   	  		$firstArea["secondAreas"][]=$secondArea;
   	  	}
   	  	$res["firstAreas"][]=$firstArea;

   	  }
   	  
   	  
   	  echo json_encode($res) ;
   	    

    

?>