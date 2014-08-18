<?php 

   interface ZipsGenericoSvc { 

      /**
   	   * obtiene un bean de Código postal genérico (ZipGenerico)
   	   * conteniendo la longitud y latitud.
   	   * Si no lo consigue de la base de datos, llama a la geolocación y
   	   * almacena el resultado en la base de datos.
   	  */
   	  public function obtienePorCodigo($pais, $code);
   } 

?>