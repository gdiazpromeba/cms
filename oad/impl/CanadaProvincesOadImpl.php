<?php 

require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/CanadaProvincesOad.php';
require_once $GLOBALS['pathCms'] . '/beans/CanadaProvince.php';

   class CanadaProvincesOadImpl extends AOD implements CanadaProvincesOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  PROVINCE_ID,     \n"; 
         $sql.="  PROVINCE_NAME     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CANADA_PROVINCES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  PROVINCE_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new CanadaProvince();  
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
         $sql="INSERT INTO CANADA_PROVINCES (   \n"; 
         $sql.="  PROVINCE_ID,     \n"; 
         $sql.="  PROVINCE_NAME     \n"; 
         $sql.="VALUES (?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ss",$bean->getId(), $bean->getName()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM CANADA_PROVINCES   \n"; 
         $sql.="WHERE PROVINCE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE CANADA_PROVINCES SET   \n"; 
         $sql.="  PROVINCE_NAME=?     \n"; 
         $sql.="WHERE PROVINCE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sss", $bean->getName(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  PROVINCE_ID,     \n"; 
         $sql.="  PROVINCE_NAME     \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CANADA_PROVINCES  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  PROVINCE_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $name=null;  
         $stm->bind_result($id, $name); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new CanadaProvince();  
            $bean->setId($id);
            $bean->setName($name);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM CANADA_PROVINCES "; 
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