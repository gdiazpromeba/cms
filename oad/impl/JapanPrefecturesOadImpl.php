<?php 

require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/JapanPrefecturesOad.php';
require_once $GLOBALS['pathCms'] . '/beans/JapanPrefecture.php';

   class JapanPrefecturesOadImpl extends AOD implements JapanPrefecturesOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  PREFECTURE_ID,     \n"; 
         $sql.="  PREFECTURE_NAME     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  JAPAN_PREFECTURES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  PREFECTURE_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new JapanPrefecture();  
         $id=null;  
         $name=null;  
         $stm->bind_result($id, $name); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO JAPAN_PREFECTURES (   \n"; 
         $sql.="  PREFECTURE_ID,     \n"; 
         $sql.="  PREFECTURE_NAME     \n"; 
         $sql.="VALUES (?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ss",$bean->getId(), $bean->getName()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM JAPAN_PREFECTURES   \n"; 
         $sql.="WHERE PREFECTURE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE JAPAN_PREFECTURES SET   \n"; 
         $sql.="  PREFECTURE_NAME=?     \n"; 
         $sql.="WHERE PREFECTURE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sss", $bean->getName(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  PREFECTURE_ID,     \n"; 
         $sql.="  PREFECTURE_NAME     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  JAPAN_PREFECTURES  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  PREFECTURE_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $name=null;  
         $stm->bind_result($id, $name); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new JapanPrefecture();  
            $bean->setId($id);
            $bean->setName($name);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM JAPAN_PREFECTURES "; 
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