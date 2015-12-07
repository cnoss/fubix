<!-- Organism: Cols -->

<div class="big-cols">

<?php 
	$data = isset($content) ? $content : $page;
	if(isset($mypageid)){ $data = $site->find($mypageid); }
		
	$containers = (isset($use_containers)) ? $use_containers : $data->children()->visible();
	$container_count = 0;

	foreach($containers as $container): 
	$next = $container->nextVisible();
	$container_count++;
	
	// Wo kommt der Content her?
	if(preg_match("=^_shared=", $container->uri())){ 
		c::set("lang_layouts", "de");
	}else{
		c::remove("lang_layouts");
	}

	// Layout Angaben	
	$def_lang = (c::get("lang_layouts")) ? c::get("lang_layouts"): $site->defaultLanguage()->code();	
	$layout_data = yaml($data->content($def_lang)->layout_switcher());

	$headline_position = $container->content($def_lang)->headline_position();

	if(isset($show_ruler)){
		$trennlinie = "show";
		$next = ($containers->count() == $container_count) ? false : true;
	}else{
		$trennlinie = $data->content($def_lang)->trennlinie();
	}

	$classes = get_additional_classes( $container, $site );
	$behavior_classes = $classes["behavior_classes"];

	$hide_in_lang = (preg_match("=(1|true|TRUE)=",$container->hide_in_lang())) ? true : false;
	if($hide_in_lang) continue;

	$classes["padding"] = "";
	if($data->content($def_lang)->padding_at_top() == "1" && $container_count == 1){ $classes["padding"] = "padding-top-2";}	

	// Ist es ein schöner Sonderfall, z.B. Imprint, denn hier prüfen wir, ob es nur den GA Text gibt. 
	// Wenn das der Fall ist, setzen wir die Headline der Seite über den GA Text
	$use_headline = (isset($use_headline)) ? $use_headline : false;

	if(isset($case) && $case == "imprint-ga-only"){ 
		$use_headline = $container->title(); 
		$case = "imprint";  
		$headline_position == "replace_image_with_headline";  		
		continue;
	}
	
	if(isset($case) && $case == "imprint"){ 
		$classes["padding"] = "padding-top-2";
	}
	
	// Welche Headline brauchen wir?
	$headline = $container->title();
	
	// Wurde bereits eine definiert Headline mit gegeben? Wenn ja, dann nehmen wir diese
	if($use_headline){ $headline = $use_headline;  $use_headline = false; }
	
	// Falls es nur einen Block gibt, setzen wir eine Überschrift drüber, denn es gibt keinen Subheader in diesem Fall, da dieser nur eigeblendet wird, wenn es mehr als eine Suboage gibt
	if($containers->count() == 1 && $headline_position == "subhead"){
		$headline_position = "row";
	}
	
	// Wenn es ein Accordeon Content ist, setzen wir die Headline auch als trigger über den text 
	if($behavior_classes["trigger-classes"] != ""){
		$headline_position = "row";
	}
?>

<section id="<?= $container->uid() ?>" class="big-cols--item <?php echo $classes["color_classes"]; ?>">
	
		<?php 

		if($headline_position == "row"): ?>
		<div class="row">
			<div class="margin-bottom-1 col-md-12 section head <?=$behavior_classes["trigger-classes"];?>" <?=$behavior_classes["trigger-data"];?>>
				<!--?php if(preg_match("=accordion=", $container->behavior_type($site->defaultLanguage()))){ echo "<hr class='section'>"; } ?-->
				<?php 
					atomicdesign::output("molecule","section-heading", array("headline" => $headline )); 
				?>
				<?=$behavior_classes["trigger-indicator"];?>
			</div>
		</div>
		<?php endif; ?>
		
		<div id="content-<?= $container->uid() ?>" class="row <?=$behavior_classes["target-classes"];?>">
			
			<?php
						
			// Bilder holen
			$bilder = get_images_from_article( $container );
			
			// Dokumente holen
			$docs = structhelper::get_documents_from_article( $container );	
			
			// Snip holen
			$template = atomicdesign::get_snip( $container->uid(), "default");
			$template = atomicdesign::get_snip( $container->intendedTemplate(), $template);

			snippet($template, array(
				'content' 			=> $container,
				'heading'			=> $headline,
				'snippet' 			=> $template,
				'class' 			=> $container->layout(),
				'bilder' 			=> $bilder,
				'docs'				=> $docs,
				'behavior_classes' 	=> $behavior_classes,
				'headline_position' => $headline_position
			)); 
			
			?>
	
		</div>

		<?php if($trennlinie == "show" && $next):?>
		<hr class="section">
		<?php endif; ?>
		
	
</section>	



<?php endforeach; ?>
	
</div>

