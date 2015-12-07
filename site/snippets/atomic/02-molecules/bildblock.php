<!-- Molecule: bildblock -->

<?php 
	
	// Wie viele Bilder sollen angezeigt werden?
	$noi = false;

	if(isset($layout_classes["number-of-images"])){ $noi = $layout_classes["number-of-images"];}

	// Gibt es BUs?
	$slidetexte = (isset($slidetexte)) ? $slidetexte : false;
	
	// Soll die Slideshow automatisch gestartet werden?
	$autostart = (isset($layout_data["slideshow_autostart"])) ? $layout_data["slideshow_autostart"] : false;
?>

<?php if(isset($bilder["all"][0])): ?>
	
	<div class="<?=$layout_classes["bildblock"];?>">
		
	<?php if($noi == "" || $noi=="0" || $noi=="1"): ?>
		<?php
		atomicdesign::output("molecule","slideshow", array(
			"content" 	=> $content, 
			"article" 	=> $content, 
			"slidetexte" => $slidetexte,
			"bilder" 	=> $bilder,
			"kennung"	=> (isset($kennung)) ? $kennung : $content->slug(),
			"autostart"	=> $autostart
			));
		?>
	
	<?php else: ?>
	<div class="row">
		<?php
		switch ($noi) {
			case "2":
				echo '<div class="col-md-8 col-sm-12">';
				atomicdesign::output("molecule","slideshow", array(
					"content" 	=> $content, 
					"article" 	=> $content, 
					"slidetexte" => $slidetexte,
					"bilder" 	=> $bilder,
					"kennung"	=> $content->slug(),
					"autostart"	=> $autostart
				));
				echo '</div>';
				
				echo '<div class="col-md-4 col-sm-12">';
				atomicdesign::output("atom","image", array( 
					"bild" 	=> $bilder["all"][1], 
					"class"	=> "hidden-xs hidden-sm"
				));

				if($text_unter_bild){
					$layout_classes["textblock"] = "text padding-top-1";
					atomicdesign::output("molecule", "textblock", array(
						"content" 			=> $content,
						"heading"			=> false,
						"layout_classes"	=> $layout_classes,
						"behavior_classes"	=> false,
						"docs"				=> false
					));
					
				}
				echo '</div>';
                break;
			
			case "3":
				echo '<div class="col-md-8  col-sm-12">';
				atomicdesign::output("molecule","slideshow", array(
					"content" 	=> $content, 
					"slidetexte" => $slidetexte,
					"article" 	=> $content, 
					"bilder" 	=> $bilder,
					"class" => "embed-responsive embed-responsive-16by9",
					"kennung"	=> $content->slug(),
					"autostart"	=> $autostart
				));
				echo '</div>';
				
				echo '<div class="col-md-4  col-sm-12 margin-bottom-grid hidden-xs hidden-sm">';
				atomicdesign::output("atom","image", array( "bild" 	=> $bilder["thumbs-lg-16zu9"][1] ));
				echo '</div>';
				
				echo '<div class="col-md-4  col-sm-12 hidden-xs hidden-sm hidden-xs hidden-sm">';
				atomicdesign::output("atom","image", array( "bild" 	=> $bilder["thumbs-lg-16zu9"][2] ));
				echo '</div>';
                break;
        }	
		?>
	
	</div>
	<?php endif; ?>
	</div>
<?php endif; ?>	



