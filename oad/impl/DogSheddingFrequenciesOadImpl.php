<?php 
require_once '../../config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/DogSheddingFrequenciesOad.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/DogSheddingFrequency.php';
  

  class DogSheddingFrequenciesOadImpl extends AOD implements DogSheddingFrequenciesOad { 


      public function selecciona($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCY_ID,     \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCY_NAME    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  DOG_SHEDDING_FREQUENCIES  \n"; 
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
            $bean=new DogSheddingFrequency();  
            $bean->setId($id);
            $bean->setNombre($nombre);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function seleccionaCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM DOG_SHEDDING_FREQUENCIES "; 
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