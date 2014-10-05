<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/TextResourcesOad.php';
require_once $GLOBALS['pathCms'] . '/beans/TextResource.php';

   class TextResourcesOadImpl extends AOD implements TextResourcesOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  TEXT_RES_ID,     \n"; 
         $sql.="  TEXT_RES_KEY,     \n"; 
         $sql.="  TEXT_RESOURCE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  TEXT_RESOURCES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  TEXT_RES_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new TextResource();  
         $id=null;  
         $key=null;  
         $text=null;  
         $stm->bind_result($id, $key, $text); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setKey($key);
            $bean->setText($text);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorKey($key){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  TEXT_RES_ID,     \n"; 
         $sql.="  TEXT_RES_KEY,     \n"; 
         $sql.="  TEXT_RESOURCE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  TEXT_RESOURCES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  TEXT_RES_KEY='" . $key . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new TextResource();  
         $id=null;  
         $key=null;  
         $text=null;  
         $stm->bind_result($id, $key, $text); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setKey($key);
            $bean->setText($text);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      }       


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO TEXT_RESOURCES (   \n"; 
         $sql.="  TEXT_RES_ID,     \n"; 
         $sql.="  TEXT_RES_KEY,     \n"; 
         $sql.="  TEXT_RESOURCE)    \n"; 
         $sql.="VALUES (?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sss",$bean->getId(), $bean->getKey(), $bean->getText()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM TEXT_RESOURCES   \n"; 
         $sql.="WHERE TEXT_RES_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE TEXT_RESOURCES SET   \n"; 
         $sql.="  TEXT_RES_KEY=?,     \n"; 
         $sql.="  TEXT_RESOURCE=?     \n"; 
         $sql.="WHERE TEXT_RES_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sss", $bean->getKey(), $bean->getText(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($textOrPart, $keyOrPart, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  TEXT_RES_ID,     \n"; 
         $sql.="  TEXT_RES_KEY,     \n"; 
         $sql.="  TEXT_RESOURCE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  TEXT_RESOURCES  \n"; 
         $sql.="WHERE 1=1  \n"; 
         if (!empty($textOrPart)){
         	$sql.="  AND TEXT_RESOURCE LIKE '%" . $textOrPart . "%'  \n"; 
         }
         if (!empty($keyOrPart)){
         	$sql.="  AND TEXT_RES_KEY LIKE '%" . $keyOrPart . "%'  \n"; 
         }
         $sql.="ORDER BY  \n"; 
         $sql.="  TEXT_RES_KEY  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $key=null;  
         $text=null;  
         $stm->bind_result($id, $key, $text); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new TextResource();  
            $bean->setId($id);
            $bean->setKey($key);
            $bean->setText($text);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($textOrPart, $keyOrPart){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM TEXT_RESOURCES "; 
         $sql.="WHERE 1=1  \n"; 
         if (!empty($textOrPart)){
         	$sql.="  AND TEXT_RESOURCE LIKE '%" . $textOrPart . "%'  \n"; 
         }
         if (!empty($keyOrPart)){
         	$sql.="  AND TEXT_RES_KEY LIKE '%" . $keyOrPart . "%'  \n"; 
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