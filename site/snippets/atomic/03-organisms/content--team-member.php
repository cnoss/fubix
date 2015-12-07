<!-- Organism: Team Member -->

<?php 
	$data = isset($content) ? $content : $page;
	
	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["bildblock"] = "col-xs-12 hidden-sm hidden-md hidden-lg bild";
	$layout_classes["textblock"] = "col-md-6 text";
	$layout_classes = get_layout_classes( $data->layout_type($site->defaultLanguage()), $layout_classes );
	
	if(!isset($behavior_classes)){ $behavior_classes = ""; }
	if(!isset($heading)){ $heading = ""; }
	if(!isset($bilder)){ $bilder = ""; }
	
?>

<article class="team-member">
<?php 
	if(!isset($docs)){ $docs = false; }
	
	/*atomicdesign::output("molecule", "bildblock", array(
		"content" 			=> $data,
		"bilder"			=> $bilder,
		"heading"			=> $heading,
		"layout_classes"	=> $layout_classes,
		"behavior_classes"	=> $behavior_classes
	));*/

	
	$subheadline = $data->function();

	if(strlen($data->further_information()) > 0 ){
		atomicdesign::output("molecule", "textblock", array(
			"excerpt" 			=> $data->further_information(),
			"content" 			=> $data,
			"heading"			=> $heading,
			"showheadline"		=> true,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"				=> $docs,
			"subheadline"		=> $subheadline
		));
	}

?>
</article>
