<?php 
require_once '../../config.php';
require_once $GLOBALS['pathCms'] . '/oad/AOD.php';  
require_once $GLOBALS['pathCms'] . '/oad/DogSheddingAmountsOad.php';  
require_once $GLOBALS['pathCms'] . '/beans/DogSheddingAmount.php';
//require_once('FirePHPCore/fb.php4');
  

  class DogSheddingAmountsOadImpl extends AOD implements DogSheddingAmountsOad { 






      public function selecciona($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  DOG_SHEDDING_AMOUNT_ID,     \n"; 
         $sql.="  DOG_SHEDDING_AMOUNT_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  DOG_SHEDDING_AMOUNTS  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  ORDEN  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $nombre=null;  
         $stm->bind_result($id, $nombre); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new DogSheddingAmount();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function seleccionaCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM DOG_SHEDDING_AMOUNTS "; 
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