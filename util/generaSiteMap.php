<?php

require_once '../config.php';

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/DogBreed.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/DogBreedsSvcImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ShelterUsa.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/svc/impl/SheltersUsaSvcImpl.php';



function escribeArchivo($nombreArchivo, $contenido){
	$fh = fopen("$nombreArchivo", 'w') or die("can't open file");
	fwrite($fh, utf8_encode($contenido));
	fclose($fh);
}

function construyeUnidad($rootUrl, $lastMod, $changeFreq, $priority){
	$res = "   <url>   \n";
	$res .= "     <loc>" . $rootUrl . "</loc>   \n";
	$res .= "     <lastmod>" . $lastMod . "</lastmod>   \n";
	$res .= "     <changefreq>" . $changeFreq . "</changefreq>   \n";
	$res .= "     <priority>" . $priority . "</priority>   \n";
	$res .= "   </url>   \n";
	return $res;
}

$res =  "<?xml version=\"1.0\" encoding=\"UTF-8\"?>   \n";
$res .= "  <?xml-stylesheet type=\"text/xsl\" href=\"gss.xsl\"?>   \n";
$res .= "  <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">   \n";

$rootUrl = "http://petzynga.com/";
$lastMod = "2014-09-11T19:42:35+00:00";

$url= $rootUrl;

// main pages
$res .= construyeUnidad($url, $lastMod, "weekly", 1);
$url= $rootUrl . "dogbreeds";
$res .= construyeUnidad($url, $lastMod, "weekly", 1);
$url= $rootUrl . "shelters/countries";
$res .= construyeUnidad($url, $lastMod, "yearly", 1);

// secondary pages
//   shelters' countries 
$url= $rootUrl . "shelters/listing/usa/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
$url= $rootUrl . "shelters/listing/uk/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
$url= $rootUrl . "shelters/listing/japan/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
$url= $rootUrl . "shelters/listing/china/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
$url= $rootUrl . "shelters/listing/canada/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
$url= $rootUrl . "shelters/listing/india/initial";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);
//  dog breeds
$url= $rootUrl . "dogbreeds/siguiente";
$res .= construyeUnidad($url, $lastMod, "weekly", 0.5);


//páginas individuales de detalle de shelter
$svc = new SheltersUsaSvcImpl();
$beans=$svc->selTodos(null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/usa/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}

$res .="</urlset>";

escribeArchivo("sitemap.xml", $res);
  
?>
