<!-- Organism: Video -->
<?php 
	$data = isset($content) ? $content : $page;
	
	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["textblock"] = "col-lg-4 text";
	$layout_classes = get_layout_classes( $data->layout_type($site->defaultLanguage()), $layout_classes );
	
	$provider = ($data->provider($site->defaultLanguage()) != "") ? $data->provider($site->defaultLanguage()) : "vimeo";
?>


<article>
<?php 

if(!isset($docs)){ $docs = false; }

atomicdesign::output("molecule","video-" . $provider, array(
	"content" 	=> $data,
	"heading"	=> $heading
));

atomicdesign::output("molecule","textblock", array(
	"content" 	=> $data,
	"heading"	=> $heading,
	"layout_classes"	=> $layout_classes,
	"docs"		=> $docs
));
?>

</article>
