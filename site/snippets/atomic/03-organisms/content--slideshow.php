<!-- Organism: Slideshow -->

<?php 
	$data = isset($content) ? $content : $page;
	
	/* Zusätzliche Textspalten */
	$additional_columns = yaml($data->columns());
	$additional_columns = reset($additional_columns);
	
	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["bildblock"] = "col-lg-8 col-sm-8 bild";
	$layout_classes["textblock"] = "col-lg-4 col-sm-4 text";
	
	/* Layout switcher */
	$def_lang = (c::get("lang_layouts")) ? c::get("lang_layouts"): $site->defaultLanguage()->code();
	$layout_data_obj = set_up_layout_data(yaml($data->content($def_lang)->layout_switcher()));
	$layout_data 	= $layout_data_obj["layout_data"];
	$layout_classes = array_merge($layout_classes, $layout_data_obj["layout_classes"]);
	$layout_classes = get_layout_classes_v2( $layout_data, $layout_classes );
	
	// Bilder sammeln
	$slides = $data->children()->visible();
	$slideimages = array();
	$slidetexte = array();
	foreach($slides as $slide){
		
		foreach (get_images_from_article($slide) as $key=>$items){
			if( !isset($slideimages[$key])){ $slideimages[$key] = array(); }
			foreach($items as $item){ array_push($slideimages[$key], $item); }
		}
		
		array_push($slidetexte, $slide->text());

	}	
	
	if(sizeof($slideimages) == 0){
		$slideimages = $bilder;
	}

?>

<?php
	
	atomicdesign::output("organism","content--article", array(
		"content" 			=> $data,
		"bilder"			=> $slideimages,
		"slidetexte"		=> $slidetexte,
		"heading"			=> $heading,
		"layout_classes"	=> $layout_classes,
		"behavior_classes"	=> $behavior_classes
	));
?>
