<?php 
require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/CatSizesOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/CatSize.php';
  

  class CatSizesOadImpl extends AOD implements CatSizesOad { 






      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  CAT_SIZE_ID,     \n"; 
         $sql.="  CAT_SIZE_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CAT_SIZES  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  SIZE_ORDER  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $nombre=null;  
         $stm->bind_result($id, $nombre); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new CatSize();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM CAT_SIZES "; 
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