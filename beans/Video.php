<?php 

   class Video { 
      private $id; 
      private $videoTitle; 
      private $videoUrl; 
      private $videoTags; 

      public function getId(){ 
         return $this->id;  
      }

      public function getVideoTitle(){ 
         return $this->videoTitle;  
      }

      public function getVideoUrl(){ 
         return $this->videoUrl;  
      }

      public function getVideoTags(){ 
         return $this->videoTags;  
      }

      public function setId($valor){ 
         $this->id=$valor; 
      }

      public function setVideoTitle($valor){ 
         $this->videoTitle=$valor; 
      }

      public function setVideoUrl($valor){ 
         $this->videoUrl=$valor; 
      }

      public function setVideoTags($valor){ 
         $this->videoTags=$valor; 
      }

   }
?>