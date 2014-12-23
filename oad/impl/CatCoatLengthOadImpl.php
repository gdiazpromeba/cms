<?php 
require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/CatCoatLengthOadOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/CatCoatLengthOad.php';
//require_once('FirePHPCore/fb.php4');
  

  class CatCoatLengthOadImpl extends AOD implements CatCoatLengthOadOad { 






      public function selecciona($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  COAT_LENGTH_ID,     \n"; 
         $sql.="  COAT_LENGTH_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  CAT_COAT_LENGTH  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  COAT_ORDER  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $nombre=null;  
         $stm->bind_result($id, $nombre); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new CatCoatLength();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function seleccionaCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM CAT_COAT_LENGTH "; 
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