<!-- Organism: Form Builder -->
<?php 
	$data = isset($content) ? $content : $page;
	
	/* Zusätzliche Textspalten */
	$additional_columns = yaml($data->columns());
	$additional_columns = reset($additional_columns);
	
	/* Layoutklassen */
	$layout_classes = array();
	$layout_classes["bildblock"] = "col-lg-8 col-sm-8 bild";
	$layout_classes["textblock"] = "col-lg-4 col-sm-4 text";
	
	/* Layout switcher */
	$layout_data = "";
	
	/* Layoutklassen */
	$behavior_classes = "";
?>


<div class="clearfix"></div>

<div class='col-sm-12'>
	<span class='js-form-status'></span>
</div>

<form class="text form-horizontal contactform js-form" method="POST" action="<?= c::get('settings')['ajax-form-url'] ?>" name="<?=$data->title();?>" enctype="multipart/form-data" novalidate>

<?php
	atomicdesign::output("molecule", "form", array(
		"data" => $data,
		//"postdata" => $postdata,
		//"errors" => $errors
	));
?>

</form>



