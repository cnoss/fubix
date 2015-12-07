<?php if(isset($preview)): ?>

<div class="form-builder-wrap">

	<fieldset class="form-builder-preview">
		<input type="text" disabled="disabled" name="<?=$data->name();?>" required="<?=$data->required();?>">
		<label for="<?=$data->name();?>" class="required_<?=$data->required();?>"><?=$data->textlabel();?></label>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
	</dl>

</div>
<?php else: 

$isRequired = ($formfield->required() == "1") ? "required" : "";
?>

<div class="form-group">

	<?php if($label == "links"): ?>
	<label class="<?=$classes["label"];?> control-label required_<?=$formfield->required(); ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
	<?php endif; ?>
	
	<div class="<?=$classes["data"];?>"><input class="form-control" type="text" name="<?=$formfield->name(); ?>" <?= $isRequired ?>></div>
	
	<?php if($label == "unten"): ?>
	<label class="<?=$classes["label"];?> control-label required_<?=$formfield->required(); ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
	<?php endif; ?>
	
</div>

<?php endif; ?>
