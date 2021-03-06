<?php

require_once '../config.php';

require_once $GLOBALS['pathCms'] . '/beans/DogBreed.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/DogBreedsSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUsaSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersJapanSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersCanadaSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersUkSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersIndiaSvcImpl.php';
require_once $GLOBALS['pathCms'] . '/svc/impl/SheltersChinaSvcImpl.php';



function escribeArchivo($nombreArchivo, $contenido){
	$fh = fopen($GLOBALS['pathWeb'] .   "/$nombreArchivo", 'w') or die("can't open file");
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
$lastMod = date("Y-m-d");;

$url= $rootUrl;

// main pages
$res .= "<!-- Main pages  -->   \n";
$res .= construyeUnidad($url, $lastMod, "weekly", 1);
$url= $rootUrl . "dogbreeds";
$res .= construyeUnidad($url, $lastMod, "weekly", 1);
$url= $rootUrl . "shelters/countries";
$res .= construyeUnidad($url, $lastMod, "yearly", 1);

// secondary pages
//   shelters' countries 
$res .= "<!-- Initial dog shelters of every country listing  -->   \n";
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


//p�ginas individuales de detalle de shelter
//  usa
$res .= "<!-- USA shelters listing   -->   \n";
$svc = new SheltersUsaSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/usa/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}
//  japan
$res .= "<!-- Japan shelters listing   -->   \n";
$svc = new SheltersJapanSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/japan/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}
//  canada
$res .= "<!-- Canada shelters listing   -->   \n";
$svc = new SheltersCanadaSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/canada/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}
//  uk
$res .= "<!-- UK shelters listing   -->   \n";
$svc = new SheltersUkSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/uk/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}
//  india
$res .= "<!-- india shelters listing   -->   \n";
$svc = new SheltersIndiaSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/india/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}
//  China
$res .= "<!-- China shelters listing   -->   \n";
$svc = new SheltersChinaSvcImpl();
$beans=$svc->selTodos(null, null, null, 0, 0, null, null, 0, 100000);
foreach ($beans as $bean){
	$url= $rootUrl . "shelters/info/china/" . $bean->getUrlEncoded();
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}

//p�ginas individuales de razas caninas
$svc = new DogBreedsSvcImpl();
$beans = $svc->selecciona(null, null, null, null, null, null, null, null,  null, 0, 100000);
$res .= "<!-- dog breeds listing   -->   \n";
foreach ($beans as $bean){
	$url= $rootUrl . "dogbreeds/info/" . str_replace(" ", "_", $bean->getNombre() ) ;
	$res .= construyeUnidad($url, $lastMod, "monthly", 0.5);
}



$res .="</urlset>";

escribeArchivo("sitemap.xml", $res);
  
?>
