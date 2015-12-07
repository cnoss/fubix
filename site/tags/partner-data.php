<?php


kirbytext::$tags['partner-adress'] = array(
  'html' => function($tag) {
	  $partnermeta = c::get('partner-meta');
	  $adress = array();
	  array_push( $adress, $partnermeta["adress00"]);
	  array_push( $adress, $partnermeta["adress01"]);
	  array_push( $adress, $partnermeta["adress02"]);

	  if(isset($partnermeta["adress03"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress03"])){ array_push( $adress, $partnermeta["adress03"]); }
	  if(isset($partnermeta["adress04"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress04"])){ array_push( $adress, $partnermeta["adress04"]); }
	  if(isset($partnermeta["adress05"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress05"])){ array_push( $adress, $partnermeta["adress05"]); }
	  if(isset($partnermeta["adress06"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress06"])){ array_push( $adress, $partnermeta["adress06"]); }
	  if(isset($partnermeta["adress07"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress07"])){ array_push( $adress, $partnermeta["adress07"]); }
	  if(isset($partnermeta["adress08"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress08"])){ array_push( $adress, $partnermeta["adress08"]); }
	  if(isset($partnermeta["adress09"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress09"])){ array_push( $adress, $partnermeta["adress09"]); }
	  if(isset($partnermeta["adress10"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress10"])){ array_push( $adress, $partnermeta["adress10"]); }
	  if(isset($partnermeta["adress11"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress11"])){ array_push( $adress, $partnermeta["adress11"]); }
	  if(isset($partnermeta["adress12"]) && preg_match("=[a-zA-Z0-9]=",$partnermeta["adress12"])){ array_push( $adress, $partnermeta["adress12"]); }
		if($tag->attr('partner-adress') == "inline"){
			return join(", ", $adress);
		}else{
			return join("<br>", $adress);
		}
  }
);

kirbytext::$tags['partner-contact'] = array(
  'html' => function($tag) {
	  $partnermeta = c::get('partner-meta');
	  $contact = array();
	  if(isset($partnermeta["tel"]) && $partnermeta["tel"] != ""){ array_push( $contact, "Tel.: " . $partnermeta["tel"]); }
	  if(isset($partnermeta["fax"]) && $partnermeta["fax"] != ""){ array_push( $contact, "Fax.: " . $partnermeta["fax"]); }
	  if(isset($partnermeta["web"]) && $partnermeta["web"] != ""){ array_push( $contact, "Web: <a target=\"_blank\" href=\"http://" . $partnermeta["web"] . "\">".$partnermeta["web"]."</a>"); }
	  if(isset($partnermeta["mail"]) && $partnermeta["mail"] != ""){ array_push( $contact, "Email: <a href=\"mailto:" . $partnermeta["mail"] . "\">".$partnermeta["mail"]."</a>"); }
	  return join("<br>", $contact);
  }
);

kirbytext::$tags['partner-opening-times'] = array(
  'html' => function($tag) {
	  $partnermeta = c::get('partner-meta');
	  $ret = $partnermeta["opening-times"];
	  return $ret;
  }
);

kirbytext::$tags['partner-data'] = array(
  'html' => function($tag) {
	  $partnermeta = c::get('partner-meta');
	 // $text    = $tag->attr('text', 'Wikipedia');
	  return $partnermeta[$tag->attr('partner-data')];
  }
);

kirbytext::$tags['partner-map'] = array(
  'html' => function($tag) {
	  $partnermeta = c::get('partner-meta');
	  
	  $title = $partnermeta['name'];
	  $title .= ($partnermeta['holder']) ? "<br>". $partnermeta['holder'] : "";

	  return "<div class=\"js-google-map embed-responsive embed-responsive-16by9\" data-marker-lat=\"".$partnermeta['lat']."\" data-marker-lng=\"".$partnermeta['lng']."\" data-marker-title=\"".$title."\"></div>";
	  //return "<div class=\"embed-responsive embed-responsive-16by9 gm-style\"><div class=\"map\"><iframe class=\"embed-responsive-item\"  frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com/maps?f=q&source=s_q&geocode=&q=".$partnermeta["lat"].",".$partnermeta["lng"] ."&aq=&sll=".$partnermeta["lat"].",".$partnermeta["lng"]."&sspn=15.317907,28.256836&ie==iso-8859-1&z=14&ll=".$partnermeta["lat"].",".$partnermeta["lng"]."&output=embed&iwloc=near\"></iframe></div></div>";
  }
);

?>