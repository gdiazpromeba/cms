<?php
  class UrlUtils{

  	/**
  	 * funci�n utilitaria para convertir una palabra en otra aceptable como parte de una URL
  	 */
  	 public static function codifica($url){
  	   $url =  str_replace(" ", "-", $url);
       $url =  str_replace("&", "and", $url);
	   $url =  str_replace("'", "", $url); //apostrophe
	   $url =  str_replace("%", "percent", $url);
	   $url =  str_replace(", ", "-", $url);
	   $url =  str_replace(",", "-", $url);
	   $url =  str_replace("�", "a", $url);
	   $url =  str_replace("�", "e", $url);
	   $url =  str_replace("�", "�", $url);
	   $url =  str_replace("�", "�", $url);
	   $url =  str_replace("�", "u", $url);
	   $url =  str_replace("�", "u", $url);
	   $url =  str_replace("�", "e", $url);
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