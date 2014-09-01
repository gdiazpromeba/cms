<?php 

require_once '../../config.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/VideosOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/Video.php';

   class VideosOadImpl extends AOD implements VideosOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  VIDEO_ID,     \n"; 
         $sql.="  VIDEO_TITLE,     \n"; 
         $sql.="  VIDEO_URL,     \n"; 
         $sql.="  VIDEO_TAGS    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  VIDEOS  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  VIDEO_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new Video();  
         $id=null;  
         $videoTitle=null;  
         $videoUrl=null;  
         $videoTags=null;  
         $stm->bind_result($id, $videoTitle, $videoUrl, $videoTags); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setVideoTitle($videoTitle);
            $bean->setVideoUrl($videoUrl);
            $bean->setVideoTags($videoTags);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO VIDEOS (   \n"; 
         $sql.="  VIDEO_ID,     \n"; 
         $sql.="  VIDEO_TITLE,     \n"; 
         $sql.="  VIDEO_URL,     \n"; 
         $sql.="  VIDEO_TAGS)    \n"; 
         $sql.="VALUES (?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssss",$bean->getId(), $bean->getVideoTitle(), $bean->getVideoUrl(), $bean->getVideoTags()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM VIDEOS   \n"; 
         $sql.="WHERE VIDEO_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE VIDEOS SET   \n"; 
         $sql.="  VIDEO_TITLE=?,     \n"; 
         $sql.="  VIDEO_URL=?,     \n"; 
         $sql.="  VIDEO_TAGS=?     \n"; 
         $sql.="WHERE VIDEO_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssss", $bean->getVideoTitle(), $bean->getVideoUrl(), $bean->getVideoTags(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  VIDEO_ID,     \n"; 
         $sql.="  VIDEO_TITLE,     \n"; 
         $sql.="  VIDEO_URL,     \n"; 
         $sql.="  VIDEO_TAGS    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  VIDEOS  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  VIDEO_ID  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $videoTitle=null;  
         $videoUrl=null;  
         $videoTags=null;  
         $stm->bind_result($id, $videoTitle, $videoUrl, $videoTags); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new Video();  
            $bean->setId($id);
            $bean->setVideoTitle($videoTitle);
            $bean->setVideoUrl($videoUrl);
            $bean->setVideoTags($videoTags);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM VIDEOS "; 
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