<!-- Organism: Event Overview -->

<?php 
	$data = isset($content) ? $content : $page;
	$layout_classes = array();
?>

<?php if($data->text() != ""): ?>
<div class="intro margin-bottom-2 col-md-12">
	<div class="row">
<?php endif; ?>

<?php
atomicdesign::output("organism","content--article", array(
	"content" 			=> $data,
	"bilder"			=> $bilder,
	"heading"			=> $heading,
	"layout_classes"	=> $layout_classes,
	"behavior_classes"	=> $behavior_classes
));
?>

<?php if($data->text() != ""): ?>
	</div>
</div>
<?php endif; ?>

<?php 
if(!isset($docs)){ $docs = false; }

$containers = $data->children()->visible();
foreach ($containers as $container):

	$bilder = get_images_from_article($container);
	
	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["bildblock"] = "col-md-6 bild";
	$layout_classes["textblock"] = "col-md-6 text";
	
	$termine = $container->children()->visible();
	$single_date 		= ($termine->count() == 1) ? true : false;
	$multiple_dates = ($termine->count() > 1) ? true : false;
	$hasimages = (sizeof($bilder["all"]) > 0) ? true : false;
	
	$excerpt = "";
	if($single_date){
		
			$excerpt = $container->text();
			$excerpt .= "<br><br>".l::get("termin"). ": ". date(l::get("date-format"), strtotime($termine->first()->datum())) . ", ";
			$excerpt .= $termine->first()->start();
			if($termine->first()->end() != ""){ $excerpt .= " – ". $termine->first()->end(); }
	}

?>

<div  id="<?= $container->slug(); ?>" class="col-md-12 eventdate">
	<div class="row">

	<?php 
		if(!isset($docs)){ $docs = false; }
		
		atomicdesign::output("molecule","bildblock", array(
			"content" 			=> $container,
			"bilder"			=> $bilder,
			"heading"			=> $heading,
			"layout_classes"	=> $layout_classes,
			"behavior_classes"	=> $behavior_classes
		));
		
		$showheadline = true;
		
		atomicdesign::output("molecule","textblock", array(
			"content" 					=> $container,
			"excerpt" 					=> $excerpt,
			"heading"						=> $heading,
			"layout_classes"		=> $layout_classes,
			"behavior_classes"	=> $behavior_classes,
			"docs"							=> $docs,
			"showheadline"			=> $showheadline
		));
 
	?>

		<div class="<?=$layout_classes["textblock"];?>">
		
		<?php if(!$hasimages): ?>
				<div class="head">
					<h3><?php echo l::get("anmeldung") ?></h3>
				</div>
		<?php endif; ?>
		
		<?php if($multiple_dates): ?>
		<div class="head">
				<h3><?php echo l::get("termine") ?></h3>
		</div>
		<table class="table">
		<?php
		
		foreach($termine as $termin){
			atomicdesign::output("molecule","termin", array(
				"content" 			=> $termin
			));
		}

		?>
		</table>		
		<?php endif; ?>

		<?php if($container->show_form() == '1'): ?>
		<form class="text eventform <?php if($hasimages){ echo ' form-hidden'; } ?>" role="form" method="post" id="form-event-<?=$container->uid();?>">
			
			<?php if($multiple_dates): ?>
			<div class="head">
				<h3><?php echo l::get("anmeldung") ?></h3>
			</div>
			<?php endif; ?>
			
			<?php if($multiple_dates): ?>
			<div class="form-group">
				<select class="form-control" >
					<?php
					foreach($termine as $termin){ 
						$time = $termin->start();
						if($termin->end() != ""){ $time .= " – " . $termin->end(); }
						echo "<option>". date(l::get("date-format"), strtotime($termin->datum())) .", ". $time ."</option>"; 
					}
					?>
				</select>
        <label for="nachname" class="control-label">Termin *</label>
			</div>
			<?php endif; ?>
			
			<?php
				$classes = array();
				$classes["label"] = "";
				$classes["data"] = "";
								
				atomicdesign::output("molecule", "form", array(
					"data" 			=> $container,
					"classes"		=> $classes,
					"label"			=> "unten",
					"footer"		=> false
				));
			?>

			<div class="form-group">
              <span>* Diese Felder erfordern eine Eingabe</span>
			</div>

			<div class="form-group">
              <button type="reset" name="clear" class="btn btn-primary">Eingabe verwerfen</button> <button type="submit" name="submit" class="btn btn-primary">Abschicken</button>
			</div>

		</form>
		<?php if(!$single_date|| sizeof($bilder["all"]) > 0): ?><button class="btn" id="toggle-<?=$container->uid();?>" onclick="helper.func.showform('<?=$container->uid();?>')">jetzt anmelden</button><?php endif; ?>
		<?php endif; ?>
		</div>
	</div>
	
	<?php if($container->nextVisible()):?><hr class="section"><?php endif; ?>
	
</div>


	
<?php
	endforeach; 
?>
