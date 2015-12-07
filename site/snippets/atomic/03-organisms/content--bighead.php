<!-- Organism: Bighead -->
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

	// Soll eine Slideshow gezeigt werden=
	$class_autostart = (sizeof($bilder["all"]) > 1) ? "slideshow" : "";
	$autostart = (isset($layout_data["slideshow_autostart"])) ? $layout_data["slideshow_autostart"] : false;
?>

<?php if(isset($bilder["all"][0])): ?>
<div class="bighead <?=$class_autostart;?>">
	<?php
		
	if(sizeof($bilder["all"]) == 1){
		atomicdesign::output("atom","image", array(
			"content" 	=> $content, 
			"bild" 		=> $bilder["prop"][0],
			"class"		=> $content->image_crop($site->defaultLanguage())
		));
	}else{
		atomicdesign::output("molecule","slideshow", array(
			"content" 	=> $content, 
			"article" 	=> $content, 
			"slidetexte" => false,
			"bilder" 	=> $bilder,
			"kennung"	=> $content->slug(),
			"autostart"	=> $autostart
		));
	}
	
	?>
</div>
<?php endif; ?>

<?php if($data->text() != ""): ?>

<div class="container content">
	<div class="row">
	<?php

	atomicdesign::output("molecule", "textblock", array(
		"content" 			=> $data,
		"heading"			=> $heading,
		"layout_classes"	=> $layout_classes,
		"behavior_classes"	=> $behavior_classes,
		"docs"				=> $docs
	));

			
	if(isset($additional_columns["text2"]) && strlen($additional_columns["text2"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 			=> $additional_columns["text2"],
			"content" 			=> $data,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"				=> $docs
		));
	}
	
	if(isset($additional_columns["text3"]) && strlen($additional_columns["text3"]) > 0){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 			=> $additional_columns["text3"],
			"content" 			=> $data,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"				=> $docs
		));
	}
	?>
	</div>
</div>

<?php endif; ?>
