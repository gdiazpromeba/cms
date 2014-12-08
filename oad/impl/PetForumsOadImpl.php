<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/PetForumsOad.php';
require_once $GLOBALS['pathCms'] . '/beans/PetForum.php';

   class PetForumsOadImpl extends AOD implements PetForumsOad { 

      public function obtiene($encodedName){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  FORUM_ID,     \n"; 
         $sql.="  FORUM_NAME,     \n"; 
         $sql.="  ENCODED_NAME,     \n"; 
         $sql.="  FORUM_URL,     \n";
         $sql.="  PICTURE_URL,     \n";
         $sql.="  FORUM_DESCRIPTION,    \n"; 
         $sql.="  META_DESCRIPCION,    \n"; 
         $sql.="  META_KEYWORDS    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  PET_FORUMS  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  ENCODED_NAME='" . $encodedName . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new PetForum();  
         $stm->bind_result($id, $name, $encodedName,  $url, $pictureUrl, $description, $metaDescripcion, $metaKeywords); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
            $bean->setEncodedName($encodedName);
            $bean->setUrl($url);
            $bean->setPictureUrl($pictureUrl);
            $bean->setDescription($description);
            $bean->setMetaDescripcion($metaDescripcion);
            $bean->setMetaKeywords($metaKeywords);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO PET_FORUMS (   \n"; 
         $sql.="  FORUM_ID,     \n"; 
         $sql.="  FORUM_NAME,     \n"; 
         $sql.="  ENCODED_NAME,     \n"; 
         $sql.="  FORUM_URL,     \n";
         $sql.="  PICTURE_URL,     \n";
         $sql.="  FORUM_DESCRIPTION,     \n"; 
         $sql.="  META_DESCRIPCION,     \n";
         $sql.="  META_KEYWORDS     \n";
         $sql.=")VALUES (?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssss",$bean->getId(), $bean->getName(), $bean->getEncodedName(), $bean->getUrl(), $bean->getPictureUrl(),  $bean->getDescription(), $bean->getMetaDescripcion(), $bean->getMetaKeywords()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM PET_FORUMS   \n"; 
         $sql.="WHERE FORUM_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE PET_FORUMS SET   \n"; 
         $sql.="  FORUM_NAME=?,     \n"; 
         $sql.="  ENCODED_NAME=?,     \n"; 
         $sql.="  FORUM_URL=?,     \n";
         $sql.="  PICTURE_URL=?,     \n";
         $sql.="  FORUM_DESCRIPTION=?,     \n"; 
         $sql.="  META_DESCRIPCION=?,     \n"; 
         $sql.="  META_KEYWORDS=?     \n"; 
         $sql.="WHERE FORUM_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("ssssssss", $bean->getName(), $bean->getEncodedName(), $bean->getUrl(), $bean->getPictureUrl(), $bean->getDescription(), $bean->getMetaDescripcion(), $bean->getMetaKeywords(),
         $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($name, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  FORUM_ID,     \n"; 
         $sql.="  FORUM_NAME,     \n";
         $sql.="  ENCODED_NAME,     \n";
         $sql.="  FORUM_URL,     \n";
         $sql.="  PICTURE_URL,     \n";
         $sql.="  FORUM_DESCRIPTION,     \n"; 
         $sql.="  META_DESCRIPCION,     \n"; 
         $sql.="  META_KEYWORDS     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  PET_FORUMS  \n";
         $sql.="WHERE  \n";
         $sql.="  1=1  \n";
         if (!empty($title)){
         	$sql.="  AND UPPER(FORUM_NAME) LIKE '%" . strtoupper($name) . "%'  \n";
         }
         $sql.="ORDER BY  \n"; 
         $sql.="  FORUM_NAME ASC  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $name, $encodedName, $url, $pictureUrl, $description, $metaDescripcion, $metaKeywords); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new PetForum();  
            $bean->setId($id);
            $bean->setName($name);
            $bean->setEncodedName($encodedName);
            $bean->setUrl($url);
            $bean->setPictureUrl($pictureUrl);
            $bean->setDescription($description);
            $bean->setMetaDescripcion($metaDescripcion);
            $bean->setMetaKeywords($metaKeywords);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($name){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM PET_FORUMS ";
         $sql.="WHERE  \n";
         $sql.="  1=1  \n";
         if (!empty($title)){
         	$sql.="  AND UPPER(FORUM_NAME) LIKE '%" . strtoupper($name) . "%'  \n";
         }
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      public function selForumsByBreed($breedId){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  PEF.FORUM_ID,     \n"; 
         $sql.="  PEF.FORUM_NAME,     \n";
         $sql.="  PEF.ENCODED_NAME,     \n";
         $sql.="  PEF.FORUM_URL,     \n";
         $sql.="  PEF.PICTURE_URL,     \n";
         $sql.="  PEF.FORUM_DESCRIPTION,     \n"; 
         $sql.="  PEF.META_DESCRIPCION,     \n"; 
         $sql.="  PEF.META_KEYWORDS     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  PET_FORUMS  PEF \n";
         $sql.="  INNER JOIN DOG_BREEDS_BY_FORUM DBF ON DBF.FORUM_ID=PEF.FORUM_ID \n";
         $sql.="WHERE  \n";
         $sql.="  DBF.DOG_BREED_ID='"  . $breedId  ."' \n";
         $sql.="ORDER BY  \n"; 
         $sql.="  FORUM_NAME ASC  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $name, $encodedName, $url, $pictureUrl, $description, $metaDescripcion, $metaKeywords); 
         $filas = array(); 
         while ($stm->fetch()) { 
         	$arr=array();
         	$arr["id"]=$id;
         	$arr["name"]=$name;
         	$arr["encodedName"]=$encodedName;
         	$arr["url"]=$url;
         	$arr["pictureUrl"]=$pictureUrl;
         	$arr["description"]=$description;
         	$arr["metaDescripcion"]=$metaDescripcion;
         	$arr["metaKeywords"]=$metaKeywords;
            $filas[$id]=$arr; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      }       
      
      

   } 
?>