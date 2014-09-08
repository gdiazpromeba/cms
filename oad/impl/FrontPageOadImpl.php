<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/FrontPageOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/FrontPage.php';

   class FrontPageOadImpl extends AOD implements FrontPageOad { 

      public function obtiene(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  FP.NEWS_1_ID,     \n"; 
         $sql.="  FP.NEWS_2_ID,     \n"; 
         $sql.="  FP.NEWS_3_ID,     \n"; 
         $sql.="  FP.NEWS_4_ID,     \n"; 
         $sql.="  FP.NEWS_1_CUT,     \n"; 
         $sql.="  FP.NEWS_2_CUT,     \n"; 
         $sql.="  FP.NEWS_3_CUT,     \n"; 
         $sql.="  FP.NEWS_4_CUT,     \n"; 
         $sql.="  N1.NEWS_TITLE AS NEWS_1_TITLE,     \n"; 
         $sql.="  N2.NEWS_TITLE AS NEWS_2_TITLE,     \n"; 
         $sql.="  N3.NEWS_TITLE AS NEWS_3_TITLE,     \n"; 
         $sql.="  N4.NEWS_TITLE AS NEWS_4_TITLE,     \n"; 
         $sql.="  N1.NEWS_SOURCE AS NEWS_1_SOURCE,     \n";
         $sql.="  N2.NEWS_SOURCE AS NEWS_2_SOURCE,     \n";
         $sql.="  N3.NEWS_SOURCE AS NEWS_3_SOURCE,     \n";
         $sql.="  N4.NEWS_SOURCE AS NEWS_4_SOURCE,     \n";
         $sql.="  N1.NEWS_TEXT AS NEWS_1_TEXT,     \n";
         $sql.="  N2.NEWS_TEXT AS NEWS_2_TEXT,     \n";
         $sql.="  N3.NEWS_TEXT AS NEWS_3_TEXT,     \n";
         $sql.="  N4.NEWS_TEXT AS NEWS_4_TEXT,     \n";         
         $sql.="  FP.VIDEO_1_ID,     \n"; 
         $sql.="  FP.VIDEO_2_ID,     \n"; 
         $sql.="  FP.VIDEO_3_ID,     \n"; 
         $sql.="  V1.VIDEO_TITLE AS VIDEO_1_TITLE,     \n"; 
         $sql.="  V2.VIDEO_TITLE AS VIDEO_2_TITLE,     \n"; 
         $sql.="  V3.VIDEO_TITLE AS VIDEO_3_TITLE,     \n"; 
         $sql.="  FP.DOG_BREED_1_ID,     \n"; 
         $sql.="  FP.DOG_BREED_2_ID,     \n"; 
         $sql.="  FP.DOG_BREED_3_ID,     \n"; 
         $sql.="  D1.DOG_BREED_NAME AS DOG_BREED_1_NAME,     \n"; 
         $sql.="  D2.DOG_BREED_NAME AS DOG_BREED_2_NAME,     \n"; 
         $sql.="  D3.DOG_BREED_NAME AS DOG_BREED_3_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  FRONT_PAGE FP  \n"; 
         $sql.="  LEFT JOIN NEWS N1 ON FP.NEWS_1_ID = N1.NEWS_ID  \n";
         $sql.="  LEFT JOIN NEWS N2 ON FP.NEWS_2_ID = N2.NEWS_ID  \n";
         $sql.="  LEFT JOIN NEWS N3 ON FP.NEWS_3_ID = N3.NEWS_ID  \n";
         $sql.="  LEFT JOIN NEWS N4 ON FP.NEWS_4_ID = N4.NEWS_ID  \n";
         $sql.="  LEFT JOIN VIDEOS V1 ON FP.VIDEO_1_ID = V1.VIDEO_ID  \n";
         $sql.="  LEFT JOIN VIDEOS V2 ON FP.VIDEO_2_ID = V2.VIDEO_ID  \n";         
         $sql.="  LEFT JOIN VIDEOS V3 ON FP.VIDEO_3_ID = V3.VIDEO_ID  \n";         
         $sql.="  LEFT JOIN DOG_BREEDS D1 ON FP.DOG_BREED_1_ID = D1.DOG_BREED_ID  \n";
         $sql.="  LEFT JOIN DOG_BREEDS D2 ON FP.DOG_BREED_2_ID = D2.DOG_BREED_ID  \n";
         $sql.="  LEFT JOIN DOG_BREEDS D3 ON FP.DOG_BREED_3_ID = D3.DOG_BREED_ID  \n";
          
         
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new FrontPage();  
         $news1Id=null;  
         $news2Id=null;  
         $news3Id=null;  
         $news4Id=null;  
         $news1Cut=null; $news2Cut=null; $news3Cut=null; $news4Cut=null;  
         $news1Title=null; $news2Title=null; $news3Title=null; $news4Title=null;
         $news1Source=null; $news1Source=null; $news1Source=null; $news1Source=null;
         $news1Text=null; $news2Text=null; $news3Text=null; $news4Text=null;
         $video1Id=null;  $video2Id=null;  $video3Id=null;  
         $video1Title=null; $video2Title=null; $video3Title=null;   
         $dogBreed1Id=null;  
         $dogBreed2Id=null;  
         $dogBreed3Id=null;  
         $dogBreed1Name=null;  
         $dogBreed2Name=null;  
         $dogBreed3Name=null;  
         $stm->bind_result($news1Id, $news2Id, $news3Id, $news4Id, $news1Cut, $news2Cut, $news3Cut, $news4Cut, 
         		$news1Title, $news2Title, $news3Title, $news4Title, 
         		$news1Source, $news2Source, $news3Source, $news4Source,
         		$news1Text, $news2Text, $news3Text, $news4Text,
         		$video1Id, $video2Id, $video3Id, $video1Title, $video2Title, $video3Title, 
         		$dogBreed1Id, $dogBreed2Id, $dogBreed3Id, $dogBreed1Name, $dogBreed2Name, $dogBreed3Name); 
         if ($stm->fetch()) { 
            $bean->setNews1Id($news1Id);
            $bean->setNews2Id($news2Id);
            $bean->setNews3Id($news3Id);
            $bean->setNews4Id($news4Id);
            $bean->setNews1Cut($news1Cut);
            $bean->setNews2Cut($news2Cut);
            $bean->setNews3Cut($news3Cut);
            $bean->setNews4Cut($news4Cut);
            
            $bean->setNews1Title($news1Title);
            $bean->setNews2Title($news2Title);
            $bean->setNews3Title($news3Title);
            $bean->setNews4Title($news4Title);

            $bean->setNews1Source($news1Source);
            $bean->setNews2Source($news2Source);
            $bean->setNews3Source($news3Source);
            $bean->setNews4Source($news4Source);
            
            
            $bean->setNews1Text($news1Text);
            $bean->setNews2Text($news2Text);
            $bean->setNews3Text($news3Text);
            $bean->setNews4Text($news4Text);
            $bean->setVideo1Id($video1Id);
            $bean->setVideo2Id($video2Id);
            $bean->setVideo3Id($video3Id);
            $bean->setVideo1Title($video1Title);
            $bean->setVideo2Title($video2Title);
            $bean->setVideo3Title($video3Title);
            $bean->setDogBreed1Id($dogBreed1Id);
            $bean->setDogBreed2Id($dogBreed2Id);
            $bean->setDogBreed3Id($dogBreed3Id);
            $bean->setDogBreed1Name($dogBreed1Name);
            $bean->setDogBreed2Name($dogBreed2Name);
            $bean->setDogBreed3Name($dogBreed3Name);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE FRONT_PAGE SET   \n";
         $sql.="  NEWS_1_ID=?,     \n";
         $sql.="  NEWS_2_ID=?,     \n"; 
         $sql.="  NEWS_3_ID=?,     \n"; 
         $sql.="  NEWS_4_ID=?,     \n"; 
         $sql.="  NEWS_1_CUT=?,     \n"; 
         $sql.="  NEWS_2_CUT=?,     \n"; 
         $sql.="  NEWS_3_CUT=?,     \n"; 
         $sql.="  NEWS_4_CUT=?,     \n"; 
         $sql.="  VIDEO_1_ID=?,     \n"; 
         $sql.="  VIDEO_2_ID=?,     \n"; 
         $sql.="  VIDEO_3_ID=?,     \n"; 
         $sql.="  DOG_BREED_1_ID=?,     \n"; 
         $sql.="  DOG_BREED_2_ID=?,     \n"; 
         $sql.="  DOG_BREED_3_ID=?     \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssssddddssssss", 
         		   $bean->getNews1Id(), $bean->getNews2Id(), $bean->getNews3Id(), $bean->getNews4Id(), 
         		   $bean->getNews1Cut(), $bean->getNews2Cut(), $bean->getNews3Cut(), $bean->getNews4Cut(), 
         		   $bean->getVideo1Id(), $bean->getVideo2Id(), $bean->getVideo3Id(), 
         		   $bean->getDogBreed1Id(), $bean->getDogBreed2Id(), $bean->getDogBreed3Id()
         		); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


   } 
?>