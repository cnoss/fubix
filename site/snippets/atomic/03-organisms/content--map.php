<?php
	$partnermeta = c::get('partner-meta');
	$data = isset($content) ? $content : $page;
	
	$classes = array();
	$classes["map"] = "col-md-6";
	$classes["text"] = "col-md-6 text";
	
	if($data->parent()->uid() != "home"){
		$classes["map"] = "col-md-8";
		$classes["text"] = "col-md-4 pull-right text";
	}
?>

<?php if($data->text() != ""): ?>
<div class="<?=$classes["text"]?> padding-top-1 hidden-xs hidden-sm">
<?=kirbytext($data->text()); ?>	
</div>
<?php endif; ?>

<div class="<?=$classes["map"]?>">
<?php atomicdesign::output("atom","text", array( "text" => kirbytext("(partner-map: standard)") )); ?>  
</div>

<?php if($data->text() != ""): ?>
<div class="text col-sm-12 padding-top-1 hidden-md hidden-lg">
<?=kirbytext($data->text()); ?>	
</div>
<?php endif; ?>