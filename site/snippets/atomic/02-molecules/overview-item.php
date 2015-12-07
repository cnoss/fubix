<!-- Molecule: overview-item -->

<?php 
if(!isset($class)){ $class = ""; }

// Was für ein Typ ist es? Slideshow oder Article?
$display_data["type"] = "article";
$tpl = $content->intendedTemplate();
if($tpl == "content--slideshow"){
	$display_data["type"] = "slideshow";
}

$linktext = l::get('weiterlesen');
if($tpl == "content--event"){
	$linktext = l::get('jump-to-event');	
}
?>

<?php 
	$further_info = "";
	if(isset($display_data["link"])  || $display_data["type"] == "slideshow"){
		$further_info = "onclick=\"ajaxed_content.func.toggleitem(this, '".$content->uri()."', false, '".$tpl."');\"";
	}
	
	$href = "";
	if(isset($display_data["jump_to_link"])){
		$url = preg_replace("=/.*/=","#", $content->uri());
		$href = "href=\"".$site->language()."/".$url."\"";
	
	}
	
?>

<figure class="teaser--item__inner" id="<?php echo $content->uid();?>" <?= $further_info; ?>>
	<?php

	atomicdesign::output("atom","image", array(
		"content" 	=> $content, 
		"bild" 	=> $bild
	));
	?>

<?php if($content->title() != ""): ?>
	
	<figcaption <?php if(isset($display_data["link"])): ?>class="has-more"<?php endif; ?>>
	
	<?php if(isset($display_data["headline"]) || $display_data["type"] == "slideshow"): ?>
	<h4><?php echo $content->title(); ?></h4>
	<?php endif; ?>

	<?php if(isset($display_data["content"])){
		if($content->teasertext() != ""){
			atomicdesign::output("atom","text", array("text" => $content->teasertext(), "class" => $class));
		}	else if($content->text() != ""){
			atomicdesign::output("atom","text", array("text" => $content->text(), "class" => $class));
		}
	}?>
	
	<?php if(isset($display_data["link"]) || isset($display_data["jump_to_link"])): ?>
		<a <?= $href; ?> class="more" <?= $further_info; ?>><span class="linktext"><?php echo $linktext; ?></span></a>
	<?php endif; ?>
	
	</figcaption>
	

</figure>
<?php endif; ?>


<?php if(isset($display_data["link"])): ?>
<!--/a-->
<?php endif; ?>