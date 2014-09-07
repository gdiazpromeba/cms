<?php 

   require_once '../../config.php';
   require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/util/FechaUtils.php';

   class News { 
      private $id; 
      private $newsTitle; 
      private $newsText; 
      private $newsSource; 
      private $newsDate; 

      public function getId(){ 
         return $this->id;  
      }

      public function getNewsTitle(){ 
         return $this->newsTitle;  
      }

      public function getNewsText(){ 
         return $this->newsText;  
      }

      public function getNewsSource(){ 
         return $this->newsSource;  
      }

      public function getNewsDate(){
      	return $this->newsDate;
      }
      
      public function getNewsDateLarga(){
      	return FechaUtils::dateTimeaCadena($this->newsDate);
      }
      
      public function getNewsDateCorta(){
      	return FechaUtils::dateTimeaCadenaDMA($this->newsDate);
      }
      
      public function setNewsDate($valor){
      	$this->newsDate=$valor;
      }
      
      public function setNewsDateLarga($valor){
      	if (!is_string($valor)){
      		throw new Exception("el valor recibido debería ser una cadena");
      	}
      	$this->newsDate=FechaUtils::creaDeCadena($valor);
      }
      
      public function setNewsDateCorta($valor){
      	if (!is_string($valor)){
      		throw new Exception("el valor recibido debería ser una cadena");
      	}
      	$this->newsDate=FechaUtils::cadenaDMAaObjeto($valor);
      }
      
      

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setNewsTitle($valor){ 
         $this->newsTitle=$valor; 
      }

      public function setNewsText($valor){ 
         $this->newsText=$valor; 
      }

      public function setNewsSource($valor){ 
         $this->newsSource=$valor; 
      }
  
   }
?>