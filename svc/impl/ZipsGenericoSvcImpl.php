<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/impl/ZipsGenericoOadImpl.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/ZipsGenericoSvc.php';  
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/CountriesSvcImpl.php';
//require_once('FirePHPCore/fb.php4');

   class ZipsGenericoSvcImpl implements ZipsGenericoSvc { 
      private $oad=null; 

      function __construct(){ 
         $this->oad=new ZipsGenericoOadImpl();   
      } 

      /**
       * (non-PHPdoc)
       * @see ZipsGenericoSvc::obtienePorCodigo()
      */
      public function obtienePorCodigo($pais, $code){
      	//quito los espacios intermedios (se necesita para los códigos postales británicos)
      	$code = str_replace(" ", "", $code);
      	$bean=$this->oad->obtienePorCodigo($pais, $code);
      	
      	$latitude=$bean->getLatitude();
      	if (!empty($latitude)){
      		return $bean;
      	}
      	
      	$url = "http://maps.googleapis.com/maps/api/geocode/json?components=country:" . $pais . "|postal_code:" . $code; 
      	
      	$curl = curl_init($url);
      	curl_setopt($curl, CURLOPT_HEADER, false);
      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      	curl_setopt($curl, CURLOPT_HTTPHEADER,
      	array("Content-type: application/json"));
      	curl_setopt($curl, CURLOPT_POST, false);
//       	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
      	
      	$json_response = curl_exec($curl);
      	
      	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      	
//       	if ( $status != 201 ) {
//       		echo "retorno malo de la curl";
//       		//return $bean;
//       		die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
//       	}
      	
      	
      	curl_close($curl);
      	
      	$response = json_decode($json_response, true);
      	
      	
      	if (count($response["results"])==0){
      		//si no se encontró ningún resultado válido en la goecodificación,
      		//devuelvo el centro geográfico del país, de la tabla de países
      		$svcPaises=new CountriesSvcImpl();
      		$country=$svcPaises->obtienePorPrefijoTabla($pais);
      		$bean->setLatitude($country->getLatitude());
      		$bean->setLongitude($country->getLongitude());
      		return $bean;
      	}
      	
      	$result=$response["results"][0];
      	$geometry=$result["geometry"];
      	$location=$geometry["location"];
      	$latitude=$location["lat"];
      	$longitude=$location["lng"];
      	
      	
      	$bean->setLatitude($latitude);
      	$bean->setLongitude($longitude);
      	$bean->setCode($code);
      	$bean->setLocationId("");
      	$ret= $this->oad->inserta($pais, $bean);
      	
      	return $bean;
      	
      	
      }

   }
?>