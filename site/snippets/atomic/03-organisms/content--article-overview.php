<!-- Organism: Article Overview -->

<?php 
	$data = isset($content) ? $content : $page;
	$layout_classes = array();
	$teaser_count = 0;
	
	$def_lang = (c::get("lang_layouts")) ? c::get("lang_layouts"): $site->defaultLanguage()->code();
	
	// Wie soll der Overview aussehen?
	$layout_type = ($data->content($def_lang)->layout_type() != "") ? $data->content($def_lang)->layout_type() : false;
	
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

		$hide_in_lang = (preg_match("=(1|true|TRUE)=",$container->hide_in_lang())) ? true : false;
		if($hide_in_lang) continue;
		
		foreach($container->content($def_lang)->display_data()->split(",") as $t){
			$display_data[$t] = true;
		}
		
		$teaser_count ++;
?>

	<div class="teaser--item <?php echo $overview_style["classes"]; ?>">
		<?php
		
		$teaser_image = false;
		
		// Wurde ein Teaserbild definiert?
		$r = preg_replace("=.*?_partner/=", "", $container->root());
		$selected_img = array( "/_partner/". $r. "/". $container->content()->select_image());
		$bilder = get_images_from_article(false, false, $selected_img);

		// Wenn nein, dann nehmen wir ein Bild aus dem Artikel
		if(!isset($bilder[$overview_style["thumbs"]][0])){
			$bilder = get_images_from_article($container, false, false);
		}
		
		// Wenn auch nein, dann nehmen wir das Defaultbild
		if(isset($bilder[$overview_style["thumbs"]][0])){
			$teaser_image = $bilder[$overview_style["thumbs"]][0];
		}else{
			$teaser_image = "http://partner.bulthaup.com/assets/img/allgemeine-informationen.jpg";
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

<?php if($page->isHomePage()): ?>

<?php 
	$limit = 5;
	$containers = $pages->index()->children()->visible()->filterBy('home',"1")->sortBy('date', 'desc')->limit($limit);

	foreach ($containers as $container):
	
		// Was soll angezeigt werden?
		$display_data = array();
		
		$hide_in_lang = (preg_match("=(1|true|TRUE)=",$container->hide_in_lang())) ? true : false;
				
		if($hide_in_lang) continue;
	
		foreach($container->display_data()->split() as $t){
			$display_data[$t] = true;
		}
		
		$teaser_count ++;
		
?>

	<div class="teaser--item <?php echo $overview_style["classes"]; ?>">
		<?php			
		$teaser_image = false;

		// Wurde ein Teaserbild definiert?
		$r = preg_replace("=.*?_partner/=", "", $container->root());
		$selected_img = array( "/_partner/". $r. "/". $container->content()->select_image());
		$bilder = get_images_from_article(false, false, $selected_img);

		// Wenn nein, dann nehmen wir ein Bild aus dem Artikel
		if(!isset($bilder[$overview_style["thumbs"]][0])){
			$bilder = get_images_from_article($container, false, false);
		}
		
		// Wenn auch nein, dann nehmen wir das Defaultbild
		if(isset($bilder[$overview_style["thumbs"]][0])){
			$teaser_image = $bilder[$overview_style["thumbs"]][0];
		}else{
			$teaser_image = "http://partner.bulthaup.com/assets/img/allgemeine-informationen.jpg";
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

<?php 
	// Wenn es keine Teaser gibt, z.B. weil sie in dieser Sprache ausgebelndet sind, blenden wir den kompletten Block aus
	
	if($teaser_count == 0):
?>
	
<script>var teaser = "empty";</script>

<?php endif; ?>