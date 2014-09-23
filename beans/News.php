<?php 

   require_once $GLOBALS['pathCms'] . '/util/FechaUtils.php';

   class News { 
      private $id; 
      private $newsTitle; 
      private $newsText; 
      private $urlEncoded;
      private $newsSource; 
      private $newsDate; 
      private $cutPosition;

      public function getId(){ 
         return $this->id;  
      }

      public function getNewsTitle(){ 
         return $this->newsTitle;  
      }
      

      public function getUrlEncoded(){
      	return $this->urlEncoded;
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
      
      public function getCutPosition(){
      	return $this->cutPosition;
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
      
      public function setUrlEncoded($valor){
      	$this->urlEncoded=$valor;
      }      

      public function setNewsText($valor){ 
         $this->newsText=$valor; 
      }

      public function setNewsSource($valor){ 
         $this->newsSource=$valor; 
      }
      
      public function setCutPosition($valor){
      	$this->cutPosition=$valor;
      }
      
  
   }
?>