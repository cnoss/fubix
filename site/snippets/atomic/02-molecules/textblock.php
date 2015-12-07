<!-- Molecule: Textblock -->
<?php

$headline_text = "";

if(isset($headline)){
	$headline_text =  $headline;
}else if($content->headline() == ""){
	$headline_text =  $content->title();
}else{
	$headline_text =  $content->headline();
}

$showheadline = isset($showheadline)?$showheadline : false;
$headline_position = ($content && $content->headline_position() != "")? $content->headline_position() : false;

if(isset($heading) && $heading == "no-headline"){
	$showheadline = false;
	$headline_position = false;
	$headline_text = "";
}


?>


<div class="<?=$layout_classes["textblock"];?>">
	<?php if($headline_position == "text"  || $showheadline): ?>
	<div class="head">
		<?php atomicdesign::output("atom","article-headline", array("text" => $headline_text)); ?>
		<?php if(isset($subheadline)){ atomicdesign::output("atom","text", array("text" => $subheadline)); } ?>
	</div>
	<?php endif; ?>
	
	<div class="body">

		<?php	
		if(isset($excerpt) && $excerpt != ""){
			atomicdesign::output("atom","text", array("text" => $excerpt));	
			
		}else if($content->text() != ""){
			atomicdesign::output("atom","text", array("text" => $content->text()));	
		} 
		?>
		
		<?php
		// Do we have a URL and a linkname?
		if(isset($link["text"])){ 
			atomicdesign::output("atom","text", array("text" => get_kirby_linksyntax($link)));
		
		// or do we have a link only?
		}else if(isset($link)){
			atomicdesign::output("atom","text", array("text" => $link));
		}
		?>
	</div>
	
	<?php if(isset($docs) && sizeof($docs["all"]) >0): ?>
	
	<?php endif; ?>	
</div>