<?php
  require_once '../../config.php';
  require_once $GLOBALS['pathCms'] . '/beans/FrontPage.php';
  require_once $GLOBALS['pathCms'] . '/svc/impl/FrontPageSvcImpl.php';
  
  //require_once('FirePHPCore/fb.php4');
  
  
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='obtiene'){

		$svc = new FrontPageSvcImpl();
		$bean=$svc->obtiene();
		
		$arrBean=array();
		$arrBean['news1Id']=$bean->getNews1Id();
		$arrBean['news1Title']=$bean->getNews1Title();
		$arrBean['news1UrlEncoded']=$bean->getNews1UrlEncoded();
		$arrBean['news1Source']=$bean->getNews1Source();
		$arrBean['news1Text']=$bean->getNews1Text();
		$arrBean['news1Cut']=$bean->getNews1Cut();
		
		$arrBean['news2Id']=$bean->getNews2Id();
		$arrBean['news2Title']=$bean->getNews2Title();
		$arrBean['news2UrlEncoded']=$bean->getNews2UrlEncoded();
		$arrBean['news2Source']=$bean->getNews2Source();
		$arrBean['news2Text']=$bean->getNews2Text();
		$arrBean['news2Cut']=$bean->getNews2Cut();
		
		$arrBean['news3Id']=$bean->getNews3Id();
		$arrBean['news3Title']=$bean->getNews3Title();
		$arrBean['news3UrlEncoded']=$bean->getNews3UrlEncoded();
		$arrBean['news3Source']=$bean->getNews3Source();
		$arrBean['news3Text']=$bean->getNews3Text();
		$arrBean['news3Cut']=$bean->getNews3Cut();
		
		$arrBean['news4Id']=$bean->getNews4Id();
		$arrBean['news4Title']=$bean->getNews4Title();
		$arrBean['news4UrlEncoded']=$bean->getNews4UrlEncoded();
		$arrBean['news4Source']=$bean->getNews4Source();
		$arrBean['news4Text']=$bean->getNews4Text();
		$arrBean['news4Cut']=$bean->getNews4Cut();
		
		$arrBean['video1Id']=$bean->getVideo1Id();
		$arrBean['video1Title']=$bean->getVideo1Title();
		$arrBean['video2Id']=$bean->getVideo2Id();
		$arrBean['video2Title']=$bean->getVideo2Title();
		$arrBean['video3Id']=$bean->getVideo3Id();
		$arrBean['video3Title']=$bean->getVideo3Title();

		$arrBean['dogBreed1Id']=$bean->getDogBreed1Id();
		$arrBean['dogBreed1Name']=$bean->getDogBreed1Name();
		$arrBean['dogBreed1Picture']=$bean->getDogBreed1Picture();
		$arrBean['dogBreed2Id']=$bean->getDogBreed2Id();
		$arrBean['dogBreed2Name']=$bean->getDogBreed2Name();
		$arrBean['dogBreed2Picture']=$bean->getDogBreed2Picture();
		$arrBean['dogBreed3Id']=$bean->getDogBreed3Id();
		$arrBean['dogBreed3Name']=$bean->getDogBreed3Name();
		$arrBean['dogBreed3Picture']=$bean->getDogBreed3Picture();
		
		echo json_encode($arrBean) ;

 
  } else if ($ultimo=='actualiza'){
  	$bean=new FrontPage(); 
	$svc = new FrontPageSvcImpl();
	
	$news1Id=null; if (isset($_REQUEST['news1Id'])) $news1Id=$_REQUEST['news1Id'];
	$news2Id=null; if (isset($_REQUEST['news2Id'])) $news1Id=$_REQUEST['news2Id'];
	$news3Id=null; if (isset($_REQUEST['news3Id'])) $news1Id=$_REQUEST['news3Id'];
	$news4Id=null; if (isset($_REQUEST['news4Id'])) $news1Id=$_REQUEST['news4Id'];
	$news1Cut=null; if (isset($_REQUEST['news1Cut'])) $news1Id=$_REQUEST['news1Cut'];
	$news2Cut=null; if (isset($_REQUEST['news2Cut'])) $news1Id=$_REQUEST['news2Cut'];
	$news3Cut=null; if (isset($_REQUEST['news3Cut'])) $news1Id=$_REQUEST['news3Cut'];
	$news4Cut=null; if (isset($_REQUEST['news4Cut'])) $news1Id=$_REQUEST['news4Cut'];
	
	$video1Id=$_REQUEST['video1Id'];
	$video2Id=$_REQUEST['video2Id'];
	$video3Id=$_REQUEST['video3Id'];
	
	$dogBreed1Id=$_REQUEST['dogBreed1Id'];
	$dogBreed2Id=$_REQUEST['dogBreed2Id'];
	$dogBreed3Id=$_REQUEST['dogBreed3Id'];
	
    $bean->setNews1Id($_REQUEST['news1Id']); $bean->setNews1Cut($_REQUEST['cutPosition1']);
    $bean->setNews2Id($_REQUEST['news2Id']); $bean->setNews2Cut($_REQUEST['cutPosition2']);
    $bean->setNews3Id($_REQUEST['news3Id']); $bean->setNews3Cut($_REQUEST['cutPosition3']);
    $bean->setNews4Id($_REQUEST['news4Id']); $bean->setNews4Cut($_REQUEST['cutPosition4']);
    
    $bean->setVideo1Id($_REQUEST['video1Id']); 
    $bean->setVideo2Id($_REQUEST['video2Id']);
    $bean->setVideo3Id($_REQUEST['video3Id']);
    
    $bean->setDogBreed1Id($_REQUEST['dogBreed1Id']);
    $bean->setDogBreed2Id($_REQUEST['dogBreed2Id']);
    $bean->setDogBreed3Id($_REQUEST['dogBreed3Id']);
  	$exito=$svc->actualiza($bean);
	echo json_encode($exito) ;	

  }    

?>