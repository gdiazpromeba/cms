<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/NewsOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/News.php';

   class NewsOadImpl extends AOD implements NewsOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  NEWS_ID,     \n"; 
         $sql.="  NEWS_TITLE,     \n"; 
         $sql.="  URL_ENCODED,     \n";
         $sql.="  NEWS_TEXT,     \n"; 
         $sql.="  NEWS_SOURCE,     \n"; 
         $sql.="  NEWS_DATE,    \n"; 
         $sql.="  CUT_POSITION    \n";
         $sql.="FROM  \n"; 
         $sql.="  NEWS  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  NEWS_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new News();  
         $id=null;  
         $newsTitle=null;  
         $urlEncoded=null;
         $newsText=null;  
         $newsSource=null;  
         $newsDate=null;
         $cutPosition=null;
         $stm->bind_result($id, $newsTitle, $urlEncoded, $newsText, $newsSource, $newsDate, $cutPosition); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNewsTitle($newsTitle);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setNewsText($newsText);
            $bean->setNewsSource($newsSource);
            $bean->setNewsDateLarga($newsDate);
            $bean->setCutPosition($cutPosition);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorUrlEncoded($urlEncoded){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  NEWS_ID,     \n";
      	$sql.="  NEWS_TITLE,     \n";
      	$sql.="  URL_ENCODED,     \n";
      	$sql.="  NEWS_TEXT,     \n";
      	$sql.="  NEWS_SOURCE,     \n";
      	$sql.="  NEWS_DATE,    \n";
      	$sql.="  CUT_POSITION    \n";
      	$sql.="FROM  \n";
      	$sql.="  NEWS  \n";
      	$sql.="WHERE  \n";
      	$sql.="  URL_ENCODED='" . $urlEncoded . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new News();
      	$id=null;
      	$newsTitle=null;
      	$urlEncoded=null;
      	$newsText=null;
      	$newsSource=null;
      	$newsDate=null;
      	$cutPosition=null;
      	$stm->bind_result($id, $newsTitle, $urlEncoded, $newsText, $newsSource, $newsDate, $cutPosition);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNewsTitle($newsTitle);
      		$bean->setUrlEncoded($urlEncoded);
      		$bean->setNewsText($newsText);
      		$bean->setNewsSource($newsSource);
      		$bean->setNewsDateLarga($newsDate);
      		$bean->setCutPosition($cutPosition);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO NEWS (   \n"; 
         $sql.="  NEWS_ID,     \n"; 
         $sql.="  NEWS_TITLE,     \n"; 
         $sql.="  URL_ENCODED,     \n";
         $sql.="  NEWS_TEXT,     \n"; 
         $sql.="  NEWS_SOURCE,     \n"; 
         $sql.="  NEWS_DATE,     \n";
         $sql.="  CUT_POSITION     \n";
         $sql.=")VALUES (?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssd",$bean->getId(), $bean->getNewsTitle(), $bean->getUrlEncoded(), $bean->getNewsText(), $bean->getNewsSource(), $bean->getNewsDateLarga(), $bean->getCutPosition()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM NEWS   \n"; 
         $sql.="WHERE NEWS_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE NEWS SET   \n"; 
         $sql.="  NEWS_TITLE=?,     \n"; 
         $sql.="  URL_ENCODED=?,     \n";
         $sql.="  NEWS_TEXT=?,     \n"; 
         $sql.="  NEWS_SOURCE=?,     \n"; 
         $sql.="  NEWS_DATE=?,     \n";
         $sql.="  CUT_POSITION=?     \n";
         $sql.="WHERE NEWS_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssds", $bean->getNewsTitle(), $bean->getUrlEncoded(), $bean->getNewsText(), $bean->getNewsSource(), $bean->getNewsDateLarga(), $bean->getCutPosition(), $bean->getId()); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($title, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  NEWS_ID,     \n"; 
         $sql.="  NEWS_TITLE,     \n";
         $sql.="  URL_ENCODED,     \n";
         $sql.="  NEWS_TEXT,     \n"; 
         $sql.="  NEWS_SOURCE,     \n"; 
         $sql.="  NEWS_DATE,   \n";
         $sql.="  CUT_POSITION   \n";
         $sql.="FROM  \n"; 
         $sql.="  NEWS  \n";
         $sql.="WHERE  \n";
         $sql.="  1=1  \n";
         if (!empty($title)){
         	$sql.="  AND UPPER(NEWS_TITLE) LIKE '%" . strtoupper($title) . "%'  \n";
         }
         $sql.="ORDER BY  \n"; 
         $sql.="  NEWS_DATE DESC  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $newsTitle=null;
         $urlEncoded=null;
         $newsText=null;  
         $newsSource=null;  
         $newsDate=null;  
         $cutPosition=null;
         $stm->bind_result($id, $newsTitle, $urlEncoded, $newsText, $newsSource, $newsDate, $cutPosition); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new News();  
            $bean->setId($id);
            $bean->setNewsTitle($newsTitle);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setNewsText($newsText);
            $bean->setNewsSource($newsSource);
            $bean->setNewsDateLarga($newsDate);
            $bean->setCutPosition($cutPosition);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($title){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM NEWS ";
         $sql.="WHERE  \n";
         $sql.="  1=1  \n";
         if (!empty($title)){
         	$sql.="  AND UPPER(NEWS_TITLE) LIKE '%" . strtoupper($title) . "%'  \n";
         }
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 

   } 
?>