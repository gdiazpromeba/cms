<?php 

   interface ZipsGenericoSvc { 

      /**
   	   * obtiene un bean de C�digo postal gen�rico (ZipGenerico)
   	   * conteniendo la longitud y latitud.
   	   * Si no lo consigue de la base de datos, llama a la geolocaci�n y
   	   * almacena el resultado en la base de datos.
   	  */
   	  public function obtienePorCodigo($pais, $code);
   } 

?>