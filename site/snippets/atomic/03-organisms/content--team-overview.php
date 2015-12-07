<!-- Organism: Team Overview -->

<?php 
	$data = isset($content) ? $content : $page;
	$layout_classes = array();
	
	// Wie soll der Overview aussehen?
	$layout_type = ($data->layout_type($site->defaultLanguage()) != "") ? $data->layout_type($site->defaultLanguage()) : false;
	
	$overview_style = array();
	$overview_style["classes-container"] = "teaser--medium";
	$overview_style["classes"] = "teaser--item-medium";
	$overview_style["thumbs"] = "thumbs-lg";
	
	if($layout_type == "layout-large-square"){
		$overview_style["classes-container"] = "teaser--large";
		$overview_style["classes"] = "teaser--item-large";
		$overview_style["thumbs"] = "thumbs-lg";
	}
	
	if($layout_type == "layout-xsmall-square"){
		$overview_style["classes-container"] = "teaser--small";
		$overview_style["classes"] = "teaser--item-small";
		$overview_style["thumbs"] = "thumbs-lg";
	}
	
	if($layout_type == "layout-small-16zu9"){
		$overview_style["classes-container"] = "teaser--medium";
		$overview_style["classes"] = "teaser--item-medium";
		$overview_style["thumbs"] = "thumbs-lg-16zu9";
	}
	
	if($layout_type == "layout-xsmall-16zu9"){
		$overview_style["classes-container"] = "teaser--small";
		$overview_style["classes"] = "teaser--item-small";
		$overview_style["thumbs"] = "thumbs-lg-16zu9";
	}
	
	if($layout_type == "layout-large-16zu9"){
		$overview_style["classes-container"] = "teaser--large";
		$overview_style["classes"] = "teaser--item-large";
		$overview_style["thumbs"] = "thumbs-lg-16zu9";
	}

?>

<div class="teaser-overview <?php echo $overview_style["classes-container"]; ?>">

<?php 
	if(!isset($docs)){ $docs = false; }
	
	$containers = $data->children()->visible();
	foreach ($containers as $container):

		// Was soll angezeigt werden?
		$display_data = array();

		foreach($container->display_data($site->defaultLanguage())->split(",") as $t){
			$display_data[$t] = true;
		}
?>

	<div class="teaser--item <?php echo $overview_style["classes"]; ?>">	
		<?php		
		$bilder = get_images_from_article($container);
		$teaser_image = false;
		if(isset($bilder[$overview_style["thumbs"]][0])){
			$teaser_image = $bilder[$overview_style["thumbs"]][0];
		}
		
		// das ist ja ein interner Artikel, auf den wir nicht weiter verlinken wollen
		unset($display_data["link"]);

		atomicdesign::output("molecule","team-member", array(
			"content" 			=> $container,
			"bild"				=> $teaser_image,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"display_data"		=> $display_data
		));
		?>
	</div>
	
<?php
	endforeach; 
?>

<?php if($page->isHomePage()): ?>

<?php 
	$limit = 5;
	$containers = $pages->index()->children()->visible()->filterBy('home','true')->sortBy('date', 'desc')->limit($limit);
	foreach ($containers as $container):
	
		// Was soll angezeigt werden?
		$display_data = array();
	
		foreach($container->display_data()->split() as $t){
			$display_data[$t] = true;
		}
		
?>

	<div class="teaser--item <?php echo $overview_style["classes"]; ?>">	
		<?php		
		$bilder = get_images_from_article($container);
		$teaser_image = false;
		if(isset($bilder[$overview_style["thumbs"]][0])){
			$teaser_image = $bilder[$overview_style["thumbs"]][0];
		}
		atomicdesign::output("molecule","overview-item", array(
			"content" 			=> $container,
			"bild"				=> $teaser_image,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"display_data"		=> $display_data
		));
		?>
	</div>
	
<?php
	endforeach; 
?>

<?php endif; ?>
</div>

	