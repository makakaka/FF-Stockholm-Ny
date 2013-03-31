<?php 
/*
Template Name: ObjektlistaNy
*/ 
	?>			
				
<?php
function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

function get_bild($gidden) {

 $bildretur = '';
 // http://w4.objektdata.se/pregen/963/OBJ17365_1191922963/wp.xml
 $url_objekt = 'http://w4.objektdata.se/pregen/' . substr($gidden, -3) . '/' . $gidden . '/wp.xml';
 $xml_objekt = simplexml_load_file($url_objekt,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml");

 $id_igen = $xml_objekt->OBJEKT['gid'];
 if (strlen($id_igen) > 0) {
 	foreach($xml_objekt->pictures->picture as $image) {
  		$bild = $image->picurl;
  		$pos = strpos($bild, '&sizex');
  		if ($image['pid'] == '1') {
      		$bildretur = substr($bild, 0, $pos) . '&sizex=960'; // Behåller 350 i höjd av 400 möjliga.
  		}
  		if (ltrim(strtolower($image->picgrupp)) == 'köpa') {
      		$bildretur = substr($bild, 0, $pos) . '&sizex=960'; // Behåller 350 i höjd av 400 möjliga.
 			return $bildretur;
  		}
  	}
 }
 return $bildretur;
} // end function get_bild


function get_surr($gid_in, &$surrLista, $counter_in) {

	$theSurr = '';
	$theFind = '';
	$counter = 1;
 	foreach ($surrLista as $key=> $row) {
  		if ($row["gid"] == $gid_in) {
  			if(empty($theFind)) {
  				$theSurr .= '<li style="margin-top: -10px;">&nbsp;</li><li>BUZZ OM BOSTADEN:</li>';
  				$theFind = 'X';
  			}
  			if ($counter <= $counter_in) {
  				$theSurr .= '<li><a class="underline" href="' . $row["http"] . '" style="color: #fff !important;">' . $row["surr"] . '</a></li>';
  				$counter++;
  			}
  			
  		}
	}
	return $theSurr;
}

function prepare_vitec( ) {

    /* Open CSV file */
    $handle = fopen("http://www.fantasticfrank.se/bostadfrank.txt", "r");
    $row = 1;
    $counter = 1;
    $html = '';
    /* gets data from csv file */
    while (($data = fgetcsv($handle, 1000, ",")) != FALSE) {
        $num = count($data);
        if ($row != 1) { /* skip first row */
        	$surr_rub1 = '';$surr_rub2 = '';$surr_rub3 = '';$surr_rub4 = ''; 
        	$surr_http1 = '';$surr_http2 = '';$surr_http3 = '';$surr_http4 = '';
        	$gid        	= $data[3];
        	// 1
            $surr_rub1  	= $data[15];   
            $surr_http1     = $data[16];  
            if (!empty($surr_rub1)) {
            	$surrLista[$counter] = array("gid" => "$gid", "surr" => "$surr_rub1", "http" => "$surr_http1");
            	$counter++; 
            }
            
            // 2
            $surr_rub2      = $data[17];   
            $surr_http2     = $data[18]; 
            if (!empty($surr_rub2)) {
            	$surrLista[$counter] = array("gid" => "$gid", "surr" => "$surr_rub2", "http" => "$surr_http2");
            	$counter++; 
            }
            
            // 3  
            $surr_rub3      = $data[19];   
            $surr_http3     = $data[20];   
            if (!empty($surr_rub3)) {
            	$surrLista[$counter] = array("gid" => "$gid", "surr" => "$surr_rub3", "http" => "$surr_http3");
            	$counter++; 
            }
            
            // 4
            $surr_rub4      = $data[21];   
            $surr_http4     = $data[22];   
            if (!empty($surr_rub4)) {
            	$surrLista[$counter] = array("gid" => "$gid", "surr" => "$surr_rub4", "http" => "$surr_http4");
            	$counter++; 
            }
        }
        $row++;
	}
	return $surrLista;

}

function get_kommande_under_hand(&$objektListaKommande, &$objektListaSald, &$objektListaReferens, $surrLista, $counter_out ) {

    /* Open CSV file */
    $handle = fopen("http://www.fantasticfrank.se/bostadfrank.txt", "r");
    $row = 1;
    $html = '';
    /* gets data from csv file */
    while (($data = fgetcsv($handle, 1000, ",")) != FALSE) {
        $num = count($data);
        if ($row != 1 && $data[1] == 1 && ( $data[2] == 0 || $data[2] == 3 || $data[2] == 4 )) {  /* skip first row */
        	$gid        = $data[3];
        	$obj        = $data[3];
        	$bildurl    = 'http://www.fantasticfrank.se/images/objekt/' . $data[3] . '.png';
        	$headline   = $data[4];
        	$headline2  = $data[5];
        	$headline3  = $data[6];
        	$href       = $data[7];
        	$annonsTid  = '';
        	$pris       = $data[10];
        	$omrade     = $data[11];
        	$adress     = $data[12];
        	$rum        = $data[13];
        	
        	/*det här vill vi ALLTID ha med*/
        $html .= '	<div class="twelve hemnet-column gdl-first " style="margin-bottom: 5px; background-color: transparent !important; margin-right: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-1" style="background: url( ' . $bildurl . ' ) no-repeat left center;">';
		$html .= '					<img class="hemnet-bild-1" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="Fantastic Frank"/>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-2" style="background: url( ' . $bildurl . ' ) no-repeat -130px center;">';
		$html .= '					<img class="hemnet-bild-2" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="Fantastic Frank"/>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-3" style="background: url( ' . $bildurl . ' ) no-repeat -265px center;">';
		$html .= '					<img class="hemnet-bild-3" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="Fantastic Frank"/>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-4" style="background: url( ' . $bildurl . ' ) no-repeat -400px center;">';
		$html .= '					<img class="hemnet-bild-4" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="Fantastic Frank"/>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		
            switch ($data[2]) { /* status */
                case 0: /* kommer snart */

		$html .= '	<div class="four columns gdl-last" style="width: 195px; margin: 5px 5px -10px 5px;">';
		$html .= '		<div class="gdl-column-item">';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $omrade . '</strong></span><br />';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $adress . '</strong></span>';
		$html .= '			<div class="shortcode-list shortcode-list-none">';
		$html .= '				<ul>';
		$html .= '					<li><strong>' . $headline .  '</strong></li>';
		if (strlen($headline2) > 0){
			$html .= '				<li><a href="' . $href . '" style="color: #fff !important;" class="underline">' . $headline2 . '</a></li>';
		}
		$html .= '					<li><strong>' . $rum .  '</strong></li>';
		if (strlen($pris) > 0){
			$html .= '				<li>Pris: ' . $pris . ' kr</li>';
		}
		$html .= '				</ul>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		$html .= '	<div class="clear"></div>';
		$html .= '	<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		//$html .= '			<div class="divider">';
		//$html .= '				<div class="scroll-top"></div>';
		//$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';	
	  	$objektListaKommande["$gid"] = array("pris" => "$pris", "obj" => "$gid", "annonsTid" => "$annonsTid", "html" => "$html");
	    $html = '';
	    break;
	    
	    /*** SÅLD ***/
                case 3: /* såld */
                
		$html .= '	<div class="four columns gdl-last" style="width: 195px; margin: 5px 5px -10px 5px;">';
		$html .= '		<div class="gdl-column-item">';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $omrade . '</strong></span><br />';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $adress . '</strong></span>';
		$html .= '			<div class="shortcode-list shortcode-list-none">';
		$html .= '				<ul>';
		$html .= '					<li><strong><a href="/visa-bostad-hemnet.php?obj=' . $obj . '" style="color: #fff !important;" class="underline">' . $headline .  '</a></strong></li>';
		if (strlen($headline2) > 0){
			$html .= '				<li><a href="/visa-bostad-hemnet.php?obj=' . $obj . '" style="color: #fff !important;" class="underline">' . $headline2 . '</a></li>';
		}
		//$html .= '					<li><strong>' . $rum .  '</strong></li>';
		$html .= get_surr($gid, $surrLista, $counter_out);
		$html .= '				</ul>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		$html .= '	<div class="clear"></div>';
		$html .= '	<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		//$html .= '			<div class="divider">';
		//$html .= '				<div class="scroll-top"></div>';
		//$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
	  	$objektListaSald["$gid"] = array("pris" => "$pris", "obj" => "$gid", "annonsTid" => "$annonsTid", "html" => "$html");
	    $html = '';
	    break;
	    
	    /*** REFERENS ***/
                case 4: /* Referens */
                
		$html .= '	<div class="four columns gdl-last" style="width: 195px; margin: 5px 5px -10px 5px;">';
		$html .= '		<div class="gdl-column-item">';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $omrade . '</strong></span><br />';
		$html .= '			<span class="title-color-kopa body-font"><strong>' . $adress . '</strong></span>';
		$html .= '			<div class="shortcode-list shortcode-list-none">';
		$html .= '				<ul>';
		$html .= '					<li><strong><a href="' . $href . '" style="color: #fff !important;" class="underline">' . $headline .  '</a></strong></li>';
		if (strlen($headline2) > 0){
			$html .= '				<li><a href="' . $href . '" style="color: #fff !important;" class="underline">' . $headline2 . '</a></li>';
		}
		//$html .= '					<li><strong>' . $rum .  '</strong></li>';
		$html .= get_surr($gid, $surrLista, $counter_out);
		$html .= '				</ul>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		$html .= '	<div class="clear"></div>';
		$html .= '	<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		//$html .= '			<div class="divider">';
		//$html .= '				<div class="scroll-top"></div>';
		//$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';	
	  //} else {
	  	$objektListaReferens["$gid"] = array("pris" => "$pris", "obj" => "$gid", "annonsTid" => "$annonsTid", "html" => "$html");
	    $html = '';
	    break;
	    
      		} // switch
      } //if

      $row++;
    }//while
    
    //return $objektListaKommande;
    
} //function

function vitec(&$xml_input, &$objektListaTemp, $surrLista, $counter_out) {
  
  	$html = '';
	foreach($xml_input->objekt as $objekt) {
	  
	  $gid = $objekt->GID;
	  $objektUrl = $objekt->ObjektUrl;
	  //$bild_fran_objekt = get_bild($gid);
	  //if (strlen($bild_fran_objekt) > 0) {
	    //$bildUrl = $bild_fran_objekt;
	  //} else {
	  	$bildUrl = $objekt->BildUrl;
	  //}
	  $kommun = $objekt->Kommun;
	  $omrade = $objekt->Omrade;
	  $adress = $objekt->Adress;
	  $rum = $objekt->Rum;
	  $objektTyp = $objekt->ObjektTyp;
	  $objektTypText = $objekt->ObjektTypText;
	  $land = $objekt->land;
	  $boendeform = $objekt->Boendeform;
	  $boendeformText = $objekt->BoendeformText;
	  $upplatform = $objekt->Upplatform;
	  $upplatformText = $objekt->Upplatformtext;
	  $boArea = $objekt->BoArea;
	  $biArea = $objekt->BiArea;
	  $tomtAreal = $objekt->TomtAreal;
	  $avgift = $objekt->Avgift;
	  $beskrivning = $objekt->Beskrivning;
	  $saljRubrik = $objekt->SaljRubrik;
	  $pris = $objekt->Pris;
	  $msAdress = $objekt->MSAdress;
	  $msPris = $objekt->MSPris;
	  $kind = $objekt->Kind;
	  $byggnar = $objekt->Byggnar;
	  $visningsDag = $objekt->VisningsDag;
	  $visningsTidStart = $objekt->VisningsTidStart;
	  $visningsTidSlut = $objekt->VisningsTidSlut;
	  $visningsText = $objekt->VisningsText;
	  $x = $objekt->X;
	  $y = $objekt->Y;
	  $longitude = $objekt->Longitude;
	  $latitude = $objekt->Latitude;
	  $annonsTid = $objekt->AnnonsTid;
	//<PrisAnnanValuta/>
	//<ValutaKod/>
	//<DagensObjekt>
	//<AnnonsTid>
	//<Objektnr>
	//<![CDATA[ NK023 ]]>
	//</Objektnr>
	
	// PRIS //
	if (strlen($pris) == 8) {
	  $pris = substr($pris,0,2) . ' ' . substr($pris, 2, 3) . ' ' . substr($pris, 5, 3);
	}
	if (strlen($pris) == 7) {
	  $pris = substr($pris,0,1) . ' ' . substr($pris, 1, 3) . ' ' . substr($pris, 4, 3);
	}
	if (strlen($pris) == 6) {
	  $pris = substr($pris,3) . ' ' . substr($pris, 3, 3);
	}
	
	$pos;
	$pos = strpos($bildUrl, '&sizex');
	if ($pos !== false) {
	  $bildUrl1 = substr($bildUrl, 0, $pos) . '&sizex=520';
	  $bildUrl2 = substr($bildUrl, 0, $pos) . '&sizex=400';
	}
	
	// RUM OCH STORLEK
	$antalRum = '';
	if (!empty($rum)) {
		$antalRum = $rum . ' rum'; 
	} 
	$kvm = '';
	if (strlen($biArea) > 0) { 
		$biArea = '+' . $biArea;
	}
	if (strlen($boArea) > 0) { 
		$kvm = ', ' . $boArea . $biArea . ' m&sup2;';
	}
	
		$html .= '	<div class="twelve hemnet-column gdl-first " style="margin-bottom: 5px; background-color: transparent !important; margin-right: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-1" style="background: url( ' . $bildUrl1 . ' ) no-repeat left center;">';
		$html .= '				<a href="/visa-bostad-hemnet.php?obj=' . $gid . '">';
		$html .= '					<img class="hemnet-bild-1" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="' . $saljRubrik . '"/></a>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-2" style="background: url( ' . $bildUrl1 . ' ) no-repeat -130px center;">';
		$html .= '				<a href="/visa-bostad-hemnet.php?obj=' . $gid . '">';
		$html .= '					<img class="hemnet-bild-2" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="' . $saljRubrik . '"/></a>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-3" style="background: url( ' . $bildUrl1 . ' ) no-repeat -265px center;">';
		$html .= '				<a href="/visa-bostad-hemnet.php?obj=' . $gid . '">';
		$html .= '					<img class="hemnet-bild-3" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="' . $saljRubrik . '"/></a>';
		$html .= '			</div>';
		$html .= '			<div class="gdl-image-frame hemnet-bild-frame-4" style="background: url( ' . $bildUrl1 . ' ) no-repeat -400px center;">';
		$html .= '				<a href="/visa-bostad-hemnet.php?obj=' . $gid . '">';
		$html .= '					<img class="hemnet-bild-4" src="/wp-content/themes/incidental/images/icon/light/content-bg-transparent.png" alt="' . $omrade . ', ' . $adress . '" title="' . $saljRubrik . '"/></a>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		$html .= '	<div class="four columns gdl-last" style="width: 195px; margin: 5px 5px -10px 5px;">';
		$html .= '		<div class="gdl-column-item">';
		if(strlen($omrade) > 0){
			$html .= '			<strong><a href="/visa-bostad-hemnet.php?obj=' . $gid . '"><span class="title-color-kopa body-font">' . $omrade . '</span></a></strong><br />';
		}
		$html .= '			<strong><a href="/visa-bostad-hemnet.php?obj=' . $gid . '"><span class="title-color-kopa body-font">' . $adress . '</span></a></strong>';
		$html .= '			<div class="shortcode-list shortcode-list-none">';
		$html .= '				<ul>';
		if ($kind == '510'){
		//		$html .= '				<li><strong>SÅLD!</strong></li>';		
		}
		else {
			$html .= '					<li><strong>' . $antalRum . $kvm . '</strong></li>';
			if (strlen($pris) > 0){
				$html .= '				<li>Pris: ' . $pris . ' kr</li>';
			}
			if (strlen($avgift) > 0){
		  		$html .= '				<li>Avgift: ' . $avgift . ' kr/mån</li>';
		 	}
		}
		$html .= get_surr($gid, $surrLista, $counter_out);
		$html .= '				</ul>';
		$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';
		$html .= '	<div class="clear"></div>';
		$html .= '	<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
		$html .= '		<div class="gdl-column-item">';
		//$html .= '			<div class="divider">';
		//$html .= '				<div class="scroll-top"></div>';
		//$html .= '			</div>';
		$html .= '		</div>';
		$html .= '	</div>';	
	
	  //if ($kind == '510') {
	  	//$objektListaSald["$gid"] = array("pris" => "$pris", "annonsTid" => "$annonsTid", "html" => "$html"); 
	
	  	//	//$objektArray["$gid"] = $html;
	  //} else {
	  	$objektListaTemp["$gid"] = array("pris" => "$pris", "obj" => "$gid", "annonsTid" => "$annonsTid", "html" => "$html");
	  //}
	  $html = '';
	  
	} // end foreach
	
	//return $objektListaTemp;

}

  setlocale(LC_TIME, 'swedish'); 
  setlocale(LC_ALL, 'sv_SE'); 
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  
 //if (isset($_REQUEST['referens'])) {
   $urlRef = 'http://net.sfd.se/webpack/ObjectList/ObjectList.aspx?RenderAsXML=1&Custom=1&DBSPace=17365&RefObject=3';
   $url = 'http://net.sfd.se/webpack/ObjectList/ObjectList.aspx?RenderAsXML=1&Custom=1&DBSPace=17365';  
  
// Referensobjekt...
// http://net.sfd.se/webpack/ObjectList/ObjectList.aspx?RenderAsXML=1&Custom=1&DBSPace=17365&RefObject=3
 $xml    = simplexml_load_file($url,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml");
 $xmlRef = simplexml_load_file($urlRef,'SimpleXMLElement', LIBXML_NOCDATA) or die("Kan inte ladda xml"); 
// sfdXMLObjectList->
//$html .= '<div class="sixteen columns wrapper mt0 gdl-first gdl-last ">';
//$html .= '<div id="blog-item-holder" class="blog-item-holder">';

?>

<?php get_header('lista'); ?>

<?php
  $surrListan = prepare_vitec();
  if (!empty($referens)) {
  	vitec($xmlRef, $objektListaSald, $surrListan, 3);
  } else {
  	vitec($xml, $objektLista, $surrListan, 2);
  	get_kommande_under_hand($objektListaKom, $objektLista, $objektListaSald, $surrListan, 3 );
  }
  $referens = $GLOBALS['referens']; ?>

  					<div class="gdl-page-header-area-2" id="gdl-page-header-area">
  						<div class="gdl-header-gimmick-left gdl-header-gimmick"></div>
  						<div class="gdl-header-gimmick-right gdl-header-gimmick"></div>
 <?php			if (!empty($referens)) { ?>
  						<h1 class="gdl-page-title gdl-title title-color-kopa">Urval av våra sålda bostäder</h1>
<?php			} else { ?>
  						<h1 class="gdl-page-title gdl-title title-color-kopa">Köpa Bostad</h1>
<?php 			} ?>						
  					</div>
  					<!--<div>
  						<ul class="menu-norm">
  							<li>förmedlas nu</li>
  							<li>referensförsäljningar</li>
  							<li>sålda</li>
  						</ul>
  					</div>-->


			
<?php			if (!empty($referens)) {
				// SÅLDA //
	  array_sort_by_column($objektListaSald, 'obj');
	  foreach ($objektListaSald as $key=> $row) {
	//  	if (strpos($row["annonsTid"],'2012') !== false) {
	   		echo $row["html"];
	  } 
	  echo '<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
	  echo '	<div class="gdl-column-item">';	  
	  echo '		<br /><p><a href="/kopa-bostad/" class="gdl-button shortcode-small-button mb0">Förmedlas just nu</a></p>';
	  echo '	</div>';
	  echo '</div>';	  
	             } else {
	 // TILL SALU JUST NU // 
	 array_sort_by_column($objektLista, 'pris');
	  foreach ($objektLista as $key=> $row) {
	  	echo $row["html"];
	  } ?>
						<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">
							<div class="gdl-column-item">
								<h5 class="title-color-kopa" style="margin-top: 10px;">kommande försäljningar</h5>
							</div>
						</div>
	<?php
	  foreach ($objektListaKom as $key=> $row) {
	  	echo $row["html"];
	  } 
	  echo '<div class="sixteen columns gdl-first gdl-last" style="margin-bottom: 0px; ">';
	  echo '	<div class="gdl-column-item">';	  
	  echo '		<br /><p><a href="/kopa-bostad/?referens=true" class="gdl-button shortcode-small-button mb0">Referensförsäljningar</a></p>';
	  echo '	</div>';
	  echo '</div>';	  
                    } ?>

	
	
						<div class="clear gdl-clear-bottom"></div>
					</div> <!-- gdl-inner-page-item -->
				</div> <!-- gdl-page-item -->		
				<div class="clear"></div>
			</div> <!-- page-wrapper -->
		</div> <!-- content-wrapper -->
	</div> <!-- container -->
	
<?php get_footer('lista'); ?>
