<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/UsaStatesOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/UsaState.php';

   class UsaStatesOadImpl extends AOD implements UsaStatesOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  STATE_ID,     \n"; 
         $sql.="  STATE_NAME,     \n"; 
         $sql.="  STATE_CODE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  USA_STATES  \n"; 
         $sql.="WHERE  \n"; 
         $sql.="  STATE_ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new UsaState();  
         $id=null;  
         $name=null;  
         $code=null;  
         $stm->bind_result($id, $name, $code); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setName($name);
            $bean->setCode($code);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO USA_STATES (   \n"; 
         $sql.="  STATE_ID,     \n"; 
         $sql.="  STATE_NAME,     \n"; 
         $sql.="  STATE_CODE)    \n"; 
         $sql.="VALUES (?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sss",$bean->getId(), $bean->getName(), $bean->getCode()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM USA_STATES   \n"; 
         $sql.="WHERE STATE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE USA_STATES SET   \n"; 
         $sql.="  STATE_NAME=?,     \n"; 
         $sql.="  STATE_CODE=?     \n"; 
         $sql.="WHERE STATE_ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sss", $bean->getName(), $bean->getCode(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function selTodos($desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  STATE_ID,     \n"; 
         $sql.="  STATE_NAME,     \n"; 
         $sql.="  STATE_CODE    \n"; 
         $sql.="FROM  \n"; 
         $sql.="  USA_STATES  \n"; 
         $sql.="ORDER BY  \n"; 
         $sql.="  STATE_NAME  \n"; 
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $id=null;  
         $name=null;  
         $code=null;  
         $stm->bind_result($id, $name, $code); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new UsaState();  
            $bean->setId($id);
            $bean->setName($name);
            $bean->setCode($code);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 
      
      public function selCondados($stateId){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  COUNTY_ID,     \n";
      	$sql.="  COUNTY_NAME     \n";
      	$sql.="FROM  \n";
      	$sql.="  USA_COUNTIES  \n";
      	$sql.="WHERE  \n";
      	$sql.="  COUNTY_ID  \n";
      	$sql.="ORDER BY  \n";
      	$sql.="  COUNTY_NAME  \n";
      	$sql.="LIMIT " . $desde . ", " . $cuantos . "  \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$id=null;
      	$name=null;
      	$code=null;
      	$stm->bind_result($id, $name);
      	$filas = array();
      	while ($stm->fetch()) {
      		$fila=array();
      		$fila['id']=$id;
      		$fila['name']=$name;
      		$filas[]=$fila;
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      }
      


      public function selTodosCuenta(){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM USA_STATES "; 
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