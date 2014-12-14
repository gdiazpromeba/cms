<?php
  class UrlUtils{

  	/**
  	 * función utilitaria para convertir una palabra en otra aceptable como parte de una URL
  	 */
  	 public static function codifica($url){
  	   $url =  str_replace(" ", "-", $url);
       $url =  str_replace("&", "and", $url);
	   $url =  str_replace("'", "", $url); //apostrophe
	   $url =  str_replace("%", "percent", $url);
	   $url =  str_replace(", ", "-", $url);
	   $url =  str_replace(",", "-", $url);
	   $url =  str_replace("á", "a", $url);
	   $url =  str_replace("é", "e", $url);
	   $url =  str_replace("í", "í", $url);
	   $url =  str_replace("ó", "ó", $url);
	   $url =  str_replace("ú", "u", $url);
	   $url =  str_replace("ü", "u", $url);
	   $url =  str_replace("ë", "e", $url);
	   $url =  str_replace("/", "-", $url);
	   $url =  str_replace("\\", "-", $url);
	   $url =  str_replace("?", "-", $url);
	   $url =  str_replace("<", "-", $url);
	   $url =  str_replace(">", "-", $url);
	   $url =  str_replace("(", "-", $url);
	   $url =  str_replace(")", "-", $url);
  	   return $url;
  	 }
  	 
  	 
  }
?>