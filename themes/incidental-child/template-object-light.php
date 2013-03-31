<?php 
/*
Template Name: ObjektLight
*/ 
	?>
				
<?php
class DateTimeSwedish extends DateTime {
    public function format($format) {
        $english = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday','January','February','March','April','May','June','July','August','September','October','November','December');
        $swedish = array('Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag', 'Söndag', 'januari','februari','mars','april','maj','juni','juli','augusti','september','oktober','november','december');
        return str_replace($english, $swedish, parent::format($format));
    }
}
function belopp_till_text($amount) {
	$amountReturn = '';
	if (strlen($amount) == 8) {
    	$amountReturn = substr($amount,0,2) . ' ' . substr($amount, 2, 3) . ' ' . substr($amount, 5, 3) . ' kr';
    }
    if (strlen($amount) == 7) {
    	$amountReturn = substr($amount,0,1) . ' ' . substr($amount, 1, 3) . ' ' . substr($amount, 4, 3) . ' kr';
    }
    if (strlen($amount) == 6) {
    	$amountReturn = substr($amount,3) . ' ' . substr($amount, 3, 3) . ' kr';
    }  
	return $amountReturn;
}



  setlocale(LC_TIME, 'sv_SE'); 
  setlocale(LC_ALL, 'swedish'); 
  ini_set('display_errors',1);
  error_reporting(E_ALL);

 if (isset($_REQUEST['objid'])) {
 	$objID = $_GET["objid"];
 }
 else {
 	$objID = 'OBJ17365_1201337193';
 }

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
 
$didTransfer;
$blog;

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
$maklareMobil = $xml->Maklare->maMobilnr;
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

//$xml->Forening//
$foreningNamn = $xml->Forening->forNamn;          
$foreningText = $xml->Forening->forTxt;          
$foreningKontaktNamn = $xml->Forening->forKontaktNamn;   
$foreningKontaktTel = $xml->Forening->forKontaktTel;    
$foreningMaklareDirTel = $xml->Forening->maDirektnr; 

//Generella//
$fastighetsbet = $xml->fastbet; 
$objekttyp = $xml->objekttyp;             
$objekttypText = $xml->objekttyptext;         
$upplatelseform = $xml->upplatform;
$upplatelseformText = $xml->upplatformtext;
$boendeform = $xml->boendeform;            
$boendeformtext = $xml->boendeformtext;        
$projektnamn = $xml->projektnamn;
$lagenhetRefnr = $xml->lghrefnr;    
$kind = $xml->kind;
$taxeringskod = $xml->taxkod;     
$taxeringsvarde = $xml->taxvarde;         
$taxeringsvardeByggad = $xml->tasbygg;   
$taxeringsar = $xml->taxar;  
$rattigheter = $xml->rattigheter;            
$adressRad1 = $xml->msadress;             
$adressRad2 = $xml->adress2;             
$omrade = $xml->omrade;                 
$kommun = $xml->kommun;                 
$land = $xml->land;                   
$landskodISO = $xml->landskodiso;  
//kommskatt          
$vaning = $xml->vaning;                 
$vaningAv = $xml->vaningav;               
$pris = $xml->mspris;
$formatPris;             
$pristext = $xml->pristext;
$slutpris = $xml->slutpris;               
$nytid = $xml->nytid;                  
$tomttyp = $xml->tomttyp;                
$driftskostnad = $xml->driftskostnad;          
$pantbrevSumma = $xml->pantbrevsum;          
$status = $xml->status;                 
$hiss = $xml->hiss;          
//lkf                  
$ovrigtFastighet = $xml->ovrigt;  
$ovrigtAllmant = $xml->ovrigt2;        
$ovrigtByggnad = $xml->ovrigbyggn;          
$ovrigaByggnader = $xml->ovrigabyggn;        
$ovrigtTomt = $xml->ovrtomt;  
          
//extra                
$byteskrav = $xml->byteskrav;              
$byteskravText = $xml->byteskravtext;          
$husform = $xml->husform;         
$boarea = $xml->boarea;               
$biarea = $xml->biarea;                
$areakalla = $xml->bobiText;              
$antalRum = $xml->rum;  
$sovrum = $xml->sovrummin;           
$kokstyp = $xml->koktyp;              
$koksbeskrivning = $xml->kokbeskr;        
$badrumsbeskrivning = $xml->badrumbeskr;     
$tvattbeskrivning = $xml->tvattbeskr;    
$tomtareal = $xml->tomtareal;      
$bildUrl = $xml->picurl;             
$beskrivning = $xml->beskrivning;    
$saljbeskrivningLang = $xml->saljbeskrivningLang;        
$tilltradestext = $xml->tilltrtext;
$vagbeskrivning = $xml->vagbeskr;        

$planlosning = $xml->planlosning;
$avgift = $xml->avgift;    
$avgiftText = $xml->avgifttext;   
$byggAr = $xml->byggnar;  
$byggArText = $xml->byggnartext;   
$utokatSokbegrepp = $xml->utsokbegrepp;

$xKoord = $xml->x;
$yKoord = $xml->y; 
$longitude = $xml->longitude;
$latitude = $xml->latitude;
$kartUrl = $xml->latitude;
$longitudeDot;
$latitudeDot;              
$stomme = $xml->stomme;
$bjalklag = $xml->bjalklag;   
$grundmur = $xml->grundmur;             
$grundlaggning = $xml->grundlaggn;        
$tak = $xml->tak;       
$fasad = $xml->fasad;                
$plat = $xml->plat;               
$fonster = $xml->fonster;              
$uppvarmning = $xml->uppvarmn;          
$ventilation = $xml->vent;         
$vattenAvlopp = $xml->va;         
$saljRubrik = $xml->saljrubrik;        
$andelstal = $xml->andelstal;          
$andelstalEnhet = $xml->andelstalenhet;       
$andelIFormogenhet = $xml->andelformog;    
$reparationsFond = $xml->repfond;   
//$projektUniktNr     
$hemnet = $xml->HemnetHTML;        
//$planlosning     


// PRIS //
if (strlen($pristext) > 0) {
	$pristext = $pristext;
} else {
	$pristext = 'Pris';
}
$formatPris = belopp_till_text($pris);

// PANTBREV //

$pantbrevSummaText = belopp_till_text($pantbrevSumma);

// HISS // 
if ($hiss == '-1') {
  $hiss = ', hiss finns';	
} else {
  $hiss = '';
}

// VISNINGAR //
$visningsText = '';
$forraVisningsText = '';
$visningLista = '';
/* Output: vrijdag 22 december 1978 */
/*echo strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));*/
foreach($xml->visningar->visning as $visning) {

  $tidStart = new DateTimeSwedish($visning->PubStart);
  $tidSlut  = new DateTimeSwedish($visning->PubSlut);
  if (empty($visningsText)) {
    $visningsText = $visning->text;
  }
  $visningLista .= '<li>' . $tidStart->format( 'l j F' ) . ' - kl ' . $tidStart->format( 'G:i' ). ' till ' . $tidSlut->format( 'G:i' ) . '</li>';
}
if (!empty($visningLista) && !empty($visningsText)){
  $visningLista .= '<li>' . $visningsText . '</li>';
}

// BUD //  
$budtyp = $xml->budtyp;       
$budhistorikstyle = $xml->budhistorikstyle; 
$budstyle = $xml->budstyle;                           
$budurl = $xml->budrelurl; 
$budTabell = '';
$hogstaBud = '';
$bildlista = '';
$bidder;
$belopp;
$timestamp;
$cancelled;
if ($budtyp == '3') {
  $budHistorik = $xml->bidhistory;  
  $xmlHistorik = $xml->wpbudxml;
  $docBid = simplexml_load_file($xmlHistorik,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml-budgivning");
  $hogstaBud = $docBid->highbid;
  $hogstaBud = belopp_till_text($hogstaBud);
  
  if ($budhistorikstyle == '1') {		           			
	$budTabell .= '<table width="500">';
    foreach($docBid->bidhistory->bid as $bud) {
      $cancelled = $bud->cancelled;
      if ($cancelled == '0') {
        $bidder = $bud->bidder;
		$budTabell .= '<tr><td width="100">' . $bidder . '</td>';
		$belopp = $bud->amount;
		$beloppText = belopp_till_text($belopp);
        $budTabell .= '<td width="190">' . $beloppText . '&nbsp;kr</td>';
		$timestamp = $bud->timestamp;
		$budTabell .= '<td width="190">' . $timestamp . '</td></tr>';
	  }
	  //$budTabell .= '';
    } 
	$budTabell .= '<tr><td colspan="3"><strong>Kontakta mäklaren för att vara med i budgivningen.</strong></td></tr></table>';
  }
}   

// BILDER //
$forstaBilden = '';
$andraBilden = '';
$tredjeBilden = '';
$picgrupp = '';
mb_internal_encoding('UTF-8');

foreach($xml->pictures->picture as $image) {
  $bild = $image->picurl;
  $pos = strpos($bild, '&sizex');
  $picgrupp = $image->picgrupp;
  $picgrupp = mb_strtolower($picgrupp);
  switch ($picgrupp) {
  	case 'annonsbild1':
  	case 'annonsbild 1':
  	case 'annons bild 1':
  	case 'annons bild1':
      $bild = substr($bild, 0, $pos) . '&sizex=600'; // Behåller 350 i höjd av 400 möjliga.
	  $forstaBilden = $bild;
	  $forstaBildenGrupp = $image->picgrupp;
	  $forstaBildenNamn = $image->picnamn;
	  break;
	case 'annonsbild2':
	case 'annonsbild 2':
	case 'annons bild 2':
	case 'annons bild2':
	  $andraBilden = $bild;
	  $andraBildenGrupp = $image->picgrupp;
	  $andraBildenNamn = $image->picnamn;
	  break;
	case 'annonsbild3':
	case 'annonsbild 3':
	case 'annons bild 3':
	case 'annons bild3':
      $bild = substr($bild, 0, $pos) . '&sizex=360';  // Bild 340 x 227 men så croppar vi den
	  $tredjeBilden = $bild;
	  $tredjeBildenGrupp = $image->picgrupp;
	  $tredjeBildenNamn = $image->picnamn;
	  break;
  } 
}

if ($forstaBilden == '' ||
    $andraBilden  == '' ||
    $tredjeBilden == '') {
	foreach($xml->pictures->picture as $image) {
  		$bild = $image->picurl;

  		switch ($image['pid']) {
  		case '1':
  			if ($forstaBilden == '') {
      		$bild = substr($bild, 0, $pos) . '&sizex=600'; // Behåller 350 i höjd av 400 möjliga.
    		$forstaBilden = $bild;
    		$forstaBildenGrupp = $image->picgrupp;
    		$forstaBildenNamn = $image->picnamn;
    		}
    		break;
  		case '2':
  			if ($andraBilden == '') {
      		$bild = substr($bild, 0, $pos) . '&sizex=360';  // Bild 340 x 227 men så croppar vi den
    		$andraBilden = $bild;
    		$andraBildenGrupp = $image->picgrupp;
    		$andraBildenNamn = $image->picnamn;
    		}
    		break;
  		case '3':
  			if ($tredjeBilden == '') {
      		$bild = substr($bild, 0, $pos) . '&sizex=360';  // Bild 340 x 227 men så croppar vi den
    		$tredjeBilden = $bild;
    		$tredjeBildenGrupp = $image->picgrupp;
    		$tredjeBildenNamn = $image->picnamn;
    		}
    		break;
  		}
	}    
}


// PDF // 
$pdfLista = '';
foreach($xml->pdfdokument->pdf as $pdf) {
  $pdfLista .= '<li>-&nbsp;<a class=\"underline\"  href=\"' . $pdf->url . '\">' . $pdf->name . '</a></li>';
}

// LÄNKAR //
$lankLista = '';
foreach($xml->lankar->lank as $lank) {
  $lankLista .= '<li>-&nbsp;<a class=\"underline\"  href=\"' . $lank->url . '\">' . $lank->text . '</a></li>';
}

// RUM OCH STORLEK
if (!empty($antalRum)) {
	$antalRum .= ' rum'; 
} 
$kvm = '';
if (strlen($biarea) > 0) { 
	$biarea = '+' . $biarea;
}
if (strlen($boarea) > 0) { 
	$kvm = ', ' . $boarea . $biarea . ' m&sup2;';
}
      

// OM SÅLD, visa speciell TEXT…
if ($kind == '510') {
	$saljRubrik = 'OBS - BOSTADEN ÄR SÅLD ';
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

<?php get_header('object'); ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBc6BZJDf5Pi2c4axt_mhByesUseAyICAE"></script>

<div class="gdl-page-header-area-2" id="gdl-page-header-area">
	<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>
	<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>
	<h1 class="gdl-page-title page-title-hemnet gdl-title title-color">Snart till Salu: <?php echo "$adressRad1" ?></h1>
</div>
<div class="sixteen columns wrapper">
	<div class="ten columns gdl-first "> <!-- 600 -->
		<div class="gdl-column-item"> <!-- gdl-first gdl-last -->
			<div class="gdl-image-frame shortcode-image-left" style="max-width: 100%; float: left; width: 600px; height: 350px; margin-left: -20px; "><img src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" style="border: none; width:600px; height: 350px; background: url(<?php echo "$forstaBilden"; ?>) center center; overflow: hidden; postion: relative;" />
			</div>
		</div>
		<div class="gdl-column-item">
			<span class="left"><a class="fonts-com font-size-9" id="karta" href="http://api.eniro.com/qm-partnerintegrations/query?what=emappartner&partnername=homemap-show&x=<?php echo "$longitudeDot" ?>&y=<?php echo "$latitudeDot" ?>&wcmzoomlevel=16&tiletype=map&calloutcontent=<?php echo "$kommun" ?>&title=<?php echo "$adressRad1" ?>&popupOpen=true" rel="prettyPhoto[iframes]">visa karta</a> <a class="fonts-com font-size-9" href="<?php echo '/visa-bilder-hemnet.php?objekt=' . $objID . '#planritning'; ?>">/ planritning</a></span>
			
		</div>
	</div> <!-- ten columns -->
	<div class="six columns gdl-last "> <!-- 360 -->
		<div class="gdl-column-item">
			<div class="gdl-image-frame shortcode-image-right"><img src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" style="border: none; width:350px; height: 170px; background: url(<?php echo "$andraBilden"; ?>) center center; overflow: hidden; postion: relative;" />
			</div>
			<!-- "http://annstreetstudio.com/wp-content/uploads/2012/09/parislove9801.gif -->
		</div>
		<div class="gdl-column-item" style="margin-top: 4px;">
			<div class="gdl-image-frame shortcode-image-right"><img src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" style="border: none; width:350px; height: 170px; background: url(<?php echo "$tredjeBilden"; ?>) center center; overflow: hidden; postion: relative;" />
			</div>
		</div>
	</div> <!-- six columns -->
</div> <!-- sixteen wrapper -->
<div class="clear"></div>

<div class="sixteen columns wrapper">
	<div class="eight columns  gdl-first ">
		<div class="gdl-column-item">
			<h3><?php echo "$omrade" ?></h3>
			<?php if (!empty($saljRubrik)) { ?><p><strong><?php echo "$saljRubrik" ?></p></strong> <?php } ?>
			<p><?php echo "$saljbeskrivningLang" ?></p>
	
		</div>
	</div>
	<div class="four columns ">
		<div class="gdl-column-item">
				<h3><?php echo $antalRum . $kvm; ?></h3>	
		</div>
	</div>
	<div class="four columns gdl-last" style="margin-right: -20px;">
		
		<div class="gdl-column-item"> 			
			<h3>Ansvarig mäklare</h3>
			<div style="float:right; margin-right: -20px;">
				<div class="gdl-image-frame" style="max-width: 100%; width: 220px;"><img src="<?php echo $maklareBildUrl . '&sizex=220'; ?>" style="width:220px;" alt="Visa alla bostadens bilder" />
				</div>
				<div class="shortcode-list shortcode-list-none">
					<ul>
						<li><?php echo "$maklareNamn"; ?></li>
						<!--<li><?php echo "$maklareTitel"; ?></li>-->
						<li><strong>Mobil: </strong><?php echo "$maklareMobil"; ?></li>
						<li><strong>E-post: </strong><a href="mailto:<?php echo "$maklareEmail"; ?>?subject=<?php echo "$adressRad1" ?>"><?php echo "$maklareEmail"; ?></a></li>
	      					<!--<li><a href="/kontakta-maklare-stockholm/" target="_self" class="gdl-button shortcode-small-button">KONTAKTA MÄKLAREN</a></li>-->
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		    <?php if ($kind != '510') { ?>
			<div class="wpcf7" id="wpcf7-f1014-p1026-o1" style="margin-right: -20px; margin-left: 10px;">
<form action="/x-snabb-skicka/#wpcf7-f1014-p1026-o1" method="post" class="wpcf7-form">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="1014" /><br />
<input type="hidden" name="_wpcf7_version" value="3.3.1" /><br />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1014-p1026-o1" /><br />
<input type="hidden" name="_wpnonce" value="802b228f95" /><br />
<input type="hidden" name="your-recipient" value="<?php echo "$maklareEmail"; ?>" /><br />
<input type="hidden" name="meddelande" value="<?php echo "$adressRad1" . 'intresseanmälan länk: www.fantasticfrank.se/visa-bostad-hemnet.php?obj=' . $objID; ?>" size="200"/>
</div>
<p> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="Namn" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" /></span> </p>
<p> <span class="wpcf7-form-control-wrap your-email"><input type="text" name="your-email" value="E-postadress" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" /></span> </p>
<p> <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="your-phone" value="Telefon" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" /></span> </p>
<p><input type="submit" value="Intresseanmälan" class="wpcf7-form-control  wpcf7-submit svart" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div>

</form>
</div>
		<?php } ?>

			<h3>Karta</h3>
			<div style="float:right; margin-right: -20px;">
				<div id="map_canvas" style="width: 220px; height: 270px;"></div>


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
			</div>
		</div>
	</div>
</div>

<!-- BILDER -->

<!-- <div class="clear"></div>
<div class="one-third column  gdl-first ">
	<div class="gdl-column-item">
		<div class="gdl-image-frame shortcode-image-left" style="max-width: 100%; float: left; height: 270px; width: 190px; background: url(<?php echo "$andraBilden"; ?>) 0 0; "><a href="<?php echo "$andraBilden"; ?>" rel="prettyPhoto[galleri]"  title="<?php echo"$andraBildenNamn"; ?>" > </a></div>
	</div>
</div>
-->

<?php get_footer('object'); ?>
