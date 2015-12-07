<?php if(isset($preview)): ?>
<div class="form-builder-wrap">

	<fieldset class="form-builder-preview stacked">
		<div><strong class="required_<?=$data->required();?>"><?=$data->textlabel();?></strong>&nbsp;</div>
		<div>
			<input type="radio" disabled="disabled" checked="checked" name="<?=$data->name();?>" value="<?=$data->option1();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option1();?></label>
		</div>
		
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option2();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option2();?></label>
		</div>
		
		<?php if($data->option3() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option3();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option3();?></label>
		</div>
		
		<?php elseif($data->option4() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option4();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option4();?></label>
		</div>
		
		<?php elseif($data->option5() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option5();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option5();?></label>
		</div>
		
		<?php elseif($data->option6() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option6();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option6();?></label>
		</div>
		
		<?php elseif($data->option7() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option7();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option7();?></label>
		</div>
		<?php endif; ?>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
		<dt>Display Stacked:</dt><dd><?=$data->display_stacked();?></dd>
	</dl>
</div>

<?php 

else:
	// If no post data is set, $value is an empty variable and won't work with the in_array() statement
	// So we are creating an empty array to avoid this conflict ^schi
	$isRequired = ($formfield->required() == "1") ? "required" : "";
?>

<div class="form-group padding-top-1 form-builder">
	<label class="<?=$classes["label"];?> control-label required_" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
	
	<?php // this forces the checkbox to be delivered in the post ?>
	<input type="hidden" name="<?=$formfield->name(); ?>" value="0" />

	<div class="<?=$classes["data"];?>">
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option1()); ?>" type="checkbox">
				<?=$formfield->option1(); ?>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option2()); ?>" type="checkbox">
				<?=$formfield->option2(); ?>
			</label>
		</div>
		
		<?php if($formfield->option3() != ""): ?>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option3()); ?>" type="checkbox">
				<?=$formfield->option3(); ?>
			</label>
		</div>
		<?php endif; ?>
		<?php if($formfield->option4() != ""): ?>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option4()); ?>" type="checkbox">
				<?=$formfield->option4(); ?>
			</label>
		</div>
		<?php endif; ?>
		<?php if($formfield->option5() != ""): ?>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option5()); ?>" type="checkbox">
				<?=$formfield->option5(); ?>
			</label>
		</div>
		<?php endif; ?>
		<?php if($formfield->option6() != ""): ?>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option6()); ?>" type="checkbox">
				<?=$formfield->option6(); ?>
			</label>
		</div>
		<?php endif; ?>
		<?php if($formfield->option7() != ""): ?>
		<div class="checkbox">
			<label>
				<input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option7()); ?>" type="checkbox">
				<?=$formfield->option7(); ?>
			</label>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>