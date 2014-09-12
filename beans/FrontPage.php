<?php 

   class FrontPage { 
      private $news1Id; 
      private $news2Id; 
      private $news3Id; 
      private $news4Id; 
      private $news1Cut; 
      private $news2Cut; 
      private $news3Cut; 
      private $news4Cut; 
      private $news1Title; 
      private $news2Title; 
      private $news3Title; 
      private $news4Title; 
      private $news1UrlEncoded;
      private $news2UrlEncoded;
      private $news3UrlEncoded;
      private $news4UrlEncoded;
      private $news1Source;
      private $news2Source;
      private $news3Source;
      private $news4Source;
      private $news1Text;
      private $news2Text;
      private $news3Text;
      private $news4Text;
      private $video1Id; 
      private $video2Id; 
      private $video3Id; 
      private $video1Url;
      private $video2Url;
      private $video3Url;
      private $video1Title; 
      private $video2Title; 
      private $video3Title; 
      private $dogBreed1Id; 
      private $dogBreed2Id; 
      private $dogBreed3Id; 
      private $dogBreed1Name; 
      private $dogBreed2Name; 
      private $dogBreed3Name; 
      private $dogBreed1Picture;
      private $dogBreed2Picture;
      private $dogBreed3Picture;
      

      public function getNews1Id(){ 
         return $this->news1Id;  
      }

      public function getNews2Id(){ 
         return $this->news2Id;  
      }

      public function getNews3Id(){ 
         return $this->news3Id;  
      }

      public function getNews4Id(){ 
         return $this->news4Id;  
      }

      public function getNews1Cut(){ 
         return $this->news1Cut;  
      }

      public function getNews2Cut(){ 
         return $this->news2Cut;  
      }

      public function getNews3Cut(){ 
         return $this->news3Cut;  
      }

      public function getNews4Cut(){ 
         return $this->news4Cut;  
      }

      public function getNews1Title(){ 
         return $this->news1Title;  
      }

      public function getNews2Title(){ 
         return $this->news2Title;  
      }

      public function getNews3Title(){ 
         return $this->news3Title;  
      }

      public function getNews4Title(){ 
         return $this->news4Title;  
      }
      
      public function getNews1UrlEncoded(){
      	return $this->news1UrlEncoded;
      }
      
      public function getNews2UrlEncoded(){
      	return $this->news2UrlEncoded;
      }
      
      public function getNews3UrlEncoded(){
      	return $this->news3UrlEncoded;
      }
      
      public function getNews4UrlEncoded(){
      	return $this->news4UrlEncoded;
      }
      
      
      public function getNews1Source(){
      	return $this->news1Source;
      }
      
      public function getNews2Source(){
      	return $this->news2Source;
      }
      
      public function getNews3Source(){
      	return $this->news3Source;
      }
      
      public function getNews4Source(){
      	return $this->news4Source;
      }
      

      public function getNews1Text(){
      	return $this->news1Text;
      }
      
      public function getNews2Text(){
      	return $this->news2Text;
      }
      
      public function getNews3Text(){
      	return $this->news3Text;
      }
      
      public function getNews4Text(){
      	return $this->news4Text;
      }
            
      public function getVideo1Id(){ 
         return $this->video1Id;  
      }

      public function getVideo2Id(){ 
         return $this->video2Id;  
      }

      public function getVideo3Id(){ 
         return $this->video3Id;  
      }
      
      public function getVideo1Url(){
      	return $this->video1Url;
      }
      
      public function getVideo2Url(){
      	return $this->video2Url;
      }
      
      public function getVideo3Url(){
      	return $this->video3Url;
      }      

      public function getVideo1Title(){ 
         return $this->video1Title;  
      }

      public function getVideo2Title(){ 
         return $this->video2Title;  
      }

      public function getVideo3Title(){ 
         return $this->video3Title;  
      }

      public function getDogBreed1Id(){ 
         return $this->dogBreed1Id;  
      }

      public function getDogBreed2Id(){ 
         return $this->dogBreed2Id;  
      }

      public function getDogBreed3Id(){ 
         return $this->dogBreed3Id;  
      }

      public function getDogBreed1Name(){ 
         return $this->dogBreed1Name;  
      }

      public function getDogBreed2Name(){ 
         return $this->dogBreed2Name;  
      }

      public function getDogBreed3Name(){ 
         return $this->dogBreed3Name;  
      }
      
      public function getDogBreed1Picture(){
      	return $this->dogBreed1Picture;
      }
      
      public function getDogBreed2Picture(){
      	return $this->dogBreed2Picture;
      }
      
      public function getDogBreed3Picture(){
      	return $this->dogBreed3Picture;
      }      

      public function setNews1Id($valor){ 
         $this->news1Id=$valor; 
      }

      public function setNews2Id($valor){ 
         $this->news2Id=$valor; 
      }

      public function setNews3Id($valor){ 
         $this->news3Id=$valor; 
      }

      public function setNews4Id($valor){ 
         $this->news4Id=$valor; 
      }

      public function setNews1Cut($valor){ 
         $this->news1Cut=$valor; 
      }

      public function setNews2Cut($valor){ 
         $this->news2Cut=$valor; 
      }

      public function setNews3Cut($valor){ 
         $this->news3Cut=$valor; 
      }

      public function setNews4Cut($valor){ 
         $this->news4Cut=$valor; 
      }

      public function setNews1Text($valor){ 
         $this->news1Text=$valor; 
      }

      public function setNews2Text($valor){ 
         $this->news2Text=$valor; 
      }

      public function setNews3Text($valor){ 
         $this->news3Text=$valor; 
      }

      public function setNews4Text($valor){ 
         $this->news4Text=$valor; 
      }

      public function setNews1Title($valor){
      	$this->news1Title=$valor;
      }
      
      public function setNews2Title($valor){
      	$this->news2Title=$valor;
      }
      
      public function setNews3Title($valor){
      	$this->news3Title=$valor;
      }
      
      public function setNews4Title($valor){
      	$this->news4Title=$valor;
      }

      public function setNews1UrlEncoded($valor){
      	$this->news1UrlEncoded=$valor;
      }
      
      public function setNews2UrlEncoded($valor){
      	$this->news2UrlEncoded=$valor;
      }
      
      public function setNews3UrlEncoded($valor){
      	$this->news3UrlEncoded=$valor;
      }
      
      public function setNews4UrlEncoded($valor){
      	$this->news4UrlEncoded=$valor;
      }
      
      
      public function setNews1Source($valor){
      	$this->news1Source=$valor;
      }
      
      public function setNews2Source($valor){
      	$this->news2Source=$valor;
      }
      
      public function setNews3Source($valor){
      	$this->news3Source=$valor;
      }
      
      public function setNews4Source($valor){
      	$this->news4Source=$valor;
      }
      
      
      public function setVideo1Id($valor){ 
         $this->video1Id=$valor; 
      }

      public function setVideo2Id($valor){ 
         $this->video2Id=$valor; 
      }

      public function setVideo3Id($valor){ 
         $this->video3Id=$valor; 
      }
      
      public function setVideo1Url($valor){
      	$this->video1Url=$valor;
      }
      
      public function setVideo2Url($valor){
      	$this->video2Url=$valor;
      }
      
      public function setVideo3Url($valor){
      	$this->video3Url=$valor;
      }

      public function setVideo1Title($valor){ 
         $this->video1Title=$valor; 
      }

      public function setVideo2Title($valor){ 
         $this->video2Title=$valor; 
      }

      public function setVideo3Title($valor){ 
         $this->video3Title=$valor; 
      }

      public function setDogBreed1Id($valor){ 
         $this->dogBreed1Id=$valor; 
      }

      public function setDogBreed2Id($valor){ 
         $this->dogBreed2Id=$valor; 
      }

      public function setDogBreed3Id($valor){ 
         $this->dogBreed3Id=$valor; 
      }

      public function setDogBreed1Name($valor){ 
         $this->dogBreed1Name=$valor; 
      }

      public function setDogBreed2Name($valor){ 
         $this->dogBreed2Name=$valor; 
      }

      public function setDogBreed3Name($valor){ 
         $this->dogBreed3Name=$valor; 
      }
      
      public function setDogBreed1Picture($valor){
      	$this->dogBreed1Picture=$valor;
      }
      
      public function setDogBreed2Picture($valor){
      	$this->dogBreed2Picture=$valor;
      }
      
      public function setDogBreed3Picture($valor){
      	$this->dogBreed3Picture=$valor;
      }      

   }
?>