<?php if(isset($preview)): ?>
	<div class="form-builder-wrap">

	<fieldset class="form-builder-preview">
		<textarea disabled="disabled" name="<?=$data->name();?>" required="<?=$data->required();?>"></textarea>
		<label for="<?=$data->name();?>" class="required_<?=$data->required();?>"><?=$data->textlabel();?></label>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
	</dl>

</div>

<?php 
else: 
	$isRequired = ($formfield->required() == "1") ? "required" : "";
?>

	<div class="form-group">	
		<?php if($label == "links"): ?>
		<label class="<?=$classes["label"];?> control-label required_<?= $isRequired ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
		<?php endif; ?>
		
		<div class="<?=$classes["data"];?>">
			<textarea class="form-control" type="text" name="<?=$formfield->name(); ?>" required="<?=$formfield->required(); ?>"></textarea>
		</div>
		
		<?php if($label == "unten"): ?>
		<label class="<?=$classes["label"];?> control-label required_<?=$formfield->required(); ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
		<?php endif; ?>	
	</div>

<?php endif; ?>