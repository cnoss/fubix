<!-- Molecule: overview-item -->

<!-- UID: <?php echo $content->uid(); ?> -->
<?php 
if(!isset($class)){ $class = ""; }

// Gibt es mehr Content?
$further = ($content->Further_information() == "") ? false : true;
?>

<figure class="teaser--item__inner" id="<?php echo $content->uid();?>" <?php if($further){ echo "onclick=\"ajaxed_content.func.toggleitem(this, '".$content->uri()."', this);\""; } ?>>
	<?php
	atomicdesign::output("atom","image", array(
		"content" 	=> $content, 
		"bild" 	=> $bild
	));
	?>

<?php if($content->title() != ""): ?>
	
	<figcaption class="team-member">
	

	<h4><?php echo $content->title(); ?></h4>
	<?php
		if($content->function() != ""){ atomicdesign::output("atom","text", array("text" => $content->function(), "class" => $class)); }
	?>
	
	<?php
		atomicdesign::output("atom","text", array("text" => $content->text(), "class" => $class));
	?>
	
	<?php if(isset($display_data["link"])): ?>
		<a class="more" href="<?php echo $content->url();?>"><span class="linktext">weiterlesen</span></a>
	<?php endif; ?>

	</figcaption>
	
<?php endif; ?>

</figure>
