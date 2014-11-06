<?php
  require_once '../config.php';
?>

<html>
<head>
    <title>Petzynga CMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all.css">
    <?php 
      if ($GLOBALS['debug']){
        echo "<script type='text/javascript' src='extjs/ext-all-dev.js'></script>";
      }else{
        echo "<script type='text/javascript' src='extjs/ext-all.js'></script>";
      }
      require_once '../configExt.php';
    ?>

    <script src="http://maps.googleapis.com/maps/api/js?language=en"></script>
    
    <link rel="stylesheet" type="text/css" href="resources/css/estiloCms.css">
    <?php 
      if ($GLOBALS['env']=="qa"){
        echo "<link rel='stylesheet' type='text/css' href='resources/css/qa.css'>";
      }
    ?>
    
    
    
    <!--  utilities  -->
    <script type="text/javascript" src="app/petcms4/util/Fecha.js"></script>
    <script type="text/javascript" src="app/petcms4/util/MarcoVideo.js"></script>
    
    <script type="text/javascript" src="app/petcms4/combos/ComboRango1a5.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboAbecedario.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboUsaStates.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboJapanPrefectures.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboIndiaStates.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboCanadaProvinces.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboUkRegions.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboUkStatistical.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboChinaProvinces.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboCountriesUk.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSizes.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogPurposes.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSheddingAmounts.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSheddingFrequencies.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboVideos.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboNews.js"></script>

    <script type="text/javascript" src="app/petcms4/util/subaFoto.js"></script>
     
     
    <script type="text/javascript" src="app/petcms4/abm/PanelFormCabeceraAbm.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/abm.js"></script>
     
    <!-- DogBreeds -->
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/FormDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/BusquedaDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/GrillaDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/PanelDogBreeds.js"></script>
    
    <!-- Shelters USA -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/usa/FormSheltersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/usa/BusquedaSheltersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/usa/GrillaSheltersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/usa/PanelSheltersUsa.js"></script>
    
    <!-- Shelters JAPAN -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/japan/FormSheltersJapan.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/japan/BusquedaSheltersJapan.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/japan/GrillaSheltersJapan.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/japan/PanelSheltersJapan.js"></script>
    
    <!-- Shelters UK -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/uk/FormSheltersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/uk/BusquedaSheltersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/uk/GrillaSheltersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/uk/PanelSheltersUk.js"></script>

    
    <!-- Shelters China -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/china/FormSheltersChina.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/china/BusquedaSheltersChina.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/china/GrillaSheltersChina.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/china/PanelSheltersChina.js"></script>
    
    <!-- Shelters Canada -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/canada/FormSheltersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/canada/BusquedaSheltersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/canada/GrillaSheltersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/canada/PanelSheltersCanada.js"></script>
    
    <!-- Shelters India -->
    <script type="text/javascript" src="app/petcms4/abm/shelters/india/FormSheltersIndia.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/india/BusquedaSheltersIndia.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/india/GrillaSheltersIndia.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/shelters/india/PanelSheltersIndia.js"></script>
    
    <!-- Breeders USA -->
    <script type="text/javascript" src="app/petcms4/abm/breeders/usa/FormBreedersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/usa/BusquedaBreedersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/usa/GrillaBreedersUsa.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/usa/PanelBreedersUsa.js"></script>   
    
    <!-- Breeders Canada -->
    <script type="text/javascript" src="app/petcms4/abm/breeders/canada/FormBreedersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/canada/BusquedaBreedersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/canada/GrillaBreedersCanada.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/canada/PanelBreedersCanada.js"></script>       
    
    <!-- Breeders UK -->
    <script type="text/javascript" src="app/petcms4/abm/breeders/uk/FormBreedersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/uk/BusquedaBreedersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/uk/GrillaBreedersUk.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/breeders/uk/PanelBreedersUk.js"></script>     
    
    <!-- News -->
    <script type="text/javascript" src="app/petcms4/abm/news/FormNews.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/news/BusquedaNews.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/news/GrillaNews.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/news/PanelNews.js"></script>
    
    <!-- Videos -->
    <script type="text/javascript" src="app/petcms4/abm/videos/FormVideos.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/videos/BusquedaVideos.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/videos/GrillaVideos.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/videos/PanelVideos.js"></script>
    
    <!-- Front Page -->
    <script type="text/javascript" src="app/petcms4/frontpage/FormFrontPage.js"></script>
    
    <!-- Resources -->
    <script type="text/javascript" src="app/petcms4/abm/resources/FormResources.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/resources/BusquedaResources.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/resources/GrillaResources.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/resources/PanelResources.js"></script>    
    
    
    
    <!-- inicio -->
    <script type="text/javascript" src="app/petcms4/PanelGrillaIconos.js"></script>
    <script type="text/javascript" src="app/petcms4/MenuAcordeon.js"></script>

    <script type="text/javascript" src="app.js"></script>
</head>
<body></body>
</html>