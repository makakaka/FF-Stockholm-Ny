<?php 
/*
Template Name: Bildmall
*/ 
	?>
				
<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

 if (isset($_REQUEST['objid'])) {
 	$objID = $_GET["objid"];
 }
 else {
 	$objID = 'OBJ17365_1191922963';
 }

 // http://w4.objektdata.se/pregen/963/OBJ17365_1191922963/wp.xml
 //$url = 'http://w4.objektdata.se/pregen/' . substr($objID, -3) . '/' . $objID . '/wp.xml';
 //$xml = simplexml_load_file($url,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml");

 //$id = $xml->OBJEKT['gid'];
 
  // http://w4.objektdata.se/pregen/963/OBJ17365_1191922963/wp.xml
 $url = 'http://w4.objektdata.se/pregen/' . substr($objID, -3) . '/' . $objID . '/wp.xml';
 $response = @file_get_contents($url);

 if (preg_match('#^HTTP/... 4..#', $http_response_header[0])) {
    // received a 4xx response
    readfile('http://www.fantasticfrank.se/bostaden-kunde-inte-hittas/'); 
 	exit;
 }
 else {
 
 $xml = simplexml_load_file($url,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml");
 
 $id = $xml->OBJEKT['gid'];
 
//Extra
$pm_id;
$tema;
$maklare;
$errormess;

//$xml->Firma//
$firmaNamn = $xml->Firma->faNamn;
$firmaAdress = $xml->Firma->faAdress;      
$firmaBesoksAdress = $xml->Firma->faBesokAdr;     
$firmaPostnr = $xml->Firma->faPostnr;           
$firmaPostadress = $xml->Firma->faPostadress;       
$firmaTelefon = $xml->Firma->faTelefon;          
$firmaFax = $xml->Firma->faFax;              
$firmaHemsida = $xml->Firma->faHemsida;
//firmaExtra          
$firmaKontor = $xml->Firma->faKontor;

//$xml->Maklare
$maklareNamn = $xml->Maklare->maNamn;           
$maklareEmail = $xml->Maklare->maEmail;          
$maklareMobil = $xml->Maklare->maMobil;
$maklareTitel = $xml->Maklare->maTitel;          
$maklareDirektnr = $xml->Maklare->maDirektnr;       
$maklareBildRelUrl = $xml->Maklare->maBildRelUrl;     
$maklareBildUrl = $xml->Maklare->maBildUrl;        
$maklareInitialer = $xml->Maklare->maInit;      
$maklarePubliceraEj = $xml->Maklare->maDontPublish;   

//$xml->Extrakontaktperson//
$ekNamn = $xml->Extrakontaktperson->ekNamn;           
$ekEmail = $xml->Extrakontaktperson->ekEmail;          
$ekMobil = $xml->Extrakontaktperson->ekMobil;          
$ekTitel = $xml->Extrakontaktperson->ekTitel;          
$ekDirektnr = $xml->Extrakontaktperson->ekDirektnr;
$ekBildRelUrl = $xml->Extrakontaktperson->ekBildRelUrl; 
$ekBildUrl = $xml->Extrakontaktperson->ekBildUrl;        
$ekInitialer = $xml->Extrakontaktperson->ekInit;      
$ekPubliceraEj = $xml->Extrakontaktperson->ekDontPublish; 

$kind = $xml->kind;
$adressRad1 = $xml->msadress;             
$adressRad2 = $xml->adress2;             
$omrade = $xml->omrade;                 
$kommun = $xml->kommun;                 
$vaningAv = $xml->vaningav;               
$pris = $xml->mspris;
$formatPris;             
$pristext = $xml->pristext;
$slutpris = $xml->slutpris;               
$bildUrl = $xml->picurl;             
$saljbeskrivning = $xml->saljbeskrivning;    
$saljbeskrivningLang = $xml->saljbeskrivningLang;        


$xKoord = $xml->x;
$yKoord = $xml->y; 
$longitude = $xml->longitude;
$latitude = $xml->latitude;
$kartUrl = $xml->latitude;
$longitudeDot;
$latitudeDot;              
$saljRubrik = $xml->saljrubrik;                 
//$planlosning     


// PRIS //
if (strlen($pris) == 8) {
  $formatPris = substr($pris,2) . ' ' . substr($pris, 2, 3) . ' ' . substr($pris, 5, 3);
}
if (strlen($pris) == 7) {
  $formatPris = substr($pris,1) . ' ' . substr($pris, 1, 3) . ' ' . substr($pris, 4, 3);
}
if (strlen($pris) == 6) {
  $formatPris = substr($pris,3) . ' ' . substr($pris, 3, 3);
}

// VISNINGAR //
$visningsText = '';
$forraVisningsText = '';
$visningLista = '';
foreach($xml->visningar->visning as $visning) {

  $tidStart = new DateTime($visning->PubStart);
  $tidSlut  = new DateTime($visning->PubSlut);
  if (empty($visningsText)) {
    $visningsText = $visning->text;
  }
  $visningLista .= '<li>' . $tidStart->format( 'l j F' ) . ' - kl ' . $tidStart->format( 'G:i' ). ' till ' . $tidSlut->format( 'G:i' ) . '</li>';
}
if (!empty($visningLista) && !empty($visningsText)){
  $visningLista .= '<li>' . $visningsText . '</li>';
}

// BILDER //
$bildGrupp;
$bildNamn;
$planritning = '';
$bildLista = '';
$forstaBilden = '';
foreach($xml->pictures->picture as $image) {
  $bild = $image->picurl;
  $pos = strpos($bild, '&sizex');
  if ($pos !== false) {
    $bild = substr($bild, 0, $pos) . '&sizex=960'; //858
  }
  if (empty($forstaBilden)) {
  	$forstaBilden = $bild;
  }
  $bildGrupp = $image->picgrupp;
  if(stristr($bildGrupp, 'Planritningar') === FALSE) {
    $planritning = '';
  } else {
  	$planritning = 'id="planritning"';
  }
  $bildNamn  = $image->picnamn;
  $bildLista .= '<div ' . $planritning . ' class="gdl-column-item">';
  $bildLista .= '<div class="gdl-image-frame shortcode-image-left" style="max-width: 100%; float: left; width: 960px; height: auto; margin-left: -20px; ">';
  $bildLista .= '<a href="' . $bild . '" data-rel="prettyPhoto[galleri]" title="Fantastic Frank Fastighetsmäkleri - Klicka på bilden för att öppna upp bildspel" ><img src="' . $bild . '" style="width:960px; height:auto;" alt="' . $bildNamn . '"/></a>';
  $bildLista .= '</div>';
  $bildLista .= '</div>';
  $bildLista .= '<div class="clear"></div>';
  $bildLista .= '<div class="gdl-column-item">';
  if (strlen($bildNamn) > 0) {
  	$bildLista .= '<p style="padding-top: 15px;">' . $bildNamn . '</p>';
  } else {
  	$bildLista .= '<p style="padding-top: 15px;">&nbsp;</p>';  
  }
  $bildLista .= '</div>';
  $bildLista .= '<div class="clear"></div>';
}



// KARTA LONGITUDE LATITUDE     $addr = strtr($addr, "äåö", "aao"); 
$longitudeDot = strtr($longitude, ",", ".");
$latitudeDot = strtr($latitude, ",", ".");
     
} 
$GLOBALS['adress'] = $adressRad1;
$GLOBALS['omrade'] = $omrade;
$GLOBALS['kommun'] = $kommun;
$GLOBALS['saljbeskrivning'] = substr($saljbeskrivningLang, 0, 160);
$GLOBALS['image']  = $forstaBilden;
      
?>


<?php get_header('bilder'); ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBc6BZJDf5Pi2c4axt_mhByesUseAyICAE"></script>


<div class="gdl-page-header-area-2" id="gdl-page-header-area">
	<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>
	<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>
	<h1 class="gdl-page-title gdl-title title-color"><?php echo "$adressRad1" ?><?php if($kind == '510') { ?> - SÅLD<?php } ?></h1>
</div>
<div class="sixteen columns  gdl-first gdl-last ">
	<?php echo "$bildLista"; ?>
	<!--<div class="gdl-column-item">
		<div class="gdl-image-frame shortcode-image-left" style="max-width: 100%; float: left; width: 960px; height: auto; margin-left: -20px; ">
			<a href="http://www.fantasticfrank.se/salja-med-fantastic-frank/fri-vardering/" data-rel="prettyPhoto[galleri]" title="Fantastic Frank Fastighetsmäkleri - fri värdering" ><img src="http://www.fantasticfrank.se/images/fri-vardering.jpg" style="width:960px; height:auto;" alt="Fri värdering - sälja bostad"/></a>
		</div>
	</div>
	<div class="clear"></div>
	<div class="gdl-column-item">
		<p style="padding-top: 15px;">&nbsp;</p>
	</div>';
	<div class="clear"></div>-->
	
	<div id="map_canvas" style="width: 960px; height: 470px; margin-left: -10px; margin-bottom: 10px;"></div>
	<p><a href="<?php echo "/visa-bostad-hemnet.php?obj=" . $objID; ?>" class="gdl-button shortcode-small-button mb0">Tillbaka till bostaden</a></p>

</div>
<div class="clear"></div>

<script type="text/javascript">

    var latlng = new google.maps.LatLng('<?php echo "$latitudeDot"; ?>', '<?php echo "$longitudeDot"; ?>');
    var myOptions = {
        zoom: 14,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: "<?php echo "$adressRad1"; ?>",
    });   
</script>

<?php get_footer('object'); ?>
