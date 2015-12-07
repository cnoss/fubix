<!-- Organism: Article -->
<?php 
//	 

?>
<?php 
	$data = isset($content) ? $content : $page;
	
	/* Zusätzliche Textspalten */
	$additional_columns = array();
	if($data->columns()->exists() && $data->columns()->toStructure()->count() > 0){
		$additional_columns["text2"] = $data->columns()->toStructure()->first()->text2();
		$additional_columns["text3"] = $data->columns()->toStructure()->first()->text3();
	}

	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["bildblock"] = "col-lg-8 col-sm-8 col-xs-12 bild";
	$layout_classes["textblock"] = "col-lg-4 col-sm-4 col-xs-12 text";

	/* Layout switcher */
	$def_lang = (c::get("lang_layouts")) ? c::get("lang_layouts"): $site->defaultLanguage()->code();
	$layout_data_obj = set_up_layout_data(yaml($data->content($def_lang)->layout_switcher()));
	$layout_data 	= $layout_data_obj["layout_data"];
	$layout_classes = array_merge($layout_classes, $layout_data_obj["layout_classes"]);
	$layout_classes = get_layout_classes_v2( $layout_data, $layout_classes );

	if(!isset($behavior_classes)){ $behavior_classes = ""; }
	if(!isset($heading)){ $heading = ""; }
	if(!isset($bilder)){ $bilder = ""; }
	
	// Wurde eine Position mitgegeben? Sonst nehmen wir die aus dem Dokument
	$headline_position = (isset($headline_position)) ? $headline_position : $data->headline_position();

	// Wurden Texte für die SLideshow übergeben?
	$slidetexte = (isset($slidetexte)) ? $slidetexte : false;

?>
	

<script>
	
var kirby = {};
kirby.uid = "<?php echo $data->uid(); ?>";
kirby.title = "<?php echo $data->title(); ?>";

kirby.firstleveluid = "<?php echo structhelper::get_first_level($data, 'uid'); ?>";
kirby.firstleveltitle = "<?php echo structhelper::get_first_level($data, 'title'); ?>";

</script>

<article>
<?php 

	if(!isset($docs)){ $docs = false; }

	/* Text soll nach oben über die Bilder
	====================================================== */
	if(isset($layout_data["otc"]) && $layout_data["otc"] == "top"):

	if(strlen($data->text()) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"content" 					=> $data,
			"heading"						=> $heading,
			"layout_classes"		=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"							=> $docs
		));
	}
			
	if(isset($additional_columns["text2"]) && strlen($additional_columns["text2"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 					=> $additional_columns["text2"],
			"content" 					=> $data,
			"heading"					=> "no-headline",
			"layout_classes"			=> $layout_classes,
			"behavior_classes"			=> $behavior_classes,
			"docs"						=> $docs
		));
	}
	
	if(isset($additional_columns["text3"]) && strlen($additional_columns["text3"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 					=> $additional_columns["text3"],
			"content" 					=> $data,
			"heading"					=> "no-headline",
			"layout_classes"			=> $layout_classes,
			"behavior_classes"			=> $behavior_classes,
			"docs"						=> $docs
		));
	}
	
	echo "<div class=\"clearfix padding-bottom-1\"></div>";
	
	atomicdesign::output("molecule", "bildblock", array(
		"content" 			=> $data,
		"bilder"			=> $bilder,
		"heading"			=> $heading,
		"layout_classes"	=> $layout_classes,
		"behavior_classes"	=> $behavior_classes,
		"slidetexte"		=> $slidetexte
	));

	
	/* Text soll neben die Bilder oder nach unten
	====================================================== */
	else: 
	
	// Wie viele Bilder sollen angezeigt werden?
	$noi = false;
	if(isset($layout_classes["number-of-images"])){ $noi = $layout_classes["number-of-images"];}
	
	// Wenn zwei Bilder eingezeigt werden, wird der erste Texte unter dem zweiten Bild angeordnet
	$text_unter_bild = false;
	if($noi == 2 && $layout_data["appearance"] != "unten"){ $text_unter_bild = true;  }
	
	if(sizeof($bilder["all"]) > 0){
		atomicdesign::output("molecule", "bildblock", array(
			"content" 			=> $data,
			"bilder"			=> $bilder,
			"slidetexte"		=> $slidetexte,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"text_unter_bild"	=> $text_unter_bild
		));	
	}else if($headline_position == "replace_image_with_headline"){
		
		echo "<div class=\"". $layout_classes["headline"] . "\">";
		atomicdesign::output("molecule", "heading", array(
			"content" 			=> $data,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes
		));	
		echo "</div>";
	}

	if(strlen($data->text()) > 0 && !$text_unter_bild){
		atomicdesign::output("molecule", "textblock", array(
			"content" 			=> $data,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"				=> $docs
		));
	}
	
	
	
	
	/* Textblock 2 und 3 sollen nach unten
	====================================================== */
	if(isset($layout_data["appearance"]) && $layout_data["appearance"] == "unten"){
		
		// dann muss das pull-right raus
		$layout_classes = str_replace("pull-right", "", $layout_classes);
		echo "<div class=\"clearfix padding-bottom-2\"></div>";
		//echo "</div></article><article><div class=\"row\">";	
	}

	if(isset($additional_columns["text2"]) && strlen($additional_columns["text2"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 			=> $additional_columns["text2"],
			"content" 			=> $data,
			"heading"			=> "no-headline",
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"				=> $docs
		));
	}
	
	if(isset($additional_columns["text3"]) && strlen($additional_columns["text3"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 						=> $additional_columns["text3"],
			"content" 						=> $data,
			"heading"							=> "no-headline",
			"layout_classes"			=> $layout_classes,
			"behavior_classes"		=> $behavior_classes,
			"docs"								=> $docs
		));
	}

	
	
	endif;
	

?>
</article>
